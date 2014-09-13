<?php 
include "../classes/users.php";

if( (empty($_POST['login'])) || (empty($_POST['password'])) || (empty($_POST['email'])) || (empty($_POST['dob'])) || (empty($_POST['confirm']))) 
{
	$error = 'Please, back and complete all mandatory fields!';
}
else
	{
		$user = new Users();
		$user->validate($_POST);
		$cond=$user->validate;
		if($cond=='Ok')
		{
			$user->registration($_POST);
			$thankYouMessage = $user->result;
			include'thankyoupage.html';
		}
		else
		{
			$thankYouMessage = $cond;
			echo $thankYouMessage;
		}	

	}
	 	

?>

