<?php
//include "Db.php";
class CommentController extends Controller
{
	private $data = array();
	//$this->data = $row;
		//	Конструктор
		
	
		//	Данный метод выводит разметку XHTML для комментария
		
	public function markup()
	{
		
		
		// Устанавливаем псевдоним, чтобы не писать каждый раз $this->data:
		$d = &$this->data;
		
		$link_open = '';
		$link_close = '';
		
		if($d['url']){
			
			// Если был введн URL при добавлении комментария,
			// определяем открывающий и закрывающий теги ссылки
			
			$link_open = '<a href="'.$d['url'].'">';
			$link_close =  '</a>';
		}
		
		// Преобразуем время в формат UNIX:
		$d['dt'] = strtotime($d['dt']);
		
		// Нужно для установки изображения по умолчанию:
		$url = 'http://'.dirname($_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]).'/img/default_avatar.gif';
		
		return '
		
			<div class="comment">
				<div class="avatar">
					'.$link_open.'
					<img src="http://www.gravatar.com/avatar/'.md5($d['email']).'?size=50&amp;default='.urlencode($url).'" />
					'.$link_close.'
				</div>
				
				<div class="name">'.$link_open.$d['name'].$link_close.'</div>
				<div class="date" title="Added at '.date('H:i \o\n d M Y',$d['dt']).'">'.date('d M Y',$d['dt']).'</div>
				<p>'.$d['body'].'</p>
			</div>
		';
	}
		/*
		/	Данный метод используется для проверки данных отправляемых через AJAX.
		/
		/	Он возвращает true/false в зависимости от правильности данных, и наполняет
		/	массив $arr, который преается как параметр либо данными либо сообщением об ошибке.
		*/
	public static function validate(&$arr)
	{
		
		$errors = array();
		$data	= array();
		
		// Используем функцию filter_input, введенную в PHP 5.2.0
		
		if(!($data['email'] = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)))
		{
			$errors['email'] = 'Пожалуйста, введите правильный Email.';
		}
		
		if(!($data['url'] = filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL)))
		{
			// Если в поле URL был введн неправильный URL,
			// действуем так, как будто URL не был введен:
			$url = '';
		}
		
		// Используем фильтр с возвратной функцией:
		
		if(!($data['body'] = filter_input(INPUT_POST,'body',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['body'] = 'Пожалуйста, введите текст комментария.';
		}
		
		if(!empty($errors)){
			// Если есть ошибки, копируем массив $errors в $arr:
			$arr = $errors;
			return false;
		}
		
		// Если данные введены правильно, подчищаем данные и копируем их в $arr:
		foreach($data as $k=>$v){
			$arr[$k] = mysql_real_escape_string($v);
		}
		
		// email дожен быть в нижнем регистре:
		$arr['email'] = strtolower(trim($arr['email']));
		return true;
		
	}

	
	
		//	Данный метод используется как FILTER_CALLBACK
		
	private static function validate_text($str)
	{
		
		if(mb_strlen($str,'utf8')<1)
			return false;
		
		// Кодируем все специальные символы html (<, >, ", & .. etc) и преобразуем
		// символ новой строки в тег <br>:
		
		$str = nl2br(htmlspecialchars($str));
		
		// Удаляем все оставщиеся символы новой строки
		$str = str_replace(array(chr(10),chr(13)),'',$str);
		
		return $str;
	}
	
	
	// Метод добавления комментария
	
	public function AddComment(){
		// Сообщение об ошибке:
		//error_reporting(E_ALL^E_NOTICE);

		
			/*	Данный массив будет наполняться либо данными,
			/	которые передаются в скрипт,
			/	либо сообщениями об ошибке.
		*/
		$arr = array();
		$arr = $_POST;
		//var_dump($_POST);
		//echo $_FILES["filename"]["name"];
	//	echo "<br>".$arr['add'];
		//$arr['filename']=$arr['login'].$_FILES["filename"]["name"];
	//	echo "filename".$arr['filename'];
		
		if ( isset($_GET['add']) ) {
			$arr['login'] = $_GET['add'];}; //здесь $arr['login'] - это не id залогиненого пользователя,
											// а id человека, которому пишем комментарий, костыль,
											//но он нужен, чтобы правильно работать с функцией getID
	//	$validates = CommentController::validate($arr);
		$validates=true;  // заглушка чтобы не проверяло введенные данные
		if($_FILES["filename"]["name"]!='')
		{
				$arr['filename']=$_SESSION['login'].$_FILES["filename"]["name"];
				$resize=new ResizeController;
				$resize->uploadImageforCommit();
		}
			else
			$arr['filename']=NULL;
		if($validates)
		{
			// Все в порядке, вставляем данные в базу: 
			$this->GetIdFriend($arr);
		}
		else
		{
			// Вывод сообщений об ошибке 
			echo 'Errors';
		} 
		
	}
	
	
	// Метод GetIdFriend определяет по login друга его id и вызывает метод добавления комментария в БД и передает ей массив данных
	public function GetIdFriend($arr){
		$commit= new Users();
		$commit->myid=null;
		$commit->getid($arr);
		$comment['Friend_Id']=$commit->myid;
		$arr['login']=$_SESSION['login'];
		$commit->myid=null;
		$commit->getid($arr);
		$comment['id']=$commit->myid;
		$comment['filename']="image/commit/".$arr['filename'];
		$comment['body']=$arr['body'];
		$comment['dt'] = date('r',time());
		echo '<div class="commentbody">';
		echo '<span class="letter">' . $_SESSION['login'].'</span>'.'<br>';
        echo $comment['login'];
        echo '<span class="postcore">'. $comment['body'].'</span>' .'<br>';
		echo $comment['dt'];
		$commit->AddCommentToDatabase($comment);
	}	
	
	
}
?>