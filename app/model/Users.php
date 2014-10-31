<?php

include "Db.php";

class Users extends Database
{
	const TABLE='users';

	public $result;
	
	public $mymail;
	public $mysex;
	public $mygenre;
	public $mylogin;
	protected $mypass;
	public $mydob;
	public $val;
	public $temp;
	public $id;
	public $myage;
	public $count;//кол-во залогинивания на сайте
	public $countphoto;//
	public $myid;
	public $myfr;
	public $myfrdob;
	public $myfrstatus;
	public $peoplestatus;
	public $peoplen;
	public $peopled;
	public $status;
	public $CommentsId; //массив хранящий ID пользователей - авторов комментариев
	public $CommentsImage; //массив хранящий URL ссылок из комментариев
	public $CommentsFriend_id; //массив хранящий ID пользователей - чью страницу прокомментировали
	public $CommentsBody;   //массив содержащий текст комментариев
	public $CommentsDt;		//массив содержащий время комментария
	public $CountComments; // количество комментариев
	public $CommentsName;//имя коментатора
	public $isonline;//Онлайн или нет.
	public $giftid;//даритель
	public $gifttype;//типподарка
	public $gifttime;//время в которое подарен
	public $giftname;//имя дарителя
	

	public function validate($data)
	{
		$username=$data['login'];
		$mail=$data['email'];
		$pass=$data['password'];
		$conf=$data['confirm'];
		$sql1="SELECT email FROM users WHERE email='$mail'";
		$sql2="SELECT login FROM users WHERE login='$username'";
		$idmail = $this->db->prepare($sql1);
		$idlogin = $this->db->prepare($sql2);
		$idmail->execute();
		$mailrow = $idmail->fetch(PDO::FETCH_ASSOC);
		if(!empty($mailrow['email']))
		{
				$this->result='This e-mail is already in use!';
		}
		else
		{
			$idlogin->execute();
			$logrow = $idlogin->fetch(PDO::FETCH_ASSOC);
			if(!empty($logrow['login']))
				$this->result='This login is already in use!';
			else
			{
				if($pass!=$conf)
					$this->result='Password and confirm password is not equal!';
				else
					$this->result='Ok';
			}

		}

			
	}

	public function registration($data)
	{	
		try
		{			
			$insert = $this->db->prepare('INSERT INTO users (email, login, password,sex,numberofgames,dob,genre) VALUES (:email, :login, :password,:sex,:numberofgames,:dob,:genre)');
			$insert->bindParam(':email', $data['email']);
			$insert->bindParam(':login', $data['login']);
			$insert->bindParam(':password', $data['password']);
			$insert->bindParam(':sex', $data['sex']);
			$insert->bindParam(':numberofgames', $data['numberofgames']);
			$insert->bindParam(':dob', $data['dob']);
			$insert->bindParam(':genre', $data['interests']);
			$insert->execute();
			$this->result = 'Hello ' . $data['login']. '! Now you can log in!';
		} 
		catch(Exception $e) 
		{
			$this->result = $e->getMessage();
		}
	}

	protected function getpassword($data)
	{
		$username=$data['login'];
		$sql="SELECT password FROM users WHERE login='$username'";
		$insert = $this->db->prepare($sql);
		$insert->execute();
		while ($myrow = $insert->fetch(PDO::FETCH_ASSOC)) 
			{
				$this->mypass.=$myrow['password'];
			}

	}

	public function getcount($data)
	{
		$username=$data['login'];
		$sql="SELECT count FROM users WHERE login='$username'";
		$insert = $this->db->prepare($sql);
		$insert->execute();
		while ($myrow = $insert->fetch(PDO::FETCH_ASSOC)) 
		{
			$this->count=$myrow['count'];
		}

	}

	public function count($data)
	{
		$username=$data['login'];
		$this->getcount($data);
		$this->count++;
		$sqlcount="UPDATE users SET count='$this->count' WHERE login='$username'";
		$insert = $this->db->prepare($sqlcount);
		$insert->execute();
		
	}

