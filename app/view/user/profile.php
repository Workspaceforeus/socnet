<?php if(isset($data['result'])): ?>
	<h1><?php echo $data['result']; ?></h1>
<?php endif; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <meta charset="utf-8">

    </head>
    <body>
	<div class="main"> 
			<h2> Your page!</h2>
        <div class="profile">
            <div class="photo">
                <img src="/image/avatar/.jpg">
				<form action="http://vk.loc/index.php?r=resize&a=upload" method="post" enctype="multipart/form-data">
				<input <input class="button picture" type="file" name="filename" > <input <input class="button picture"  type="submit" value="load">
				</form>
				<form>
                <input class="button stroke" type="button"  value="Edit profile" onclick="location.href='http://vk.loc/index.php?r=user&a=update'" >
                <input class="button feed" type="button" value="Achivments"  onclick="location.href='http://vk.loc/index.php?r=user&a=galery'" 	>
				<input class="button startle" type="button" value="Logout" onclick="location.href='http://vk.loc/index.php?r=user&a=logout'">
				</form>
            </div>
            <div class="info">
                <h2 id="info-title">Общая информация</h2>
                <div class="fact">
                    <div class="title">Name</div>
                    <div class="value"><?php echo $data['name'] ?></div>
                </div>
                <div class="fact">
                    <div class="title">Interests</div>
                    <div class="value"><?php if($data['genre']!='N;') echo $data['genre']; else echo 'Haven\'t decide yet' ?></div>
                </div>
                <div class="fact">
                    <div class="title">Sex</div>
                    <div class="value"><?php echo $data['sex'] ?></div>
                </div>
				     <div class="fact">
                    <div class="title">Age</div>
                    <div class="value"><?php echo $data['dob'] ?></div>
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
		</div>
		<!-- ЕСЛИ ЧТО УДАЛЯТЬ К ХРЕНАМ! -->
		 

		
    </body>
</html>	