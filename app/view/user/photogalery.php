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
             echo '<img src="'.$file.'">';
            }
        ?>
        </div>
    </body>
</html>	