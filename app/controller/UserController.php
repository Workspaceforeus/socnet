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
				if($user->val=='Ok')
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

		if( (!empty($_POST['login'])) && (!empty($_POST['password'])))
		{
				
			$user = new Users();
			$user->login($_POST);
			echo $user->temp;
			if($user->temp == '1')
			{
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
}