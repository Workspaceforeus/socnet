
    <head>
        <title>Friends</title>
    </head>
	
		<div>
        <input class="friends" type="button"  value="My friends^_^" onclick="location.href='index.php?r=user&a=friends'"  >
		<input class="friends" type="button"  value="All people" onclick="location.href='index.php?r=user&a=people'"  >
		</div>
		<hr class="friedsline"/>
		<div class="block-wear spesial">
		<input class=" button stroke" id="centerdeterb" type="button"  value="My profile" onclick="location.href='index.php?r=user&a=login'" >
		<div class="out-here">
		<?php
		// foreach($data['logins'] as $k=> $massiv)
		foreach(array_combine($data['logins'], $data['cf'])as $logins =>$cf)
		{
		echo "<br>".$logins;
		//{
		echo  '<div class="letter">'.$massiv['$inner_key'].'</div>' . '<img width="200" heigh="150" src="/image/galery/'.$logins.'/avatar/'.$logins.$cf.'.jpg">' ;
		echo '<br><'. 'input class' . '=' . '"button startle"' . 'type="button"' .  'value="go to the page the user"' . 'onclick=' . "location.href='index.php?r=user&a=userpage&add=".$logins."'><br>";
		echo $data['batton'].$logins."'". '>';
		//}
		}
		
		?>
		</div>
		</div>
		
		<!--Я еще присобачу этот чертов футер, когда найду-->
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
