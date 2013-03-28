<script type="text/javascript">
function valider_f()
{
     	if(document.inscription.name.value=="" )
	{
		alert('veuillez remplir tous les champs ');
		document.inscription.name.focus();
	} else if(document.inscription.prenom.value=="")
	{
		alert('veuillez remplir tous les champs');
		document.inscription.prenom.focus();
	} else if(document.inscription.email.value=="")
	{
		alert('veuillez remplir tous les champs ');
		document.inscription.email.focus();
	}else if(document.inscription.ville.value== "")
	{
		alert('veuillez remplir tous les champs ');
		document.inscription.ville.focus();
	}else if(document.inscription.code_postal.value== "")
	{
		alert('veuillez remplir tous les champs ');
		document.inscription.code_postal.focus();
	}else if(document.inscription.adresse.value= "")
	{
		alert('veuillez remplir tous les champs ');
		document.inscription.adresse.focus();
	}else if(document.inscription.pass.value =="")
	{
		alert('veuillez remplir tous les champs ');
		document.inscription.pass.focus();
	}
	
	else if(document.inscription.pass.value != document.inscription.repass.value )
	{
		//valider=false;
		alert('les mot de passe ne correspondent pas');
		document.inscription.pass.focus();
	}else 
	{
		document.inscription.submit();
	}
}
</script>

<section>
		<div id="panel">
				<h1>Formulaire d' inscription</h1>
				<form method="post" action="valider.php" name="inscription">
						<label>Nom :</label>
						<input type="text" name="name">
						</br>
						<label>Prenom :</label>
						<input type="text" name="prenom">
						</br>
						<label>Email</label>
						<input type="email"name="email">
						</br>
						<label>Mot de passe</label>
						<input type="password" name="pass" >
						</br>
						<label>RE Mot de passe</label>
						<input type="password" name="repass">
						</br>
						<label>Adresse</label>
						<input type="text" name="adresse">
						</br>
						<label>Ville</label>
						<input type="text" name="ville">
						</br>
						<label>Code Postal</label>
						<input type="number" name="code_postal">
						</br>
						<input type="button"  value =" Valider"name="valider" onclick="valider_f()" >
				</form>
		</div>
</section>
