<?php if(isset($data['result'])): ?>
	<h2><?php echo $data['result']; ?></h2>
<?php endif; ?>

<form  method="post" class="main"  action="http://vk.loc/index.php?r=user&a=update">

<div class="left">
	<div class="enterl">
		<label for="email">E-mail*:</label>
		<?php echo "<input  type=\"text\" name=\"email\" value=\"$data['result']\">"?>
	</div>


	<div class="enterl">
		<label for="login">Login*:</label>
		<input type="name" name="login"> </p>
	</div>
Change pass:
<div class="enterl">
		<label for="password">Old password*:</label>
		<input type="password" name="password"></p>
	</div>
	<div class="enterl">
		<label for="password">New password*:</label>
		<input type="password" name="newpassword"></p>
	</div>


	<div class="enterl">
		<label for="confirm">Confirm new password*:</label>
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
			

</div>	

<br>
<div id="react">
	<p>
		<input type="submit" value="Send">
		<input type="reset" value="Reset">
		<input type="button" value="Back" onclick="location.href='/index.php'">
	</p>
</div>

</form>

