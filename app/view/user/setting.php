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

<form  method="post" class="main"  action="http://vk.loc/index.php?r=user&a=update">
<div class="left">
<h2>Change pass:</h2>
<div><label for="oldpass">Old password*:</label><input name="oldpass" class="input-login" type="password" placeholder="password" title="insert old password" </div>
<div><label for="pass">New password*:</label><input name=" new pass" class="input-login" type="password" placeholder="insert new password" title="insert new password" </div>
<div><label for="confirm">Confirm password*:</label><input name="confirm" class="input-login" type="password" placeholder="confirm password" title="confirm password" </div>
<div><label for "sex"><h3>Change your sex realy?:</h3></label> <input type="radio" name="sex" value="male"> Male <input type="radio" name="sex" value="female"> Female</p></div>
			
			
			<h3> New interests </h3>
			<div><textarea name="interests" class="input-login" type="text" placeholder="favorite games"> </textarea>  </div>
<br/>	
	
<input  class="submit" type="submit" value="Save Changes"  title="Save" >	
	
	
	
	



</div>
</form>
</div>
</body>
</html>
