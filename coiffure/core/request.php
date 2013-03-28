<?php
class Request
{
	public $url;
	public $data = false;
	public $page = 1;
	public $color;
	public $prefix = false;
	
	function __construct()
	{
		$this->url = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'/';
		if(isset($_GET['page']) && !empty($_GET['page'])){
			if(is_numeric($_GET['page'])){
				if($_GET['page'] > 0)
				{
					$page = intval($_GET['page']);
					$this->page = round($page); 
				}
			}
		}
		if(isset($_GET['color']) && !empty($_GET['color'])){
			$this->color = $_GET['color'];
		}
		if(isset($_POST) && !empty($_POST))
		{
			$this->data = new stdClass(); 
			foreach($_POST as $k=>$v){
				$this->data->$k=$v;
			}
		}
	}
}
?>