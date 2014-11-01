
    <head>
        <title>Profile</title>
      </head>
    <?if(isset($_GET['add'])):?>
    <div id="content"><?php echo '<span class="letter greenstat">'.$data["status"].'</span>'?></div><!--вывод статуса другого пользователя на странице-->
    
     <?else:?>   
    <div id="content" contenteditable="true" onclick="return showForm('update_status','content')"><?php echo '<span class="letter greenstat">'.$data["status"].'</span>'?></div><!--вывод статуса на странице-->

    <form method="post" action="" id="update_status" style="display:none" > <!--форма изменения статуса-->
            Введите статус: <input type="text" name="status" /><br/>
            <input id="sendstatus" type="button" value="Отправить" onclick="AjaxFormRequest('content', 'update_status', '/index.php?r=user&a=updatestatus')" />
        </form>
    
    
    <?endif?>
        
    


<div class="main"> 
        <div class="profile">
            <div class="photo">
                <?php echo '<img src="/image/galery/'.$data['name'].'/avatar/'.$data['name'].$data['cf'].'.jpg">'; ?> 
				<form>
				<input class="button stroke1" type="button"  value="Edit photo" onclick="location.href='/index.php?r=user&a=editphoto'" >
                <input class="button stroke" type="button"  value="Edit profile" onclick="location.href='/index.php?r=user&a=update'" >
				<input class="button friends1" type="button"  value="friends" onclick="location.href='/index.php?r=user&a=friends'" >
                <input class="button feed" type="button" value="Achivments"  onclick="location.href='/index.php?r=user&a=galery'" 	>
                <input class="button feed" type="button" value="Photo gallery"  onclick="location.href='/index.php?r=album&a=ShowPhoto&add=<?php echo $data['name'];?>&album=avatar'"   >
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
                 <a href="javascript:void(0)" onclick="showForm('gifts','')"><h2>Send a gift</h2></a> <!--раздел отправить подарок-->
                
                <div id="gifts" style="display:none" class="album"> <!--выбор подарка-->
				<span class="photo" data-title="Ваш друг не уделяет вам внимания? Отправьте ему этот незабываемый подарок!"> <a href='javascript:void(0)' onclick="sendGift('1','/index.php?r=gift&a=addgift&add=<?php echo $data['name'];?>&gift=1')"><img src="image/gifts/gift1.png" width="100px" height="100px"></a></span>
                <span class="photo" data-title="Ваш друг сидит за компьютером и не выходит гулять? Отправьте ему этот подарок!"><a href='javascript:void(0)' onclick="sendGift('2','/index.php?r=gift&a=addgift&add=<?php echo $data['name'];?>&gift=2')"><img src="image/gifts/gift2.png" width="100px" height="100px"></a></span>
				<span class="photo" data-title="Ваш друг хвастается своей новой фоткой? Сделайте себе приятное, отправьте ему это!"> <a href='javascript:void(0)' onclick="sendGift('3','/index.php?r=gift&a=addgift&add=<?php echo $data['name'];?>&gift=3')"><img src="image/gifts/gift3.png" width="100px" height="100px"></a></span>
                </div>
              
              

                <div id="qw" style="display:none"></div><!--результат попытки отправить подарок-->
              
                
                <h2>Albums</h2>
               <div class="album">
               <input class="button stroke" type="button"  value="<?php echo $data['name'];?>'s album" onclick="location.href='/index.php?r=album&a=ShowPhoto&add=<?php echo $data['name'];?>&album=avatar'" >
				<?php echo '<a tabindex="13"><img src="image/galery/'.$data['name'].'/'.$data['name'].$data['cf'].'.jpg"></a>'; ?>
                    <?php $cf= $data['cf']-1; echo '<a tabindex="13"><img src="image/galery/'.$data['name'].'/'.$data['name'].$cf.'.jpg"></a>'; ?>
                    <?php $cf= $data['cf']-2; echo '<a tabindex="13"><img src="image/galery/'.$data['name'].'/'.$data['name'].$cf.'.jpg"></a>'; ?>
                </div>
            </div>
        </div>
		<!-- Костыль! потом исправлю -->
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
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



        <!--Подарки-->
        <?php
		if(!isset($_GET['add']))
        {
                    for ($i=0;$i<3;$i++){
                    if($data['gifttype'][$i]==1)
                    {
    					echo '<div class="gift1">';
                        echo '<img src="image/gifts/gift1.png">';
    					echo '<div class="gtext">'. 'Пользователь '.$data['giftname'][$i].'хочет к себе внимания! Оставь на его стене 5 комментариев и эта какашка пропадет с твоего экрана!</div>';	
    					echo'</div>';    
                    }
                   if($data['gifttype'][$i]==2)
                   {
    					echo '<div class="gift2">';
                        echo '<img src="image/gifts/gift2.png">';
    					echo '<div class="gtext">'. 'Пользователь '.$data['giftname'][$i].'считает, что ты слишком много сидишь в социальных сетях! Отдохни ближайшие 12 часов!</div>';   
    					echo'</div>';  					
                    }
					 if($data['gifttype'][$i]==3)
                    {
    					echo '<div class="gift3">';
                        echo '<img src="image/gifts/gift3.png">';
    					echo '<div class="gtext">'. 'Пользователь '.$data['giftname'][$i].'завидует вашей красоте. Оставь 3 коментария отравителю, и подожди один час, чтобы он смирился с этим.</div>';	
    					echo'</div>';    
                    }
                    }
        }
        ?>
  