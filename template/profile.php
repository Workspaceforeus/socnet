<?php 
include "../classes/users.php";

if( (!empty($_POST['login'])) && (!empty($_POST['password'])))
{
	$user = new User();
	$user->login($_POST);
	$thankYouMessage=$user->result;
}
else
	{
	 	$error = 'something wrong';
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

<div id="information"> 
<p>
<h1> Your page!</h1>

<?php
echo $thankYouMessage;
?>
<?php include 'footer.php'; ?>
