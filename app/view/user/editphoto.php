
    <head>
        <title>Galery</title>
    </head>	
		
        <input class="button stroke" type="button"  value="My profile" onclick="location.href='http:index.php?r=user&a=login'" >
		
		<?php echo '<img src="/image/galery/'.$data['name'].'/avatar/'.$data['name'].$data['$cf'].'.jpg">'; ?> 
				<form action="index.php?r=resize&a=upload&add=<?php echo $_SESSION['login'];?>" method="post" enctype="multipart/form-data">
				<input <input class="button picture" type="file" name="filename" > <input <input class="button picture"  type="submit" value="Load image">
				</form>
				<form>