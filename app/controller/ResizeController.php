<?php 
 class ResizeController extends Controller
{
    // *** Class variables
    private $image;
    private $width;
    private $height;
    private $imageResized;
    private $cf;
    
    public function upload() 
     {
     //var_dump($_GET);
     $newfilename=$_GET['add'].".jpg";
     $oldname=$_FILES["filename"]["name"];
     $albumfolder="image/galery/".$_SESSION["login"]."/avatar/";
     $cf=Controller::count_files("image/galery/".$_SESSION["login"]."/avatar/")+1;
     $newname=$albumfolder.$_GET['add'].$cf.".jpg";
     $oldname=$albumfolder.$oldname;
    //  echo $oldname;
     
    $this->UploadImage($albumfolder);
    // $resizeObj =$this-> RenameImage($oldfilename,$newfilename); //фунция переименования изображения в username
    $resizeObj =rename($oldname,$newname); //фунция переименования изображения в username
     //echo "<br>".$_FILES["filename"]["name"];
    // ECHO $newname."<br>";
           $resizeObj =$this->OpenBigImage($newname); //функция открытия изображения
            if($this->width > 250)
            {   
                $resizeObj =$this-> resizeImage($newname,250, 400, "landscape"); // функция изменения изображения, третий параметр отвечает за вид изменения
                $resizeObj =$this-> saveImage($newname, 100); //функция сохранения нового изображения
            };
            //echo "Done :) <br>";
            //echo '<a href =index.php?r=user&a=login> Back to your page </a>';
       header('Location:index.php?r=user&a=login');
       //$user=new usercontroller();
       //$user->login();
    }
    

        //создал новый метод-копию upload, т.к. тот меня не устраивает
       public function uploadImageforCommit() {
            $albumfolder="image/commit/";
            $this->UploadImage($albumfolder);
            $newname=$albumfolder.$_SESSION['login'].$_FILES["filename"]["name"];
            $oldname=$albumfolder.$_FILES["filename"]["name"];
            $resizeObj =rename($oldname,$newname); //фунция переименования изображения в username
            $resizeObj =$this->OpenBigImage($newname); //функция открытия изображения
            if($this->width > 400)
            {
                $resizeObj =$this-> resizeImage($newname,400, 400, "landscape"); // функция изменения изображения, третий параметр отвечает за вид изменения
                $resizeObj =$this-> saveImage($newname, 100); //функция сохранения нового изображения
            };
       }
       
       //Метод загрузки фотографий в галерею пользователя
       
       public function uploadImageToGalery($login,$album){
        $albumfolder="image/galery/".$login."/".$album."/";
        $this->UploadImage($albumfolder);
        $newname=$albumfolder.$_FILES["filename"]["name"];
        $resizeObj =$this->OpenBigImage($newname); //функция открытия изображения
        if($this->width > 800)
        {   
            $resizeObj =$this-> resizeImage($newname,800, 1200, "landscape"); // функция изменения изображения, третий параметр отвечает за вид изменения
            $resizeObj =$this-> saveImage($newname, 100); //функция сохранения нового изображения
        };
       }
       
       
       
       //Метод универсальной загрузки фотографии, работает для загрузки фотографии в комментариях и альбомах пользователей
        public function UploadImage($albumfolder){
        if($_FILES["filename"]["size"] > 1024*3*1024)
        {
            echo ("Размер файла превышает три мегабайта");
            exit;
        }
        
        // Проверяем загружен ли файл
        if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
        {
            // Если файл загружен успешно, перемещаем его
            // из временной директории в конечную
            move_uploaded_file($_FILES["filename"]["tmp_name"],$albumfolder.$_FILES["filename"]["name"]);
            
              }
              else {echo "<br>dont download";};
        }
        
        //метод отвечающий за добавление фотографии пользователя в альбома
    
        
    
            //Функция переименования загруженных файлов
            
            private function RenameImage ($oldname,$newname)
            {
                $extension = strtolower(strrchr($oldname, '.'));
                $newnameav=$newname.".jpg";
                rename("image/galery/".$_SESSION["login"]."/avatar/$oldname","image/galery/".$_SESSION["login"]."/avatar/$newnameav");
               /* $this->cf=Controller::count_files("image/galery/".$_SESSION["login"]);
                $newnameg=$newname.$this->cf.".jpg";
                rename("image/galery/".$_SESSION["login"]."/$oldname","image/galery/".$_SESSION["login"]."/$newnameg");*/

            }
        
            
            function OpenBigImage($fileName)
            {
                // *** Open up the file
                
                $this->image = $this->openImage($fileName);
            //  echo "ширина=".imagesx($this->image);
            //  $this->image =imagejpeg($fileName);
                // *** Get width and height
               $this->width  = imagesx($this->image);
                $this->height = imagesy($this->image);
            }  
 
            ## --------------------------------------------------------
 
            private function openImage($file)
            {
            //  echo "имя файла".$file;
                // *** Get extension
                $extension = strtolower(strrchr($file, '.'));
 
                switch($extension)
                {
                    case '.jpg':
                    case '.jpeg':
                        $img = @imagecreatefromjpeg($file);
                        break;
                    case '.gif':
                        $img = @imagecreatefromgif($file);
                        break;
                    case '.png':
                        $img = @imagecreatefrompng($file);
                        break;
                    default:
                        $img = false;
                        break;
                }
                return $img;
            }
 
            ## --------------------------------------------------------
 
