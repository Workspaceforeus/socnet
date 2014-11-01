    <head>
        <title>Galery</title>
        <meta charset="utf-8">
    </head> 
        <input class="button stroke" type="button"  value="My profile" onclick="location.href='/index.php?r=user&a=login'" >
        <?php
            if ($_SESSION['login']==$data['name']){
            echo "<p>Add new album</p><form method=\"post\"  action=\"/index.php?r=album&a=AddAlbum&add=".$data['name']."&album=avatar\"> <!--форма создания нового альбома-->
                <div> <label for=\"NewAlbum\">Enter the name of new album:</label><br> <input name=\"newalbum\" class=\"input-newalbum\" type=\"text\" placeholder=\"new\" title=\"Add new album\" </div>           
                <div><input class=\"button stroke\" type=\"submit\" value=\"Save\"></div></form>
                
        <p>Add new photo to ".$data['name']."'s albume ".$data['album_folder']."</p><br>
        <form method=\"post\" enctype=\"multipart/form-data\" action=\"/index.php?r=album&a=AddPhoto&add=".$data['name']."&album=".$data['album_folder']."\"> <!--форма добавления новой фотографии-->
                <input type=\"file\" name=\"filename\" id=\"file\" />
        <div align=\"right\"></div>
        <div><input class=\"button stroke\" type=\"submit\" value=\"Save\"></div>
            </form>";
            }
        ?>
        <p><?php echo $data['name']."'s albums";
                echo "<br>";
                echo '<a href="/index.php?r=album&a=ShowPhoto&add='.$data['name'].'&album='."avatar".'">'.avatar.'</a>';
                            echo "<br>";
                if (!empty($data['albums'])){
                    foreach($data['albums'] as $album)
                        {
                            echo '<a href="/index.php?r=album&a=ShowPhoto&add='.$data['name'].'&album='.$album.'">'.$album.'</a>';
                            echo "<br>";
                        }
                    };
                //var_dump($data['albums']);
            ?></p>
        <h1>The Album <?php echo $data['album_folder']." of ".$data['name']."<br>"; ?><h1>
        <div class="gallery">
        <?php
            $ar=glob('image/galery/'.$data['name'].'/'.$data['album_folder'].'/*.jpg');
        foreach($ar as $file)
            {
             echo '<a tabindex="1"><img src="'.$file.'"></a>';
            }
        ?>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
