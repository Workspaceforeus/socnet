<?php

class GiftController extends Controller
{
	
	public function addgift()
	{
		$arr['login'] = $_GET['add'];
		$gift= new Users();
		$gift->myid=null;
		$gift->getid($arr);
		$friendid=$gift->myid;
		$arr['login']=$_SESSION['login'];
		$gift->myid=null;
		$gift->getid($arr);
		$id=$gift->myid;
		$type=$_GET['gift'];
		echo 'FriendID='.$friendid;
		$gift->addgift($id,$friendid,$type);
	}
	

}
?>