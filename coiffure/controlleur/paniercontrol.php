<?php
class Paniercontrol extends Control
{
	function index($id,$slug)
	{
		if($this->Session->isLogged())
		{
			if(isset($id))
			{
				$this->Session->add($id);
				$this->Session->quantity($id,$this->request->data->qt);
				if(!empty($this->request->data->color))
					$this->Session->create('color',$this->request->data->color);
				$this->Session->setFlash($_SESSION['User']->login,'Votre produit est dans le panier','success');
				$this->redirect('produit/view/id:'.$id.'/slug:'.$slug,301);
				//if(isset($_SESSION['Panier']))
//					$key = array_keys($_SESSION['Panier']);
//				if(isset($key)){
//					foreach($key as $k=>$v)
//					{
//						if($v == $id)
//							$this->Session->add($id,'+');
//						else
//							$this->Session->add($id);
//					}
//				}
//				else
//					$this->Session->add($id);
//				$this->redirect('');
			}
		}
		else{
			$this->Session->setFlash('Error','Vous devez vous connecter','error');
			$this->redirect('produit/view/id:'.$id.'/slug:'.$slug,301);
		}
		
	}
	
	function view(){
			if(isset($_SESSION['Panier'])){
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
		}
		else{
			$this->redirect('');
		}
	}
}
?>