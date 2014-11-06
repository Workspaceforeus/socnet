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
			$friendLogin['login']= $_GET['add'];//$_GET['add']=Users_login
			$user->GetAlbums($friendLogin);
		};
		if ( isset($_GET['album']) ) {
			$friendLogin['album']= $_GET['album'];// $_GET['album']=альбом, фотографии из которого желает увидеть пользователь
			$user->getIdAlbum($_GET['album'],$_GET['add']);
		//	echo $user->album_id;
			 $user->GetPhotoFromDataBase($friendLogin['login'],$user->album_id);
		};
	//	var_dump($user->AlbumName);
	//	echo "<br>".$_GET['album'];
		$this->renderView('user/photogalery',array('name'=>$friendLogin['login'],'albums'=>$user->AlbumName,'fotos'=>$user->fotos,'album_folder'=>$_GET['album']));
	}
	
	//метод отвечает за добавление фотографий в альбомы пользователей
	public function AddPhoto(){
		$albumfolder="image/galery/".$_SESSION['login']."/".$_GET['album']."/";
		$album=new ResizeController();
		$album->uploadImageToGalery($_SESSION['login'],$_GET['album']);
		$this->ShowPhoto();
    }
	
	public function ShowAllPhoto(){
		//echo "inside";
		$user = new Users();
		if ( isset($_GET['add']) ) {
			$friendLogin['login']= $_GET['add'];
			$user->GetAlbums($friendLogin);
			$user->GetAllPhotos($_GET['add']); 
			$this->renderView('user/photogalery',array('name'=>$friendLogin['login'],'albums'=>$user->AlbumName,'fotos'=>$user->fotos));
		
		};
	}
	
	
	
	
}
?>