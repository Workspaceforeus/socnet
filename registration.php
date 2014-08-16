<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<style>
body{background-image: url(registr.png);  background-size: cover; font-size: 105%; color: white; line-height: 65%;}
form{margin-left: 470px;}
.enter{margin-left: 70px;}
.enter.sec{margin-left: 100px;}
</style>
</head>
<body>
<h1>Complete this form for registration.</h2>

<form method="post">
<p>E-mail:</p>
<div class="enter">
 <input  type="name" name="email" placeholder="Enter exist e-mail">
</div>
<p>Login:</p>
<div class="enter">
<input type="name" name="login"> </p>
</div>
<p>Password:</p>
<div class="enter">
<input type="password" name="password"></p>
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
					<input type="checkbox" name="genre" value="Hist"> Historical	
					<input type="checkbox" name="genre" value="Party"> Party
<br></br>
					<input type="checkbox" name="genre" value="Econ"> Economic simulation
					<input type="checkbox" name="genre" value="SF">  Science fiction
<br></br>
					<input type="checkbox" name="genre" value="rpg">  RPG
					<input type="checkbox" name="genre" value="all">  all
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
