<?php

class GiftController extends Controller
{
	
	public static function validategift($data,$type)
	{
		$gift=new Users();
		$gift->getgift($data);
		$flag=0;
		for ($i=0;$i<3;$i++)
		{
			if ($gift->gifttype[$i]==$type)
				return false;
		}
		return true;
	}

	public function addgift()
	{
		
		$arr['login'] = $_GET['add'];
		$gift= new Users();
		$gift->myid=null;
		$gift->getid($arr);
		$friendid=$gift->myid;
		$flag=GiftController::validategift($friendid,$_GET['gift']);
		if($flag && $id!=$friendid)
		{
			$arr['login']=$_SESSION['login'];
			$gift->myid=null;
			$gift->getid($arr);
			$id=$gift->myid;
			$type=$_GET['gift'];
		}
		
		if($id!=$friendid){
			$gift->addgift($id,$friendid,$type);
			echo 'Ваш подарок отправлен!';	
			}
			elseif($id==$friendid){
			echo 'Подарки нужны, чтобы дарить другим С:';
			}
			else
			{
			echo 'Пользователю уже был отправлен такой подарок!';
			}

	}
	

}
?>