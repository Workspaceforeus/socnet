<?php if(isset($data['result'])): ?>
	<h1><?php echo $data['result']; ?></h1>
<?php endif; ?>


<!DOCTYPE html>
<html>
    <head>
        <title>профайл</title>
        <meta charset="utf-8">

    </head>
    <body>
	<div class="main"> 
			<h2> Your page!</h2>
        <div class="profile">
            <div class="photo">
                <img src="/image/lol.jpg">
				<form>
                <input class="button stroke" type="submit"  value="Edit profile">
                <input class="button feed" type="submit"  	value="Fun">
				<input class="button startle" type="submit" value="Logout">
				</form>
            </div>
            <div class="info">
                <h2 id="info-title">Общая информация</h2>
                <div class="fact">
                    <div class="title">Name</div>
                    <div class="value"><?php echo 'Вставить переменную имени' ?></div>
                </div>
                <div class="fact">
                    <div class="title">Interests</div>
                    <div class="value"><?php echo 'Вставить переменную жанра' ?></div>
                </div>
                <div class="fact">
                    <div class="title">Sex</div>
                    <div class="value"><?php echo 'Вставить переменную пола' ?></div>
                </div>
                <h2>Albums</h2>
                <div class="albums">
					<img src="/image/4.jpg">
                    <img src="/image/1.jpg">
                    <img src="/image/2.jpg">
                    <img src="/image/3.jpg">
                </div>
            </div>
        </div>
		<!-- Костыль! потом исправлю -->
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div>
		<form method="post" class="login" action="http://vk.loc/index.php?r=user&a=logout">
		<p><input type="submit" value="logout"> </p>
		</form>
		</div>
    </body>
</html>	


