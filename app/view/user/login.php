<?php if(isset($data['result'])): ?>
	<h1><?php echo $data['result']; ?></h1>
<?php endif; ?>



<div class="block-wear">
<form method="post"  action="/index.php?r=user&a=login"> <!--форма авторизации-->
<div> <label for="login">Login*:</label> <input name="login" class="input-login" type="text" placeholder="enter your login" title="enter your name" </div>
<div><label for="password">Password*:</label><input name="password" class="input-login" type="password" placeholder="insert password" title="insert password" </div>			

			<div><input class="submit" type="submit" value="Log in"></div>
</form>
</div>
