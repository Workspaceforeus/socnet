<?php if(isset($data['result'])): ?>
	<h1><?php echo $data['result']; ?></h1>
<?php endif; ?>

<html>
<body>

	<form method="post" class="login" action="http://vk.loc/index.php?r=user&a=login"> <!--форма авторизации-->

			<label for="login">Login:</label>
			<div class="Enter">
			<input type="text" name="login">
			</div>

			<label for="password">Password:</label>
			<div class="Enter">
			<input type="password" name="password">
			</div>

			<p><input type="submit" value="Log in"> </p>
	

</form>
</body>
</html>