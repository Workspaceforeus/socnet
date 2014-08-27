<?php

include "databases.php";

class User extends Database
{
	
	const TABLE='users';

	public $result;
	public $username;
	public $pass;

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
						{$this->result= 'Hello!!';}

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