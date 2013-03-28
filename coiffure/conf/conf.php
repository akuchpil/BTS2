<?php
class Conf{
	
	static $debug = 1; 

	static $databases = array(

		'default' => array(
			'host'		=> 'localhost',
			'database'	=> 'lol',
			'login'		=> 'root',
			'password'	=> ''
		)
	);


}

Trace::connect('','produit/index');
Trace::connect('user/deco','users/view');
Trace::connect('product/category/:slug','produit/view1/slug:([a-z0-9\-]+)');
Trace::connect('product/:slug-:id.html','produit/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Trace::connect('panier/:slug-:id.html','panier/index/id:([0-9]+)/slug:([a-z0-9\-]+)');
Trace::connect('Panier','panier/view');
Trace::connect('incription','form/index');
//Trace::connect('test/del/:slug-:id.html','test/view3/id:([0-9]+)/slug:([a-z0-9\-]+)');
//Trace::connect('test/erase/:slug-:id.html','test/view4/id:([0-9]+)/slug:([a-z0-9\-]+)');
?>