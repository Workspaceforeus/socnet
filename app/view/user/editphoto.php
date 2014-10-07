<!DOCTYPE html>
<html>
    <head>
        <title>Galery</title>
        <meta charset="utf-8">
    </head>
    <body>		
		
        <input class="button stroke" type="button"  value="My profile" onclick="location.href='http://vk.loc/index.php?r=user&a=login'" >
		
		<?php echo '<img src="/image/avatar/'.$_SESSION['login'].'.jpg">'; ?> 
				<form action="http://vk.loc/index.php?r=resize&a=upload" method="post" enctype="multipart/form-data">
				<input <input class="button picture" type="file" name="filename" > <input <input class="button picture"  type="submit" value="Load image">
				</form>
				<form>
    </body>
</html>	
