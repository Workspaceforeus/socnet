<?php

class UserController extends Controller
{
	public function registration()
	{
		if( (empty($_POST['login'])) || (empty($_POST['password'])) || (empty($_POST['email'])) || (empty($_POST['dob'])) || (empty($_POST['confirm']))) 
			{
				$this->renderView('user/registration', array('result'=>'Complete all required fields!'));
				return;
			}
		else
			{
				$user = new Users();
				$user->validate($_POST);
				if($user->val=='2')
				{
					$user->registration($_POST);
					$this->renderView('user/login', array('result' => $user->result));
		            return;
				}
				else
				{
					$this->renderView('user/registration', array('result' => $user->val));
					return;
				}	
			}
	}

	public function login()
	{
		if(empty($_SESSION['login']))
		{

			if( (!empty($_POST['login'])) && (!empty($_POST['password'])))
			{
				
				$user = new Users();
				$user->login($_POST);
				if($user->temp == '1')
				{
					$_SESSION['login']=$_POST['login'];
					$_SESSION['password']=$_POST['password'];
					$this->renderView('user/profile', array('result' => $user->result));
					return;
				}
				else
				{
					$this->renderView('user/login', array('result' => $user->result));
					return;
				}
			}
			else
			{
				$this->renderView('user/login', array('result'=>'Complete all required fields!'));
				return;
			}
		}
		else
		{
			$user = new Users();
			$user->login($_SESSION);
			$this->renderView('user/profile', array('result' => $user->result));
		}

	}
	public function logout()
	{
		if($_POST['logout'] == "logout")
		{
	 		unset($_SESSION['login']);
	 		unset($_SESSION['password']);
	 		$this->renderView('user/login');
		}
	}

}