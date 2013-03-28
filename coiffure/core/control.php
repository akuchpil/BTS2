<?php
class Control
{
	public $request;
	public $layout = 'default';
	private $rendered = false;
	private $vars = array();
	
	function __construct($request = NULL)
	{
		$this->Session = new Session(); 
		if($request)
		{
			$this->request = $request;
		}
	}
	
	function render($view)
	{
		if($this->rendered){return false;}
		extract($this->vars);
		if(strpos($view,'/')===0)
			$view = ROOT.DS.'view'.$view.'.php';
		else
			$view = ROOT.DS.'view'.DS.$this->request->control.DS.$view.'.php';
		ob_start();
		require $view;
		$content_for_layout = ob_get_clean();
		require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
		$this->rendered = true;
	}
	
	public function set($key,$values = NULL)
	{
		if(is_array($key))
			$this->vars += $key;
		else
			$this->vars[$key] = $values;
	}
	
	function e404($text)
	{
		header("HTTP/1.0 404 Not Found");
		$this->set("error",$text);
		$this->render('/error/404');
		die();
	}
	
	function loadModel($name){
		if(!isset($this->$name)){
			$file = ROOT.DS.'model'.DS.$name.'.php'; 
			require_once($file);
			$this->$name = new $name();
		}

	}
	
	function redirect($url,$code = NULL){
		if($code == 301){
			header("HTTP/1.1 301 Moved Permanently");
		}
		header("Location: ".Trace::url($url)); 
	}
}
?>