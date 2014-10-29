
    <head>
        <title>Galery</title>
        <meta charset="utf-8">
    </head>	
        <input class="button stroke" type="button"  value="My profile" onclick="location.href='/index.php?r=user&a=login'" >
		
		<div class="gallery">
        <?php $ar=glob('image/galery/'.$_SESSION["login"].'/*.jpg');
        foreach($ar as $file)
            {
             echo '<a tabindex="1"><img src="'.$file.'"></a>';
            }
        ?>
        </div>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
