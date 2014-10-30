<?php

class UserController extends Controller
{
	public $check;
	
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
					$data=$this->ecran($_POST);
					//$user->registration($data);
					$user->registration($_POST);
					mkdir("image/galery/".$_POST['login'], 0777);
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


 	private function viewpage($data,$user)//функция, передающая масив данных на страницу профиля
 	{
 		$user->getage($data);
		$user->getstatus($data['login']);
		if(empty($user->status))
			$status='Поменять статус';
		else
			$status=$user->status;
		$user->GetCommentsFromBase($data);
		$user->countphoto=Controller::count_files("image/galery/".$data["login"]);
		$user->online($data,2);
		$flag=0;
		$user->getgift($user->myid);
		$this->renderView('user/profile', array('result' => $user->result, 'commentname'=>$user->CommentsName , 'name'=> $user->mylogin,'genre'=>$user->mygenre, 'sex'=>$user->mysex, 'dob'=>$user->myage,'cf'=>$user->countphoto,'CommentsId'=>$user->CommentsId,'image'=>$user->CommentsImage,'Friend_id'=>$user->CommentsFriend_id,'body'=>$user->CommentsBody,'dt'=>$user->CommentsDt,'status'=>$status,'count'=>$user->CountComments,'online'=>$user->isonline,'giftid'=>$user->giftid,'gifttype'=>$user->gifttype,'gifttime'=>$user->gifttime));
		

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
					$user->online($_SESSION,1);
					$this->viewpage($_SESSION,$user);
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
			$user->online($_SESSION,1);
			$this->viewpage($_SESSION,$user);		
		}

	}

	public function logout()
	{
			$user = new Users();
			$user->online($_SESSION,3);
			unset($_SESSION['login']);
	 		unset($_SESSION['password']);
			header("Location: index.php?r=user&a=login");
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
			$user->online($_SESSION,1);
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
					header('Location:index.php?r=user&a=login');
				}
				else
					$this->renderView('user/setting', array('result' => $user->result));
					
		}
	}
	public function galery()
	{
		$user=new Users();
		$user->getcount($_SESSION);
		$user->online($_SESSION,1);
		$user->countphoto=Controller::count_files("image/galery/".$_SESSION["login"]);
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
	public function maketprof() //Рендер на посмотреть
	{
		$this->renderView('user/maketprof');
	}	

	public function friends()
	{
		$user=new Users();
		$batton='<'. 'input class' . '=' . '"button startle"' . 'type="button"' .  'value="Delete from your friends"' . 'onclick=' . "location.href='index.php?r=user&a=DeleteFriend&add=";
		$user->friends($_SESSION);
		$user->online($_SESSION,1);
		$this->renderView('user/friends', array('logins'=>$user->myfr,'dobs'=>$user->myfrdob,'batton'=>$batton,'status'=>$user->myfrstatus));

	}

	public function people()
	{
		$user=new Users();
		$batton='<'. 'input class' . '=' . '"button startle"' . 'type="button"' .  'value="Add to your friends"' . 'onclick=' . "location.href='index.php?r=user&a=addFriend&add=";
		$user->people($_SESSION);
		$user->online($_SESSION,1);
		$this->renderView('user/friends', array('logins'=>$user->peoplen,'dobs'=>$user->peopled,'batton'=>$batton, 'status'=>$user->peoplestatus));
	}
	
	//добавление в друзья
	
	public function addFriend ()
	{
		$user = new Users();
		$user->online($_SESSION,1);
		if ( isset($_GET['add']) ) {
			$friendID['login'] = $_GET['add'];
			if ( !empty($friendID) ){
				$user->friends($_SESSION);
				$oldFriendId=$user->myfr;
				$dublicate = false;
				//проверка добавляемого друга на его наличие в друзьях
				foreach ($oldFriendId as $key=>$id){
					if ($friendID["login"] == $id){
						$dublicate = true;
						echo "<h1>you have already added it to friends before</h1>";
					}
				}
				if (!$dublicate){
					$user->addNewFriendToBase($friendID,$_SESSION); //метод по заносу id нового пользователя в друзья
				}
		}
		};
		$this->friends();
	}
		
		//удаление из друзей
		
	public function DeleteFriend ()
	{
		$user = new Users();
		$user->online($_SESSION,1);
		if ( isset($_GET['add']) ) {
			$friendID['login'] = $_GET['add'];
			if ( !empty($friendID) ){
				$user->DeleteFriendFromBase($friendID,$_SESSION); //метод по удалению записи таблицы о пренадлежности к друзьям
			}
		}
		$this->friends();
	}
	
	
	
	// функция экранирования введенных данных
	
	private function ecran($data){
		$check['login']=mysql_real_escape_string($data['login']);
		$check['email']=mysql_real_escape_string($data['email']);
		$check['password']=mysql_real_escape_string($data['password']);
	}

	
	public function updatestatus()
	{
		if(isset($_POST["status"]))
			{
				echo $_POST["status"];
				$user = new Users();
				$user->online($_SESSION,1);
				$user->updatestatus($_SESSION,$_POST);
			}
	}
	
	
	// метод отвечает за вывод домашней страницы "друга"
	public function userpage()
	{
		$user = new Users();
		$comments=new CommentController();
		$$friendLogin = $_POST;
		if ( isset($_GET['add']) ) {
			$friendLogin['login']= $_GET['add'];
			$user->online($_SESSION,1);
			$this->viewpage($friendLogin,$user);
		};
	}

	
}