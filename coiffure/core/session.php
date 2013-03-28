<?php
class Session
{
	public function __construct()
	{
		if(!isset($_SESSION))
			session_start();
	}
	
	public function setFlash($titre,$message,$type = 'success'){
		$_SESSION['flash'] = array(
			'title' => $titre,
			'message' => $message,
			'type'	=> $type
		);
	}

	public function flash(){
		if(isset($_SESSION['flash']['message'])){
			$html = '<script type="text/javascript">$("body").notif({title:"'.$_SESSION['flash']['title'].'",content:"'.$_SESSION['flash']['message'].'",cls:"'.$_SESSION['flash']['type'].'",});</script>';
			$this->del('flash');
			return $html; 
		}
	}
	
	public function create($key,$valeur)
	{
		$_SESSION[$key] = $valeur;
	}
	
	public function read($key = null)
	{
		if($key){
			if(isset($_SESSION[$key])){
				return $_SESSION[$key]; 
			}else{
				return false; 
			}
		}else{
			return $_SESSION; 
		}
	}

	public function isLogged()
	{
		//return isset($_SESSION['User']->role);
		if(isset($_SESSION['User']->login))
			return true;
		else
			return false;
	}
	
	public function add($id_prod,$ref=NULL)
	{
		if(isset($_SESSION['User']))
		{
			if(!isset($_SESSION['Panier']))
				$_SESSION['Panier'] = array();
			if(isset($_SESSION['Panier'][$id_prod]))
			{
				if($ref == '+')
						$_SESSION['Panier'][$id_prod]++;
				if($_SESSION['Panier'][$id_prod] > 1)
				{
					if($ref == '-')
						$_SESSION['Panier'][$id_prod]--;
				}
				else
					$_SESSION['Panier'][$id_prod] = 1;
			}
			else
				$_SESSION['Panier'][$id_prod] = 1;
		}
	}
	
	public function quantity($id_prod,$qt_prod)
	{
		if(isset($_SESSION['User']))
		{
			if(isset($_SESSION['Panier'][$id_prod]))
			{
				if($qt_prod >= 1)
					$_SESSION['Panier'][$id_prod]=$qt_prod;
				else
					$_SESSION['Panier'][$id_prod] = 1;
			}
		}
	}
	
	public function del($key, $id = NULL)
	{
		if($id)
			unset($_SESSION[$key][$id]);
		else
			unset($_SESSION[$key]);
	}
	
	public function user($key)
	{
		if($this->read('User')){
			if(isset($this->read('User')->$key)){
				return $this->read('User')->$key; 
			} else{
				return false;
			}
		}
		return false;
	}
}
?>
