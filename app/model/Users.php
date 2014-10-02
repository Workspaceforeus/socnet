<?php

include "Db.php";

class Users extends Database
{
	const TABLE='users';

	public $result;
	public $username;
	public $mymail;
	public $val;
	public $temp;

	public function validate($data)
	{
		$username=$data['login'];
		$mail=$data['email'];
		$pass=$data['password'];
		$conf=$data['confirm'];
		$sql1="SELECT email FROM users WHERE email='$mail'";
		$sql2="SELECT login FROM users WHERE login='$username'";
		$idmail = $this->db->prepare($sql1);
		$idlogin = $this->db->prepare($sql2);
		$idmail->execute();
		$mailrow = $idmail->fetch(PDO::FETCH_ASSOC);
		if(!empty($mailrow['email']))
		{
				$this->val='This e-mail is already in use!';
		}
		else
		{
			$idlogin->execute();
			$logrow = $idlogin->fetch(PDO::FETCH_ASSOC);
			if(!empty($logrow['login']))
				$this->val='This login is already in use!';
			else
			{
				if($pass!=$conf)
					$this->val='Password and confirm password is not equal!';
				else
					$this->val='2';
			}

		}

			
	}

	public function registration($data)
	{	
		try
		{			
			$insert = $this->db->prepare('INSERT INTO users (email, login, password,sex,numberofgames,dob,genre) VALUES (:email, :login, :password,:sex,:numberofgames,:dob,:genre)');
			$insert->bindParam(':email', $data['email']);
			$insert->bindParam(':login', $data['login']);
			$insert->bindParam(':password', $data['password']);
			$insert->bindParam(':sex', $data['sex']);
			$insert->bindParam(':numberofgames', $data['numberofgames']);
			$insert->bindParam(':dob', $data['dob']);
			$h=serialize($data['game_type']);
			$insert->bindParam(':genre', $h);
			$insert->execute();
			$this->result = 'Hello ' . $data['login']. '! Now you can log in!';
		} 
		catch(Exception $e) 
		{
			$this->result = $e->getMessage();
		}
	}

	public function login($data)
	{
		try
		{
			
			$username=$data['login'];
			$pass=$data['password'];
			$sql="SELECT login,password FROM users WHERE login='$username'";
			$insert = $this->db->prepare($sql);
			$insert->execute();
			$myrow = $insert->fetch(PDO::FETCH_ASSOC);
			if (empty($myrow['password']))
				{
					$this->result= 'Sorry, your login or passwors is wrong!!';
					$this->temp='0';
				}
			else
				{
					if ($myrow['password']==$pass)
						{$this->result= 'Hello  ' . $username . '!' ; $this->temp = '1';}

					else
						{$this->result='Password is wrong!';$this->temp = '0';}

				}	
		}
 
		catch(Exception $e)
		{
			$this->result=$e->getMessage();
		}

	}

	public function getinformation($data)
	{
		$username=$data['login'];
		$sql=" SELECT email FROM users WHERE login='$username'";
		$get = $this->db->prepare($sql);
		$get->execute();
		
		while ($myrow = $get->fetch(PDO::FETCH_ASSOC)) {$this->mymail.=$myrow['email'];}
		echo $this->mymail;

	}

	public function update($data1, $data2)
	{
		try
		{
			$username=$data1['login'];
			$mail=$data2['email'];
			$sql="UPDATE users SET email='$mail' WHERE login='$username'";
			$insert = $this->db->prepare($sql);
			$insert->execute();
			$this->result='Hi, '.$mail.'!';
		}
		catch(Exception $e)
		{
			$this->result=$e->getMessage();
		}
	}


}