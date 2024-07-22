<?php
// pour recuperer les informations notées sur le formulaire
	if (isset($_POST['formconnect'])) {
   // respecter ce qui est demandé sur le formulaire
	$evenement=htmlspecialchars($_POST['evenement']);
	$description=htmlspecialchars($_POST['description']);
	$tmpName=$_FILES['image']['tmp_name'];
	$name=$_FILES['image']['name'];
	$size=$_FILES['image']['size'];
	$error=$_FILES['image']['error'];
	$type=$_FILES['image']['type'];

	$errors=array();
	// Voir l'extension du fichiers
	$tabExtension=explode('.', $name);
	$extension=strtolower(end($tabExtension));
	// Extension Autorisé
	$extensionAutorise=['jpg','jpeg','gif','png'];
	$tailleMax=2097152;

	if (in_array($extension, $extensionAutorise)) {
		if ($size<=$tailleMax) {
				if ($error==0) {
					$uniqueNom=uniqid('',true);
					$fileName=$uniqueNom.'.'.$extension;
					move_uploaded_file($tmpName,'../../includes/images/'.$fileName);
						//Création de l'objet prepare et envoie de la requête
					    $ps=$pdo->prepare("INSERT INTO publication(id_evenement,description,image)VALUES(?,?,?)");
					    //Pour bien recupere les données on crée un table de parametre
					    $params=array($evenement,$description,$fileName);
					    //Execution de la requête par leur paramètre en ordre 
					    $ps->execute($params);
						// Pour recuperer l'id du user
						?>
						<script type="text/javascript">
							alert('Enregistrement Effectué!')
						</script>
						<script>
							window.open('profile.php','_self')
						</script>

					<?php
						exit();
			}else{
				$errors='Une erreur se produite lors de l\'importation de l\'image';
			}
		}else{
			$errors='Votre taille est trop importante(Taille Max: 2Mo)';
		}

	}else{
		$errors='Votre Extension est invalide(jpg,jpeg,gif,png)';
	}
	}
	
