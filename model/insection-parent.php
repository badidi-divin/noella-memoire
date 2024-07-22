<?php
	
	// pour recuperer les informations notées sur le formulaire
	if (isset($_POST['envoie'])) {
   // respecter ce qui est demandé sur le formulaire
	$nom_de_famille=htmlspecialchars($_POST['nom_de_famille']);
	$email_parent=htmlspecialchars($_POST['email_parent']);
	$telephone_parent=htmlspecialchars($_POST['telephone_parent']);

	$errors=array();
	if (!empty($nom_de_famille) && !empty($email_parent) && !empty($telephone_parent)) {

     $ps=$pdo->prepare("INSERT INTO parent(nom_de_famille,email_parent,telephone_parent)VALUES(?,?,?)");
	//Pour bien recupere les données on crée un table de parametre
	 $params=array($nom_de_famille,$email_parent,$telephone_parent);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
	?>
	<script type="text/javascript">
		alert('Enregistrement Effectué avec Succès!')
	</script>
	<script>
		window.open('accueil.php','_self')
	</script>
	<?php
		exit();
	}else{
			$errors='completez les champs s\'il vous plait';	
	}
	
	}else{
		$errors='Tous les champs doivent être completés';
	}
		