<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHEVEUX NATURELS</title>
<link href='http://fonts.googleapis.com/css?family=Domine|PT+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'/webroot/css/style.css'; ?>"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL.'/webroot/js/mustache.js';?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL.'/webroot/js/jquery.notif.js';?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL.'/webroot/js/main.js';?>"></script>
</head>

<body>
<?php echo $this->Session->flash(); ?>
<div class="wrap">
  <header>
    <div id="top-header">	
      <p>CHEVEUX NATURELS MARL <span><?php echo date('d/m/Y'); ?></span></p>
    </div>
    <div id="bottom-header">
   		<?php if(!isset($_SESSION['User']))
			echo '<a href="'.Trace::url('form/index').'" id="inscri">inscription</a>';
		?>
      <?php
    	echo '<a href="#">'.Image::resize(ROOT.DS.'webroot'.DS.'img'.DS.'Afrance.gif',29,20).'</a>';
        echo '<a href="#">'.Image::resize(ROOT.DS.'webroot'.DS.'img'.DS.'Aangleterre.gif',29,20).'</a>';
        echo '<a href="#">'.Image::resize(ROOT.DS.'webroot'.DS.'img'.DS.'allemagne.png',29,20).'</a>';
		if(isset($_SESSION['User']))
		{
			echo '<div id="user_id">'.$_SESSION['User']->login.'<a href="'.Trace::url('users/view').'"> [X]</a></div>';
		}
		else
		{
	?>
      <form action="<?php echo Trace::url('users/index'); ?>" method="post">
        <label for="user">Pseudo  :</label>
        <input type="text" name="user" id="user"/>
        <label for="mdp">Mot de passe  :</label>
        <input type="password" name="mdp" id="mdp"/>
        <input type="submit" class="btn primary" value="Valider">
      </form>
      <?php
		}
	?>
    </div>
  </header>
  <nav>
    <ul>
      <li><a href="<?php echo Trace::url(''); ?>">Accueil</a></li>
      <li><a href="<?php $slug = slug('Cheveux naturels'); echo Trace::url("produit/view1/slug:$slug"); ?>">Cheveux naturels</a></li>
      <li><a href="<?php $slug = slug('Cheveux human hair'); echo Trace::url("produit/view1/slug:$slug"); ?>">Cheveux human hair</a></li>
      <li><a href="<?php $slug = slug('Cheveux synthétiques'); echo Trace::url("produit/view1/slug:$slug"); ?>">Cheveux synthétiques</a></li>
      <li><a href="#">Informations</a></li>
    </ul>
  </nav>
  <div class="content">
    <div id="content-left"><?php echo $content_for_layout; ?></div>
    <div id="content-right">
      <h1>Votre Panier :</h1>
      <p>Nombre d'article : <span>
        <?php 
	if(isset($_SESSION['Panier']))
		$nb = count($_SESSION['Panier']);
	else
		$nb = 0;
	echo $nb;
	?>
        </span></p>
	 <?php
    echo '<a href="'.Trace::url('panier/view').'">Accéder à mon Panier</a>';
    ?>
    </div>
  </div>
</div>
</body>
</html>
