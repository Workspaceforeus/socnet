<!DOCTYPE html>
<html>
    <head>
        <title>Friends</title>
        <meta charset="utf-8">
    </head>
    <body>		
		<div>
        <input class="friends" type="button"  value="My friends^_^" onclick="location.href='http://vk.loc/index.php?r=user&a=friends'"  >
		<input class="friends" type="button"  value="All people" onclick="location.href='http://vk.loc/index.php?r=user&a=people'"  >
		</div>
		<hr class="friedsline"/>
		<div class="block-wear spesial">
		<div class="out-here">
		<?php
		 foreach($data['logins'] as $k=> $massiv)
		{
		//foreach($massiv  as  $inner_key => $value)
		//{
		echo  '<div class="letter">'. $massiv .'</div>' . '<img width="200" heigh="150" src="/image/avatar/'.$massiv.'.jpg">' . '<input class=" button stroke1" type="submit"  value="Add friend^_^"onclick="location.href="http://vk.loc/index.php?r=user&a=friends"  >' ;
		echo '<'. 'input class' . '=' . '"button startle"' . 'type="button"' .  'value="Delete from your friend"' . 'onclick=' . "location.href='http://vk.loc/index.php?r=user&a=DeleteFriend&add=".$massiv."'".'>';
		//}
		echo '<'. 'input class' . '=' . '"button startle"' . 'type="button"' .  'value="Add friend^_^"' . 'onclick=' . "location.href='http://vk.loc/index.php?r=user&a=addFriend&add=".$massiv."'" . '>';
		}
		
		?>
		</div>
		</div>
		
		<!--Я еще присобачу этот чертов футер, когда найду-->
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </body>
</html>	