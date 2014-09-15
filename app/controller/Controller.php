<?php 

class Controller
{
	public $layout = 'layout/column';
	public function renderView($view, $data = array())
	{
		include_once BASE_PATH . '/app/view/'. $this->layout .'.php';
	}

}