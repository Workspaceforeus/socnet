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
				$user->count($_POST);
				if($user->temp == '1')
				{
					$_SESSION['login']=$_POST['login'];
					$_SESSION['password']=$_POST['password'];
					//$user->getinformation($_SESSION);
					//$this->renderView('user/profile', array('result' => $user->result, 'name'=> $user->mylogin,'genre'=>$user->mygenre, 'sex'=>$user->mysex));
					$user->getage($_SESSION);
					$this->renderView('user/profile', array('result' => $user->result, 'name'=> $user->mylogin,'genre'=>$user->mygenre, 'sex'=>$user->mysex, 'dob'=>$user->myage));
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
			//$user->getinformation($_SESSION);
			//$this->renderView('user/profile', array('name'=> $user->mylogin,'genre'=>$user->mygenre, 'sex'=>$user->mysex));
			$user->getage($_SESSION);
			$this->renderView('user/profile', array('result' => $user->result, 'name'=> $user->mylogin,'genre'=>$user->mygenre, 'sex'=>$user->mysex, 'dob'=>$user->myage));
 					
		}

	}

	public function logout()
	{
			unset($_SESSION['login']);
	 		unset($_SESSION['password']);
	 		header('Location:http://vk.loc/');
	}

	public function update()
	{
		if(empty($_POST))
		{
			//$user=new Users();
			//$user->getinformation($_SESSION);
			$this->renderView('user/setting');
			return;
		}
		else
		{
			$user=new Users();
			if(!empty($_POST['oldpass']))
			{					
				$user->updatepass($_SESSION, $_POST);
			}
			if(!empty($_POST['interests'])||(!empty($_POST['sex'])))
			{
				$user->updateinfo($_SESSION, $_POST);
			}
			

			if($user->result=='Ok')
				{
					header('Location:http://vk.loc/index.php?r=user&a=login');
				}
				else
					$this->renderView('user/setting', array('result' => $user->result));
					
		}
	}
	public function galery()
	{
		$user=new Users();
		$user->getcount($_SESSION);
		$user->countphoto=Controller::count_files("image/galery");
		$this->renderView('user/galery', array('count'=>$user->count,'photo'=>$user->countphoto));
	}

	public function editphoto()
	{

		$this->renderView('user/editphoto');
	}

	public function photogalery()
	{
		$this->renderView('user/photogalery');
	}	
	public function friends()
	{
		$this->renderView('user/friends');
	}	

	

}