<?php if(isset($data['result'])): ?>
	<h1><?php echo $data['result']; ?></h1>
<?php endif; ?>


<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">

<title>Welcome!</title>

</head>

<body >

<div class="main"> 
<h2> Your page!</h2>
<p><a href = "http://vk.loc/index.php?r=user&a=update"> Settings </a></p>
<form method="post" class="login" action="http://vk.loc/index.php?r=user&a=logout">
<p><input type="submit" value="logout"> </p>
</form>
</div>


