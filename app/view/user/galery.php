
    <head>
        <title>Galery</title>
        <meta charset="utf-8">
    </head>	
		
        <input class="button stroke" type="button"  value="My profile" onclick="location.href='index.php?r=user&a=login'" >
		
		<div class="gallery">
        <a tabindex="1"><img src="/image/achieve/01.jpg"></a>

        <?php if($data['photo']>'9'): ?> <!--data['photo'] - кол-во фото-->,
               <?php echo '<a tabindex="2"><img src="/image/achieve/02.jpg"></a>';?>
        <?php else:?>
            <?php echo '<a tabindex="2"><img src="/image/achieve/Locked.jpg"></a>';?>
        <?php endif; ?>
        
        <?php if($data['count']>'29'): ?> <!--data['count'] - кол-во заходов на сайт-->,
              <?php echo '<a tabindex="3"><img src="/image/achieve/03.jpg"></a>';?>
        <?php else:?>
            <?php echo '<a tabindex="3"><img src="/image/achieve/Locked.jpg"></a>';?>
        <?php endif; ?>
                <!-- еще 9 какиз то ачивок-->
           <a tabindex="5"><img src="/image/achieve/Locked.jpg"></a>
           <a tabindex="6"><img src="/image/achieve/Locked.jpg"></a>
           <a tabindex="7"><img src="/image/achieve/Locked.jpg"></a>
           <a tabindex="8"><img src="/image/achieve/Locked.jpg"></a>
           <a tabindex="9"><img src="/image/achieve/Locked.jpg"></a>
           <a tabindex="10"><img src="/image/achieve/Locked.jpg"></a>
           <a tabindex="11"><img src="/image/achieve/Locked.jpg"></a>
           <a tabindex="12"><img src="/image/achieve/Locked.jpg"></a>
           <a tabindex="12"><img src="/image/achieve/Locked.jpg"></a>
         </div>
