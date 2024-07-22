<?php
// pour recuperer les informations notées sur le formulaire
	$requser=$pdo->prepare("SELECT * FROM individuel WHERE id=?");
		$requser->execute(array($_GET['id']));
		$userinfo=$requser->fetch();

	if (isset($_POST['formconnect'])) {
   // respecter ce qui est demandé sur le formulaire
	$evenement=htmlspecialchars($_POST['evenement']);
	$description=htmlspecialchars($_POST['description']);
	$email=htmlspecialchars($_POST['email']);

	$errors=array();
	//Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("UPDATE individuel SET nom=?,description=?,email=? WHERE id=?");
					    //Pour bien recupere les données on crée un table de parametre
					    $params=array($evenement,$description,$email,$_GET['id']);
					    //Execution de la requête par leur paramètre en ordre 
					    $ps->execute($params);
						// Pour recuperer l'id du user
						?>
						<script type="text/javascript">
							alert('Modification Effectuée!')
						</script>
						<script>
							window.open('individuel.php','_self')
						</script>

					<?php
						exit();
	}
	
