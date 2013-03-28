<?php
class Userscontrol extends Control
{
	function index(){
		if($this->request->data)
		{
			$data = $this->request->data;
			$data->mdp = sha1($data->mdp);
			$this->loadModel('users');
			$user = $this->users->FindFirst(array(
				'fields' => array('login','password'),
				'conditions' => array('login' => $data->user,'password' => $data->mdp)
				));
			if(isset($user) && !empty($user))
			{
				$this->Session->create('User',$user);
				$this->Session->setFlash('Bienvenu',$user->login);
				$this->redirect('');
			}
			else
			{
				$this->Session->setFlash('error','mauvais','error');
				$this->redirect('');
			}
		}
	}
	
	function view(){
		$this->Session->setFlash('Aurevoir',$_SESSION['User']->login,'deco');
		$this->Session->del('User');
		$this->Session->del('Panier');
		$this->Session->del('color');
		$this->redirect('');
	}
}
?>