            public function resizeImage($newname,$newWidth, $newHeight, $option="auto")
            {
                // *** Get optimal width and height - based on $option
                $optionArray = $this->getDimensions($newWidth, $newHeight, $option);
 
                $optimalWidth  = $optionArray['optimalWidth'];
                $optimalHeight = $optionArray['optimalHeight'];
 
 
                // *** Resample - create image canvas of x, y size
                $this->imageResized = imagecreatetruecolor($optimalWidth, $optimalHeight);
                imagecopyresampled($this->imageResized, $this->image, 0, 0, 0, 0, $optimalWidth, $optimalHeight, $this->width, $this->height);
 
 
                // *** if option is 'crop', then crop too
                if ($option == 'crop') {
                    $this->crop($optimalWidth, $optimalHeight, $newWidth, $newHeight);
                }
            }
 
            ## --------------------------------------------------------
            
            private function getDimensions($newWidth, $newHeight, $option)
            {
 
               switch ($option)
                {
                    case 'exact':
                        $optimalWidth = $newWidth;
                        $optimalHeight= $newHeight;
                        break;
                    case 'portrait':
                        $optimalWidth = $this->getSizeByFixedHeight($newHeight);
                        $optimalHeight= $newHeight;
                        break;
                    case 'landscape':
                        $optimalWidth = $newWidth;
                        $optimalHeight= $this->getSizeByFixedWidth($newWidth);
                        break;
                    case 'auto':
                        $optionArray = $this->getSizeByAuto($newWidth, $newHeight);
                        $optimalWidth = $optionArray['optimalWidth'];
                        $optimalHeight = $optionArray['optimalHeight'];
                        break;
                    case 'crop':
                        $optionArray = $this->getOptimalCrop($newWidth, $newHeight);
                        $optimalWidth = $optionArray['optimalWidth'];
                        $optimalHeight = $optionArray['optimalHeight'];
                        break;
                }
                return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
            }
 
            ## --------------------------------------------------------
 
            private function getSizeByFixedHeight($newHeight)
            {
                $ratio = $this->width / $this->height;
                $newWidth = $newHeight * $ratio;
                return $newWidth;
            }
 
            private function getSizeByFixedWidth($newWidth)
            {
                $ratio = $this->height / $this->width;
                $newHeight = $newWidth * $ratio;
                return $newHeight;
            }
 
            private function getSizeByAuto($newWidth, $newHeight)
            {
                if ($this->height < $this->width)
                // *** Image to be resized is wider (landscape)
                {
                    $optimalWidth = $newWidth;
                    $optimalHeight= $this->getSizeByFixedWidth($newWidth);
                }
                elseif ($this->height > $this->width)
                // *** Image to be resized is taller (portrait)
                {
                    $optimalWidth = $this->getSizeByFixedHeight($newHeight);
                    $optimalHeight= $newHeight;
                }
                else
                // *** Image to be resizerd is a square
                {
                    if ($newHeight < $newWidth) {
                        $optimalWidth = $newWidth;
                        $optimalHeight= $this->getSizeByFixedWidth($newWidth);
                    } else if ($newHeight > $newWidth) {
                        $optimalWidth = $this->getSizeByFixedHeight($newHeight);
                        $optimalHeight= $newHeight;
                    } else {
                        // *** Sqaure being resized to a square
                        $optimalWidth = $newWidth;
                        $optimalHeight= $newHeight;
                    }
                }
 
                return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
            }
 
            ## --------------------------------------------------------
 
            private function getOptimalCrop($newWidth, $newHeight)
            {
 
                $heightRatio = $this->height / $newHeight;
                $widthRatio  = $this->width /  $newWidth;
 
                if ($heightRatio < $widthRatio) {
                    $optimalRatio = $heightRatio;
                } else {
                    $optimalRatio = $widthRatio;
                }
 
                $optimalHeight = $this->height / $optimalRatio;
                $optimalWidth  = $this->width  / $optimalRatio;
 
                return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
            }
 
            ## --------------------------------------------------------
 
            private function crop($optimalWidth, $optimalHeight, $newWidth, $newHeight)
            {
                // *** Find center - this will be used for the crop
                $cropStartX = ( $optimalWidth / 2) - ( $newWidth /2 );
                $cropStartY = ( $optimalHeight/ 2) - ( $newHeight/2 );
 
                $crop = $this->imageResized;
                //imagedestroy($this->imageResized);
 
                // *** Now crop from center to exact requested size
                $this->imageResized = imagecreatetruecolor($newWidth , $newHeight);
                imagecopyresampled($this->imageResized, $crop , 0, 0, $cropStartX, $cropStartY, $newWidth, $newHeight , $newWidth, $newHeight);
            }
 
            ## --------------------------------------------------------
 
            public function saveImage($savePath, $imageQuality="100")
            {
                // *** Get extension
                $extension = strrchr($savePath, '.');
                $extension = strtolower($extension);
                imagejpeg($this->imageResized, $savePath, $imageQuality);
 
              /*  switch($extension)
                {
                    case '.jpg':
                    case '.jpeg':
                        if (imagetypes() & IMG_JPG) {
                            imagejpeg($this->imageResized, $savePath, $imageQuality);
                        }
                        break;
 
                    case '.gif':
                        if (imagetypes() & IMG_GIF) {
                            imagegif($this->imageResized, $savePath);
                        }
                        break;
 
                    case '.png':
                        // *** Scale quality from 0-100 to 0-9
                        $scaleQuality = round(($imageQuality/100) * 9);
 
                        // *** Invert quality setting as 0 is best, not 9
                        $invertScaleQuality = 9 - $scaleQuality;
 
                        if (imagetypes() & IMG_PNG) {
                             imagepng($this->imageResized, $savePath, $invertScaleQuality);
                        }
                        break;
 
                    // ... etc
 
                    default:
                        // *** No extension - No save.
                        break;
                }*/
 
               imagedestroy($this->imageResized);
            }
 
 
            ## --------------------------------------------------------
 
        }
?>