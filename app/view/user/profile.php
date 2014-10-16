

<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <meta charset="utf-8">

    </head>
    <body>
	<div class="main"> 
        <div class="profile">
            <div class="photo">
                <?php echo '<img src="/image/avatar/'.$_SESSION['login'].'.jpg">'; ?> 
				<form>
				<input class="button stroke1" type="button"  value="Edit photo" onclick="location.href='/index.php?r=user&a=editphoto'" >
                <input class="button stroke" type="button"  value="Edit profile" onclick="location.href='/index.php?r=user&a=update'" >
				<input class="button friends1" type="button"  value="friends" onclick="location.href='/index.php?r=user&a=friends'" >
                <input class="button feed" type="button" value="Achivments"  onclick="location.href='/index.php?r=user&a=galery'" 	>
                <input class="button feed" type="button" value="Photo gallery"  onclick="location.href='/index.php?r=user&a=photogalery'" 	>
				<input class="button startle" type="button" value="Logout" onclick="location.href='/index.php?r=user&a=logout'">
				</form>
            </div>
            <div class="info">
                <h2 id="info-title">General information</h2>
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
                <div class="album">
					<?php echo '<a tabindex="13"><img src="image/galery/'.$_SESSION["login"].'/'.$_SESSION['login'].$data['cf'].'.jpg"></a>'; ?>
                    <?php $cf= $data['cf']-1; echo '<a tabindex="13"><img src="image/galery/'.$_SESSION["login"].'/'.$_SESSION['login'].$cf.'.jpg"></a>'; ?>
                    <?php $cf= $data['cf']-2; echo '<a tabindex="13"><img src="image/galery/'.$_SESSION["login"].'/'.$_SESSION['login'].$cf.'.jpg"></a>'; ?>
                    <?php $cf= $data['cf']-3; echo '<a tabindex="13"><img src="image/galery/'.$_SESSION["login"].'/'.$_SESSION['login'].$cf.'.jpg"></a>'; ?>
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