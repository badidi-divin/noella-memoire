<?php
if (isset($_POST['formconnect'])) {

		$Pseudo=htmlspecialchars($_POST['Pseudo_admin']);

		$mdp=md5($_POST['Mdp_admin']);

		if (!empty($Pseudo) AND !empty($mdp)) {

			// Vérification si l'utilisateur existe vraiment
			$requiser=$pdo->prepare("SELECT * FROM agent WHERE user_name=? AND password=?");
			$requiser->execute(array($Pseudo,$mdp));
			// rowCount permet de compter le nombre saisie par le user
			$userexist=$requiser->rowCount();
			if ($userexist==1) {
				$userinfo=$requiser->fetch();
				$_SESSION['id_agent']=$userinfo['id_agent'];
				$_SESSION['user_name']=$userinfo['user_name'];
				$_SESSION['password']=$userinfo['password'];
				header("Location: profile.php");		
			}
			else
			{
				$erreur="Mauvais Pseudo ou mauvais mot de passe! ";
			}
			
		}
		else
		{
			$erreur="Tous les champs doivent etre completés";
		}
	}