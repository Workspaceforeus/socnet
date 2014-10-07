<!DOCTYPE html>
<html>
    <head>
        <title>Galery</title>
        <meta charset="utf-8">
    </head>
    <body>		
		
        <input class="button stroke" type="button"  value="My profile" onclick="location.href='http://vk.loc/index.php?r=user&a=login'" >
		
		<div class="gallery">
        <img src="/image/achieve/01.jpg">

        <?php if($data['photo']>'9'): ?> <!--data['photo'] - кол-во фото-->,
              <?php echo '<img src="/image/achieve/02.jpg">';?>
        <?php else:?>
            <?php echo '<img src="/image/achieve/Locked.jpg">';?>
        <?php endif; ?>
        
        <?php if($data['count']>'29'): ?> <!--data['count'] - кол-во заходов на сайт-->,
              <?php echo '<img src="/image/achieve/03.jpg">';?>
        <?php else:?>
            <?php echo '<img src="/image/achieve/Locked.jpg">';?>
        <?php endif; ?>
                <!-- еще 9 какиз то ачивок-->
         <img src="/image/achieve/Locked.jpg">
         <img src="/image/achieve/Locked.jpg">
         <img src="/image/achieve/Locked.jpg">
         <img src="/image/achieve/Locked.jpg">
         <img src="/image/achieve/Locked.jpg">
         <img src="/image/achieve/Locked.jpg">
         <img src="/image/achieve/Locked.jpg">
         <img src="/image/achieve/Locked.jpg">
         <img src="/image/achieve/Locked.jpg">
         
          

        </div>
    </body>
</html>	