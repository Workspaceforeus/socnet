<!DOCTYPE html>
<html>
    <head>
        <title>Galery</title>
        <meta charset="utf-8">
    </head>
    <body>		
		
        <input class="button stroke" type="button"  value="My profile" onclick="location.href='http://vk.loc/index.php?r=user&a=login'" >
		
		<div class="gallery">
        <?php $ar=glob('image/galery/*.jpg');
        foreach($ar as $file)
            {
             echo '<a tabindex="1"><img src="'.$file.'"></a>';
            }
        ?>
        </div>
		<!--Я еще присобачу этот чертов футер, когда найду-->
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </body>
</html>	