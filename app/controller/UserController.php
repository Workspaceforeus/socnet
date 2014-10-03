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
				if($user->result=='Ok')
				{
					$user->registration($_POST);
					$this->renderView('user/login', array('result' => $user->result));
		            return;
				}
				else
				{
					$this->renderView('user/registration', array('result' => $user->result));
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
					$user->getinformation($_SESSION);
					$this->renderView('user/profile', array('result' => $user->result, 'name'=> $user->mylogin,'genre'=>$user->mygenre, 'sex'=>$user->mysex));
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
			$user->getinformation($_SESSION);
			$this->renderView('user/profile', array('name'=> $user->mylogin,'genre'=>$user->mygenre, 'sex'=>$user->mysex));
		}

	}

	public function logout()
	{
			unset($_SESSION['login']);
	 		unset($_SESSION['password']);
	 		$this->renderView('user/login');
	}

	public function update()
	{
		if(empty($_POST['oldpass']))
		{
			//$user=new Users();
			//$user->getinformation($_SESSION);
			$this->renderView('user/setting');
			return;
		}
		else
		{
			$user=new Users();
			$user->update($_SESSION, $_POST);
			if($user->result!='Ok')
			{
				$this->renderView('user/setting', array('result' => $user->result));
			}
			else
				header('Location:http://vk.loc/index.php?r=user&a=login');
		}
	
	}
	public function galery ()
	{
		$this->renderView('user/galery');
	}

}