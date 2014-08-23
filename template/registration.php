<?php 
if((!empty($_POST['login'])) && (!empty($_POST['password'])) && (!empty($_POST['email']))&& (!empty($_POST['dob']))) 
{
 $db = new PDO('mysql:host=localhost;dbname=vk;charset=utf8', 'root', '');
 $db->query('INSERT into users (email, login, password,sex,numberofgames,dob,historical,party,economic,sf,rpg,allgames) values ("' . $_POST['email'] . '", "' . $_POST['login'] . '", "' . $_POST['password'] . '", "' . $_POST['pol'] . '", "' . $_POST['numberofgames'] . '", "' . $_POST['dob'] .'", "' . $_POST['historical']. '" , "' . $_POST['party'] . '", "' . $_POST['economic'] .'", "' . $_POST['sf'] .'", "' . $_POST['rpg'] . '", "' . $_POST['all'] .'")');  
 $thankYouMessage = $_POST['login'] . ', thank you for registration';
}
else
{
 $thankYouMessage = 'Please, complete all mandatory fields!';
}
?>


<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="/regstyle.css">

</head>

<body>
<div id="bg">
<img src="bg.png">
</div> 


<h1>Complete this form for registration.</h1>
<br></br>
<?php
if(!empty($_POST))
{
echo $thankYouMessage;
}
?>

<form method="post" action="thank.php">

<p>E-mail*:</p>
<div class="enter">
 <input  type="name" name="email" placeholder="Enter exist e-mail">
</div>
<p>Login*:</p>
<div class="enter">
<input type="name" name="login"> </p>
</div>
<p>Password*:</p>
<div class="enter">
<input type="password" name="password"></p>
</div>
<p>Date of birth*:</p>
<div class="enter">
 <input  type="name" name="dob" maxlength=10 placeholder="DD/MM/YYYY">
</div>
<p>Choose your sex:</p> 
<div class="enter">
					<input type="radio" name="pol" value="male"> Male
					<input type="radio" name="pol" value="female"> Female</p>
</div>					
<p>How many board games you played?</p>
<div class="enter">
					<input  type="radio" name="numberofgames" value="little"> 0-5
					<input  type="radio" name="numberofgames" value="several"> 5-10
					<input  type="radio" name="numberofgames" value="many"> 10 and more
</div>					
					</p>
<p>What genre of board games do you like? </p>
<div class="enter">
					<input type="checkbox" name="historical" value="1"> Historical	
					<input type="checkbox" name="party" value="1"> Party
<br></br>
					<input type="checkbox" name="economic" value="1"> Economic simulation
					<input type="checkbox" name="sf" value="1">  Science fiction
<br></br>
					<input type="checkbox" name="rpg" value="1">  RPG
					<input type="checkbox" name="all" value="1">  all
</div>	
<br></br>
<label for="kapcha"><img src="kapcha.png"></label>
 <input type="name" name="kapcha">
 <p><input type="submit" value="Send">
<input type="reset" value="Reset">
<input type="button" value="Back" onclick="location.href='/index.php'" />
</p>

 </form>
</body>
</html>
