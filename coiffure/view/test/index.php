<?php 
if(isset($_SESSION['User']))
{
	foreach($prod as $data)
	{
		echo $data->title;
		echo "<br/>";
		echo "<a href=\"?id=".$data->id."\">".$data->prix."</a>";echo "<br/>";
	}
}
?>

<form action="<?php echo Trace::url('test/index'); ?>" method="post">
  <label for="user">Identifiant  :</label>
  <br />
  <input type="text" name="user" id="user"/>
  <br />
  <label for="mdp">Mot de passe  :</label>
  <br />
  <input type="password" name="mdp" id="mdp"/>
  <br />
  <br />
  <input type="submit" class="btn primary" value="Se connecter">
</form>
<br />
<a href="<?php echo Trace::url('test/index/id:17/slug:hello'); ?>">test</a> <a href="<?php echo Trace::url('test/view'); ?>">test</a>