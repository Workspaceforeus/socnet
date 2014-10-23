<!DOCTYPE html>

<html>
    <head>
        <title>Profile</title>
        <meta charset="utf-8">
    
      </head>
    <body>
    <?if(isset($_GET['add'])):?>
    <div id="content"><?php echo '<span class="letter greenstat">'.$data["status"].'</span>'?></div><!--вывод статуса другого пользователя на странице-->
    
     <?else:?>   
    <div id="content" contenteditable="true" onclick="return showForm()"><?php echo '<span class="letter greenstat">'.$data["status"].'</span>'?></div><!--вывод статуса на странице-->

    <form method="post" action="" id="update_status" style="display:none" > <!--форма изменения статуса-->
            Введите статус: <input type="text" name="status" /><br/>
            <input type="button" value="Отправить" onclick="AjaxFormRequest('content', 'update_status', '/index.php?r=user&a=updatestatus')" />
        </form>
    
    
    <?endif?>
        
    


<div class="main"> 
        <div class="profile">
            <div class="photo">
                <?php echo '<img src="/image/avatar/'.$data['name'].'.jpg">'; ?> 
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
                <div class="online">
                <?php echo '<span class="greenmary">'. $data['online'] . '</span>' ?>
                </div>
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
	
		<div>
		</div>
		<!-- ЕСЛИ ЧТО УДАЛЯТЬ К ХРЕНАМ! -->
				<div class="fix">
		        <div class="fact ">
                    <?php
					for ($i=0;$i<$data['count'];$i++){
					echo '<div class="commentbody">';
					echo '<span class="letter">' . $data['commentname'][$i].'</span>'.'<br>';
					echo '<span class="postcore">'. $data['body'][$i].'</span>' .'<br>';
					echo $data['dt'][$i].'<br>';
					
					if (!empty($data['image'][$i])) { 
						echo '<img height="60px" width="60px" alt="no picture"  src="/image/commit/'.$data['image'][$i].'">';
						echo '<a href="/image/commit/'.$data['image'][$i]. '">'. 'Открыть картинку в полном размере!' .'</a>';
					};
					echo '</div>';
					};
					
                    ?>
				<div  id="lastfact">
				</div>
                </div>
				</div>

	
	
	<div  class="fix">
		<h3 id="nepashet">Add post</h3>
		<form  action="/index.php?r=comment&a=AddComment&add=<?php echo $data['name'];?>" method="post" enctype="multipart/form-data" onsubmit="return sendForm(this, ge('lastfact'))">
 
		<textarea class="texara" name="body" id="body"> </textarea><br/>
		<progress class="pBar" min="0" max="100" value="0">0% complete</progress>
		<input type="file" name="filename" id="file" />
		<div align="right"></div><div id="status"></div>
		<input class="button stroke1 mordor" type="submit" name="go" id="go" value="download" />
		</form>
		</div>
		</body>
</html>	