	public function login($data)
	{
		try
		{
			
			$username=$data['login'];
			$pass=$data['password'];
			$this->getpassword($data);
			if(empty($this->mypass))
				{
					$this->result= 'Sorry, your login or passwors is wrong!!';
					$this->temp='0';
				}
			else
				{
					if($this->mypass==$pass)
						{
							$this->result=$username; 
							$this->temp = '1';
						}

					else
						{
							$this->result='Password is wrong!';
							$this->temp = '0';
						}

				}	
		}
 
		catch(Exception $e)
		{
			$this->result=$e->getMessage();
		}

	}

	public function getinformation($data)
	{
		$username=$data['login'];
		$sql=" SELECT dob,login,email,sex,genre FROM users WHERE login='$username'";
		$get = $this->db->prepare($sql);
		$get->execute();
		
		while ($myrow = $get->fetch(PDO::FETCH_ASSOC)) 
			{
				$this->mymail.=$myrow['email'];
				$this->mysex.=$myrow['sex'];
				$this->mylogin.=$myrow['login'];
				$this->mygenre.=$myrow['genre'];
				$this->mydob.=$myrow['dob'];
			}

	}
	public function getage($data)
	{
		$this->getinformation($data);
		$dayof=$this->mydob;
		$year=substr($dayof, 0, 4);
		$month=substr($dayof,5,2);
		$day=substr($dayof,8,2);
		if($month > date('m') || $month == date('m') && $day > date('d'))
    		$this->myage=date('Y') - $year - 1;
    	else
      		$this->myage= date('Y') - $year;

	
	} 

	public function updateinfo($data1, $data2)
	{
		$username=$data1['login'];
		$sex=$data2['sex'];
		if($sex) 
		{
			$sqlsex="UPDATE users SET sex='$sex' WHERE login='$username'";
			$insert = $this->db->prepare($sqlsex);
			$insert->execute();
			$this->result='Ok';
		}
		$dob=$data2['dob'];
		if($dob) 
		{
			$sqldob="UPDATE users SET dob='$dob' WHERE login='$username'";
			$insert = $this->db->prepare($sqldob);
			$insert->execute();
			$this->result='Ok';
		}
		$inter=$data2['interests'];

		if($inter!=' ')
		{
			$sqlin="UPDATE users SET genre='$inter' WHERE login='$username'";
			$insert = $this->db->prepare($sqlin);
			$insert->execute();
			$this->result='Ok';
		}
	}

	public function updatepass($data1,$data2)
	{
		$username=$data1['login'];
		$oldpass=$data2['oldpass'];
		$pass=$data2['pass'];
		$confirm=$data2['confirm'];
		if(($oldpass)&&($pass)&&($confirm))
		{
			$this->getpassword($data1);
				if($this->mypass==$oldpass)
				{
					if($pass==$confirm)
						{
							$sqlpass="UPDATE users SET password='$pass' WHERE login='$username'";
							$insert = $this->db->prepare($sqlpass);
							$insert->execute();
							$this->result='Ok';
						}
					else $this->result='Password and confirm password is not equal!';
				}
			else
				$this->result='Password is wrong!';
		}
		else $this->result='WTF';
		
	}

	public function getid($data)
	{
		$username=$data['login'];
		$sql=" SELECT id FROM users WHERE login='$username'";
		$get = $this->db->prepare($sql);
		$get->execute();
		
		while ($myrow = $get->fetch(PDO::FETCH_ASSOC)) 
			{
				$this->myid.=$myrow['id'];
			}			

	}


	public function getstatus($data)
	{
		$username=$data;
		$sql=" SELECT status FROM users WHERE login='$username'";
		$get = $this->db->prepare($sql);
		$get->execute();
		
		while ($myrow = $get->fetch(PDO::FETCH_ASSOC)) 
			{
				$this->status.=$myrow['status'];
			}			

	}

