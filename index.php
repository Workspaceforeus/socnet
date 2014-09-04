<?php
session_start();

if(!empty($_SESSION['login']))	
	header('Location: /template/profile.php');
else
	echo 'session is empty';

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/indstyle.css"> 
<title>Welcome!</title>

</head>

<body link=#FFFFFF vlink=#1F3778>

<?php include "/template/header.php"; ?>

	<div id="information"> 
		<p>
		<h1> Welcome to our website!</h1>
		<h2><pre>Our site is the only existing social network for people,
		 who like board games!</pre></h2>
		 <?php include "/template/login.php" ?>
		 <p><a href="/template/registration.php"> Registration </a></p>
	 </div>
	


<?php include "/template/footer.php" ?>

