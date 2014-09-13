<?php 
session_start();
include '../classes/users.php';

if( (!empty($_POST['login'])) && (!empty($_POST['password'])))
{
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['password'] = $_POST['password'];
}

	$user = new Users();
	$user->login($_SESSION);
	$thankYouMessage=$user->result;

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

<div id="information"> 
<h1> Your page!</h1>
<?php
if(isset($thankYouMessage)) 
 		{echo $thankYouMessage; }
else 
	if(isset($error))
		echo $error;
	else
		echo 'arrr';
?>
</div>


<?php include 'footer.php'; ?>