	public function updatestatus($data1,$data2)
	{
		$username=$data1['login'];
		$status=$data2['status'];
		$sqldob="UPDATE users SET status='$status' WHERE login='$username'";
		$insert = $this->db->prepare($sqldob);
		$insert->execute();
	}


	
	public function friends($data)
	{
		$this->getid($data);
		$sql="SELECT users.id,users.login, users.dob, users.status FROM users JOIN friends WHERE friends.id='$this->myid' AND users.id=friends.friend_id ";
		$peo = $this->db->prepare($sql);
		$peo->execute();
		while($myrow = $peo->fetch(PDO::FETCH_ASSOC))
		{
			$this->myfr[]=$myrow['login'];
			$this->myfrdob[]=$myrow['dob'];
			$this->myfrid[]=$myrow['id'];
			$this->myfrstatus[]=$myrow['status'];
		}
	}

	public function people($people)
	{
		$this->getid($people);
		$sql="SELECT users.id,users.login, users.dob FROM users ";
		$ople = $this->db->prepare($sql);
		$ople->execute();
		while($myrow = $ople->fetch(PDO::FETCH_ASSOC))
		{
			$this->peoplen[]=$myrow['login'];
			$this->peopled[]=$myrow['dob'];
			$this->peopleid[]=$myrow['id'];
			$this->peoplestatus[]=$myrow['status'];
		}
	}

	// метод отвечает за внесение id нового друга в таблицу friends для пользователя
	public function addNewFriendToBase($Friend_login,$user_login){
			$this->myid=null; 
			$this->getid($user_login); // отдаем Login username, получаем его id
			$user_id=$this->myid;
			$this->myid=null;
			$this->getid($Friend_login); // отдаем Login добавляемого друга, получаем его id
			$newFriendId=$this->myid;
			$sqladdfriend="INSERT INTO friends (id,friend_id)VALUES ('$user_id','$newFriendId')";
			$insert=$this->db->prepare($sqladdfriend);
			$insert->execute();
			}
			
	// метод отвечает за удаление id друга из таблицы friends для пользователя
	public function DeleteFriendFromBase($Friend_login,$user_login){
			$this->myid=null;
			$this->getid($user_login); // отдаем Login username, получаем его id
			$user_id=$this->myid;
			$this->myid=null;
			$this->getid($Friend_login); // отдаем Login удаляемого друга, получаем его id
			$newFriendId=$this->myid;
			$sqladdfriend="DELETE FROM friends WHERE id='$user_id' AND friend_id='$newFriendId'";
			$insert=$this->db->prepare($sqladdfriend);
			$insert->execute();
			}

			
	// Метод который добавляет комментарий (полученный в виде массива) в БД		
	public function AddCommentToDatabase($comment){
		$id=$comment['id'];
		$Friend_Id=$comment['Friend_Id'];
		$body=$comment['body'];
		$dt=$comment['dt'];
		$image=$comment['filename'];
		$sqladdcomment="INSERT INTO comments(id,image,friend_id,body,dt) VALUES ('$id','$image','$Friend_Id','$body','$dt')";
		//echo $sqladdcomment;
		$insert=$this->db->prepare($sqladdcomment);
		$insert->execute();
			//	Данные в $arr подготовлены для запроса mysql,
			//	но нам нужно делать вывод на экран, поэтому 
			//	готовим все элементы в массиве:
	//	$arr = array_map('stripslashes',$comment);
	
	//	$insertedComment = new CommentController($comment);

		//	Вывод разметки только-что вставленного комментария:
		
	//	echo json_encode(array('status'=>1,'html'=>$insertedComment->markup()));
	
	}
		
