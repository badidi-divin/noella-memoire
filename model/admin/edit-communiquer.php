<?php
		$requser=$pdo->prepare("SELECT * FROM publication WHERE id_publication=?");
		$requser->execute(array($_GET['id']));
		$userinfo=$requser->fetch();
// pour recuperer les informations notées sur le formulaire
	if (isset($_POST['formconnect'])) {
   // respecter ce qui est demandé sur le formulaire
	$evenement=htmlspecialchars($_POST['evenement']);
	$description=htmlspecialchars($_POST['description']);

	//Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("UPDATE publication SET id_evenement=?,description=? WHERE id_publication=?");
	//Pour bien recupere les données on crée un table de parametre
		$params=array($evenement,$description,$_GET['id']);
		//Execution de la requête par leur paramètre en ordre 
		$ps->execute($params);
		// Pour recuperer l'id du user
						?>
		<script type="text/javascript">
			alert('Modification Effectuée!')
		</script>
		<script>
			window.open('profile.php','_self')
		</script>
           <?php
			  exit();
			}else{
				$errors='Tous les champs doivent être completés!';
			}
		