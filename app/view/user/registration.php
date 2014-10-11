<?php if(isset($data['result'])): ?>
	<h2><?php echo $data['result']; ?></h2>
<?php endif; ?>
<!doctype html>
<html>
	<head>
			<meta charset="UTF-8">
			<title>Registration</title>
			<link href='http://fonts.googleapis.com/css?family=Cantarell:400,700,400italic' rel='stylesheet' type='text/css'>
			
	</head>
<body>
<div class="block-wear">
<form  method="post" class="main"  action="/index.php?r=user&a=registration">

<div><label for="email">E-mail*:</label> <input name="email" class="input-login" type="email" placeholder="Enter exist e-mail" title="Напишите свой электронный адрес" </div>
<div> <label for="login">Login*:</label> <input name="login" class="input-login" type="text" placeholder="enter your login" title="enter your name" </div>
<div><label for="password">Password*:</label><input name="password" class="input-login" type="password" placeholder="insert password" title="insert password" </div>
<div><label for="confirm">Confirm password*:</label><input name="confirm" class="input-login" type="password" placeholder="confirm password" title="confirm password" </div>
<div><label for="dob">Date of birth*::</label><input name="dob" class="input-login" id="age" type="date" placeholder="insert your age" title="insert your age" ></div><br>
<div><label for "pol">Choose your sex:</label> <input type="radio" name="sex" value="male"> Male <input type="radio" name="sex" value="female"> Female</p></div>
			
	<div>
		<label for="numberofgames">How many board games you played?</label><br>
		<input  type="radio" name="numberofgames" value="little"> 0-5 <br>
		<input  type="radio" name="numberofgames" value="several"> 5-10 <br>
		<input  type="radio" name="numberofgames" value="many"> 10 and more
	</div>
			<h3>What genre of board games do you like? </h3>
			<div><textarea name="interests" class="input-login" type="text" placeholder="favorite games"> </textarea>  </div>
<!-- <div>
								<h3>What genre of board games do you like? </h3>
								<select><option>Choose one </option>
								<option>Historical</option>
								<option>Economic simulation</option>
								<option> Science fiction</option><
								<option>RPG</option></select>
								<option> qall</option></select>
						 НЕ УВЕРЕН ЧТО НУЖНЫ ИМПУТЫ (ВРОДЕ ВООБЩЕ НЕ НУЖНЫ) НО НЕ ДУМАЮ, ЧТО БЕЗ НИХ БУДЕТ РАБОТАТЬ. И БУДЕТ ЛИ РАБОТЬТАК ВООБЩЕ.
						 <input type="checkbox" name="game_type[]" value=" Historical"> Historical	
						 <input type="checkbox" name="game_type[]" value="Party"> Party
						 <input type="checkbox" name="game_type[]" value="Economic simulation"> Economic simulation
						 <br>
						<input type="checkbox" name="game_type[]" value="Science fiction">  Science fiction
						<input type="checkbox" name="game_type[]" value="RPG">  RPG
						<input type="checkbox" name="game_type[]" value="all">  all 
</div>
	<label for="kapcha"><img src="/image/kapcha.png"></label>
	<input type="name" name="kapcha">
	-->
	<p>
	<input  class="submit" type="submit" value="Send"  title="Cохранить" >
		<input class="submit" type="reset" value="Reset">
		<input class="submit" type="button" value="Back" onclick="location.href='/index.php'">
	</p>
</form>
</div>
</body>
</html>