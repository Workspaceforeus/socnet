<?php if(isset($data['result'])): ?>
	<h2><?php echo $data['result']; ?></h2>
<?php endif; ?>
<!doctype html>
<html>
	<head>
			<meta charset="UTF-8">
			<title>Edit profile</title>
			<link href='http://fonts.googleapis.com/css?family=Cantarell:400,700,400italic' rel='stylesheet' type='text/css'>
			
	</head>
<body>


<div class="block-wear">
<form  method="post" class="main"  action="/index.php?r=user&a=update">
<div class="left">
<h2>Change pass:</h2>
<div><label for="oldpass">Old password*:</label><input name="oldpass" class="input-login" type="password" placeholder="password" title="insert old password" </div>
<div><label for="pass">New password*:</label><input name="pass" class="input-login" type="password" placeholder="insert new password" title="insert new password" </div>
<div><label for="confirm">Confirm password*:</label><input name="confirm" class="input-login" type="password" placeholder="confirm password" title="confirm password" </div>
<div><label for "sex"><h3>Change your sex realy?:</h3></label> <input type="radio" name="sex" value="male"> Male <input type="radio" name="sex" value="female"> Female</p></div>
<div><label for="dob"><h3>My new age</h3></label><input name="dob" class="input-login" id="age" type="date" placeholder="insert your age" title="insert your age" ></div><br>			
			<h3> New interests </h3>
			<div><textarea name="interests" class="input-login" type="text" placeholder="favorite games"s> </textarea>  </div>
<br/>	
	
<input  class="submit" type="submit" value="Save Changes"  title="Save" >	
<input id="hoi" class="submit" type="button" value="back to profile"  title="back to profile" onclick="location.href='/index.php?r=user&a=login'">
	
	
	



</div>
</form>
</div>
</body>
</html>
