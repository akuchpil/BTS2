<?php
class Testcontrol extends Control
{
	function index()
	{
		if($this->request->data)
		{
			$data = $this->request->data;
			$data->mdp = sha1($data->mdp);
			$this->loadModel('users');
			$user = $this->users->FindFirst(array(
				'fields' => array('login','password','role'),
				'conditions' => array('login' => $data->user,'password' => $data->mdp)
				));
			if(isset($user) && !empty($user))
			{
				$this->Session->create('User',$user);
			}
			$this->request->data->mdp = '';
			//if($this->Session->isLogged())
				//$this->redirect('');
		}
		if($this->Session->isLogged())
		{
			$this->loadModel('products');
			$products['prod'] = $this->products->find();
			$this->set($products);
		}
		if($this->request->prod)
		{
			$this->Session->add($this->request->prod);
			$this->redirect('');
		}
		debug($_SESSION);
	}
	
	function view(){
		$this->loadModel('products');
		
		$id = array_keys($_SESSION['Panier']);
		$i = 0;
		foreach($id as $data)
		{
			$products['prod'][$i] = $this->products->find(array(
			'conditions' => array('id' => $data)
			));
			$i++;
		}
		$this->set($products);
		//$this->Session->del('Panier');
		//debug($_SESSION);
		//debug($products);
	}
	function view2($id)
	{
		$this->Session->add($id,'+');
		$this->redirect('test/view');
	}
	function view3($id)
	{
		$this->Session->add($id,'-');
		$this->redirect('test/view');
	}
	function view4($id)
	{
		$this->Session->del('Panier',$id);
		$this->redirect('test/view');
	}
}
?>