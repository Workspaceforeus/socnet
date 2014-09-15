<?php if(isset($data['result'])): ?>
	<h2><?php echo $data['result']; ?></h2>
<?php endif; ?>

<form  method="post" class="main"  action="http://vk.loc/index.php?r=user&a=registration">

<div class="left">
	<div class="enterl">
		<label for="email">E-mail*:</label>
		<input  type="name" name="email" placeholder="Enter exist e-mail">
	</div>


	<div class="enterl">
		<label for="login">Login*:</label>
		<input type="name" name="login"> </p>
	</div>

	<div class="enterl">
		<label for="password">Password*:</label>
		<input type="password" name="password"></p>
	</div>


	<div class="enterl">
		<label for="confirm">Confirm password*:</label>
		<input type="password" name="confirm"></p>
	</div>

	<div class="enterl">
		<label for="dob">Date of birth*::</label>
		<input  type="name" name="dob" maxlength=10 placeholder="DD/MM/YYYY">
	</div> \

</div>

<div class="right">

	<div class="enterr">
		<label for "pol">Choose your sex:</label> 
		<input type="radio" name="sex" value="male"> Male
		<input type="radio" name="sex" value="female"> Female</p>
	</div>					
	
	<div class="enterr">
		<label for="numberofgames">How many board games you played?</label><br>
		<input  type="radio" name="numberofgames" value="little"> 0-5 <br>
		<input  type="radio" name="numberofgames" value="several"> 5-10 <br>
		<input  type="radio" name="numberofgames" value="many"> 10 and more
	</div>					
			
	<div class="enterr">
		<p>What genre of board games do you like? </p>
						<input type="checkbox" name="game_type[]" value=" Historical"> Historical	
						<input type="checkbox" name="game_type[]" value="Party"> Party
						<input type="checkbox" name="game_type[]" value="Economic simulation"> Economic simulation
						<br>
						<input type="checkbox" name="game_type[]" value="Science fiction">  Science fiction
						<input type="checkbox" name="game_type[]" value="RPG">  RPG
						<input type="checkbox" name="game_type[]" value="all">  all
		
	</div> 

</div>	

<br>
<div id="react">
	<label for="kapcha"><img src="/image/kapcha.png"></label>
	<input type="name" name="kapcha">
	<p>
		<input type="submit" value="Send">
		<input type="reset" value="Reset">
		<input type="button" value="Back" onclick="location.href='/index.php'">
	</p>
</div>

</form>

