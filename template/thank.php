<?php 
include "../classes/users.php";

if( (!empty($_POST['login'])) && (!empty($_POST['password'])) && (!empty($_POST['email']))&& (!empty($_POST['dob'])) && (!empty($_POST['confirm']))) 
{
	$user = new User();
	$user->registration($_POST);
	$thankYouMessage = $user->result;
}
else
	{
	 	$error = 'Please, back and complete all mandatory fields!';
	}

?>

<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/indstyle.css"> 
<title>Welcome!</title>

</head>

<body link=#FFFFFF vlink=#1F3778>

<?php include 'header.php'; ?>
<?php include "../template/login.php"; ?>
<div id="information"> 
<p>
<h1> Welcome to our website!</h1>

<h2><pre>
<?php 
	if(isset($thankYouMessage)) 
 		{echo $thankYouMessage; }
	else
		{echo $error ;}
 ?>
</div>

<?php include 'footer.php'; ?>