<!DOCTYPE html>
<html>
    <head>
        <title>Galery</title>
        <meta charset="utf-8">
    </head>
    <body>		
		
        <input class="button stroke" type="button"  value="My profile" onclick="location.href='http://vk.loc/index.php?r=user&a=login'" >
		
		<div class="gallery">
           <?php if($data['count']>'3'): ?> <!--data['count'] - кол-во заходов на сайт-->,
              <?php echo '<img src="/image/achieve/achieve.jpg">';?>
            <?php endif; ?>
        </div>
    </body>
</html>	