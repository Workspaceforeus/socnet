<!DOCTYPE html>
<html>
    <head>
        <title>Friends</title>
        <meta charset="utf-8">
    </head>
    <body>		
		<div>
        <input class="friends" type="button"  value="My friends^_^" onclick="location.href='index.php?r=user&a=friends'"  >
		<input class="friends" type="button"  value="All people" onclick="location.href='index.php?r=user&a=people'"  >
		</div>
		<hr class="friedsline"/>
		<div class="block-wear spesial">
		<input class=" button stroke" id="centerdeterb" type="button"  value="My profile" onclick="location.href='index.php?r=user&a=login'" >
		<div class="out-here">
		<?php
		 foreach($data['logins'] as $k=> $massiv)
		{
		//foreach($massiv  as  $inner_key => $value)
		//{
		echo  '<div class="letter">'. $massiv .'</div>' . '<img width="200" heigh="150" src="/image/avatar/'.$massiv.'.jpg">' ;
		echo $data['batton'].$massiv."'". '>';
		//}
		}
		
		?>
		</div>
		</div>
		
		<!--� ��� ��������� ���� ������ �����, ����� �����-->
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </body>
</html>	