<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/indstyle.css"> 
<title>Welcome!</title>

</head>

<body link=#FFFFFF vlink=#1F3778>

<?php include "/template/header.php"; ?>

<form method="post" class="login"> <!--форма авторизации-->

		<label for="login">Login:</label>
		<div class="Enter">
		<input type="text" name="login">
		</div>

		<label for="password">Password:</label>
		<div class="Enter">
		<input type="password" name="password">
		</div>

		<p><input type="checkbox" name="mem" value="1"><b>Remember my account</b></p>
		<p><input type="submit" value="Log in"> </p>

</form>

<div id="information"> 
<p>
<h1> Welcome to our website!</h1>

<h2><pre>Our site is the only existing social network for people,
 who like board games!</pre></h2>

<p><a href="/template/registration.php" >Registration</a></p>
</p>
</div>

<?php include "/template/footer.php" ?>