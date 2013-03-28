<?php
class Dispacher
{
	var $request;
	
	function __construct()
	{
		$this->request = new Request;
		Trace::parse($this->request->url,$this->request);
		$control = $this->open();
		$action = $this->request->action;
		
		if($this->request->prefix)
			$action = $this->request->prefix.'_'.$action;
		
		if(!in_array($action , array_diff(get_class_methods($control),get_class_methods('control'))) )
			$control->redirect("",301);
		call_user_func_array(array($control,$action),$this->request->get);
		$control->render($action);	
	}
	
	function open()
	{
		$open = $this->request->control.'control';
		$file = ROOT.DS.'controlleur'.DS.$open.'.php';
		if(!file_exists($file))
		{
			$this->error('L\'url n\'existe pas'); 
		} 
		require $file;
		$controller = new $open($this->request); 
		return $controller; 
	}
	
	function error($text)
	{
		$open = new control($this->request);
		$open->e404($text);
	}
}
?>