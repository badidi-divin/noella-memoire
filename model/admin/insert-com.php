<?php
// pour recuperer les informations notées sur le formulaire
	if (isset($_POST['formconnect'])) {
   // respecter ce qui est demandé sur le formulaire
	$evenement=htmlspecialchars($_POST['evenement']);
	$description=htmlspecialchars($_POST['description']);
	$email=htmlspecialchars($_POST['email']);

	$errors=array();
	//Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("INSERT INTO individuel(nom,description,email)VALUES(?,?,?)");
					    //Pour bien recupere les données on crée un table de parametre
					    $params=array($evenement,$description,$email);
					    //Execution de la requête par leur paramètre en ordre 
					    $ps->execute($params);
						// Pour recuperer l'id du user
						?>
						<script type="text/javascript">
							alert('Enregistrement Effectué!')
						</script>
						<script>
							window.open('individuel.php','_self')
						</script>

					<?php
						exit();
	}
	
