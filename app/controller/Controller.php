<?php 

class Controller
{
	public $layout = 'layout/column';
	public function renderView($view, $data = array())
	{
		include_once BASE_PATH . '/app/view/'. $this->layout .'.php';
	}
	static public function count_files($dir)//кол-во файлов в директории
                { 
                    $c=0; // количество файлов. Считаем с нуля
                    $d=dir($dir); // 
                    while($str=$d->read())
                    { 
                      if($str{0}!='.')
                      { 
                        if(is_dir($dir.'/'.$str)) $c+=count_files($dir.'/'.$str); 
                        else $c++; 
                      }
                    }
                    $d->close(); // закрываем директорию
                    return $c;
                } 
         

}