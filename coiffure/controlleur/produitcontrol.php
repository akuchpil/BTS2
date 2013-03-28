<?php
class Produitcontrol extends Control
{
	function index(){
		$this->loadModel('products');
		$products['prod'] = $this->products->find();
		$this->set($products);
	}
	
	function view($id){
		$this->loadModel('products');
		$products['prod'] = $this->products->find(array(
			'conditions'=>array('id'=>$id))
		);
		if($this->request->color)
			$products['color'] = $this->request->color;
		$this->set($products);
	}
	
	function view1($slug){
		$this->loadModel('products');
		$products['prod'] = $this->products->find(array(
			'conditions'=>array('category' => $slug))
		);
		$this->set($products);
	}
}
?>