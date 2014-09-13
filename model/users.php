<?php

include "databases.php";

class Users extends Database
{
	const TABLE='users';

	public $result;
	public $username;
	public $pass;
	public $validate;

	public function validate($data)
	{
		$username=$data['login'];
		$mail=$data['email'];
		$pass=$data['password'];
		$conf=$data['confirm'];
		$sql1="SELECT COUNT(id) FROM users WHERE email='$mail'";
		$sql2="SELECT COUNT(id) FROM users WHERE login='$username'";
		$idmail = $this->db->prepare($sql1);
		$idlogin = $this->db->prepare($sql2);
		$idmail->execute();
		if(!empty($idmail))
		{
				$this->validate='This e-mail already in use!';
		}
		else
		{
			$idlogin->execute();
			if(!empty($idlogin))
				$this->validate='This login already in use!';
			else
			{
				if(pass!=conf)
					$this->validate=$this->validate.'Password and confirm password is not equal!';
				else
					$this->validate='Ok';
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
				}
			else
				{
					if ($myrow['password']==$pass)
						{$this->result= 'Hello' . $username . '!' ;}

					else
						{$this->result='Password is wrong!';}

				}	
		}
 
		catch(Exception $e)
		{
			$this->result=$e->getMessage();
		}

	}


}