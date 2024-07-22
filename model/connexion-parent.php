<?php
if (isset($_POST['formconnect'])) {

		$email=htmlspecialchars($_POST['email']);

		if (!empty($email)) {

			// Vérification si l'utilisateur existe vraiment
			$requiser=$pdo->prepare("SELECT * FROM parent WHERE email_parent=?");
			$requiser->execute(array($email));
			// rowCount permet de compter le nombre saisie par le user
			$userexist=$requiser->rowCount();
			if ($userexist==1) {
				$userinfo=$requiser->fetch();
				$_SESSION['email']=$userinfo['email_parent'];
				$_SESSION['nom_de_famille']=$userinfo['nom_de_famille'];
				header("Location:accueil.php");		
			}
			else
			{
				$erreur="Votre adresse mail n'est pas reconnue dans la base des données! ";
			}
			
		}
		else
		{
			$erreur="Tous les champs doivent etre completés";
		}
	}