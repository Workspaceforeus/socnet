<?php 
 class albumController extends Controller
 
 //Метод отвечает за добавление нового альбома пользователя
{
   public function AddAlbum(){
	mkdir("image/galery/".$_SESSION['login']."/".$_POST["newalbum"], 0777);
	$user = new Users();
	$user->addNewAlbum($_SESSION,$_POST["newalbum"]);
	//$this->renderView('user/photogalery',array('count'=>$user->count,'photo'=>$user->countphoto,'name'=>$_SESSION['login'],'albums'=>$user->AlbumName,'album_folder'=>$friendLogin['album']));
	$this->ShowPhoto();
 }
	
	//Метод отвечает за отображение альбомов пользователя
	
	public function ShowPhoto(){
		$user = new Users();
		if ( isset($_GET['add']) ) {
			$friendLogin['login']= $_GET['add'];
			$user->GetAlbums($friendLogin);
		};
		if ( isset($_GET['album']) ) {
			$friendLogin['album']= $_GET['album'];
		};
		$this->renderView('user/photogalery',array('count'=>$user->count,'photo'=>$user->countphoto,'name'=>$friendLogin['login'],'albums'=>$user->AlbumName,'album_folder'=>$friendLogin['album']));
		
	}
	
	//метод отвечает за добавление фотографий в альбомы пользователей
	public function AddPhoto(){
		$albumfolder="image/galery/".$_SESSION['login']."/".$_GET['album']."/";
		$album=new ResizeController();
		$album->uploadImageToGalery($_SESSION['login'],$_GET['album']);
		$this->ShowPhoto();
    }
	
}
?>