		// Метод выводит комментарии на странице для указанного пользователя
	public function GetCommentsFromBase($FriendLogin){
		//echo "login=".$FriendLogin;
		$this->myid=null;
		$this->getid($FriendLogin);
		$Friend_Id=$this->myid;
		$sqlcomment="SELECT users.login, comments.id,comments.image, comments.friend_id,comments.body,comments.dt  FROM comments, users WHERE comments.friend_id='$this->myid' AND users.id=comments.id";
		//echo $sqlcomment;
		$ople= $this->db->prepare($sqlcomment);
		$ople->execute();
		$this->CountComments=0;
		while($myrow = $ople->fetch(PDO::FETCH_ASSOC))
		{
			$this->CommentsName[]=$myrow['login'];
			$this->CommentsId[]=$myrow['id'];
			$this->CommentsImage[]=$myrow['image'];
			$this->CommentsFriend_id[]=$myrow['friend_id'];
			$this->CommentsBody[]=$myrow['body'];
			$this->CommentsDt[]=$myrow['dt'];
			$this->CountComments++;
		}
		/*var_dump($this->CommentsBody);
		var_dump($this->CommentsId);
		var_dump($this->CommentsFriend_id);
		var_dump($this->CommentsImage)*/;
	}
	
	// метод отвечает за выборку данных о пользователе по его id

	public function online($data,$i)// eсли 1 - обновляет последнее время посещения, елси 2 - проверяе онлайн или нет, если 3 - делает оффлайн
	{
		$username=$data['login'];	
		switch ($i)
		{
			case 1:
					$time=time();
					$sql="UPDATE users SET lasttime='$time' WHERE login='$username'";
					$insert=$this->db->prepare($sql);
					$insert->execute();
					break;
			case 2:
					$time_check=time()-600;
					$sql=" SELECT lasttime FROM users WHERE login='$username'";
					$get = $this->db->prepare($sql);
					$get->execute();
		
					while ($myrow = $get->fetch(PDO::FETCH_ASSOC)) 
					{
						$lasttime.=$myrow['lasttime'];
					}			
					if($lasttime>$time_check)
						$this->isonline='online';
					else 
						$this->isonline='offline';
					break;
			case 3:
					$this->isonline='offline';
					break;
		}
	}

	public function addgift($id,$friendid,$type)//добавление подарка
	{
		$time=date('r',time());
		$sqladdgift="INSERT INTO gifts (id,friend_id,type,time) VALUES ('$id','$friendid','$type','$time')";
		$insert=$this->db->prepare($sqladdgift);
		$insert->execute();
	}

	public function getgift($data)//получение информации о подарках на твоем профиле
	{
		
		$sqlgift="SELECT gifts.id,gifts.type,gifts.time,users.login FROM gifts,users WHERE gifts.friend_id='$data' AND users.id=gifts.id";
		$get = $this->db->prepare($sqlgift);
		$get->execute();
		while ($myrow = $get->fetch(PDO::FETCH_ASSOC)) 
			{
				$this->giftid[]=$myrow['id'];
				$this->gifttype[]=$myrow['type'];
				$this->gifttime[]=$myrow['time'];
				$this->giftname[]=$myrow['login'];
			}

	}

	public function countcomment($data1,$data2,$time)//количество комментариев от $data1 к $data2 после контрольного времени
	{

		$sqlcomments="SELECT * FROM comments WHERE id='$data1' AND friend_id='$data2' AND dt>'$time'";
		$get = $this->db->prepare($sqlcomments);
		$get->execute();
		while ($myrow = $get->fetch(PDO::FETCH_ASSOC)) 
		{
			$com++;
		}
		return $com;

	}

	public function deletegift($data)
	{
		$this->getgift($data);
		for($i=0; $i<2; $i++)
		{
			switch($this->gifttype[$i])
			{
				case 1://5 комментариев
										
					if($this->countcomment($data,$this->giftid[$i],$this->gifttime[$i])>=5)
					{
						$sql="DELETE FROM gifts WHERE friend_id='$data' AND type='1'";
						$get = $this->db->prepare($sql);
						$get->execute();
					}
					break;
				case 2://истечение 12 часов
					$tom=date('r',time());
					$tom1=date('r',strtotime("-12 hours", strtotime($tom)));
					$com=$this->gifttime[$i];
					if($tom1>$com)
					{
						$sql="DELETE FROM gifts WHERE friend_id='$data' AND type='2'";
						$get = $this->db->prepare($sql);
						$get->execute();
					}
					break;
			}
		}
	}


}
