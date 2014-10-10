<!DOCTYPE html>
<html>
    <head>
        <title>Friends</title>
        <meta charset="utf-8">
    </head>
    <body>		
		<div>
        <input class="friends" type="button"  value="My friends^_^" onclick="http://vk.loc/index.php?r=user&a=friends >
		<input class="friends" type="button"  value="All people" onclick="http://vk.loc/index.php?r=user&a=people" >
		</div>
		<hr class="friedsline"/>
		<div>
		<?php
			var_dump($data);
			foreach($data as $K=>$v)
			{
				echo $k .'='.$v;
			}
		?>
		</div>
		
		<!--Я еще присобачу этот чертов футер, когда найду-->
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </body>
</html>	