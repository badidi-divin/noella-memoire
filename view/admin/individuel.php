<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ecole</title> 
	<link rel="stylesheet" type="text/css" href="../../includes/css/bootstrap.css">
</head>
	<style type="text/css">
		/** Pour creer un decallage **/
			.spacer{
				margin-top: 10px;
			}
			.space{
				margin-top: 60px;
			}
			.spac{
				margin-top: 80px;
			}
			.a{
				text-align:center;
				text-decoration: blink;
			}
	</style>
	<body>
		<!-- Navigation -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!--cette class utilisé c pour avoir une barre de navigation horizontal -->
			<ul class="nav navbar-nav">
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="profile.php">Tableau de bord</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="individuel.php">communiqué Individuel</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="logout.php">Se deconnecter</a>
				</li>
			</ul>
		</div>
	<!-- navigation end -->
	<?php 
	    require_once("../../bdd/connexion.php");
		require_once("../../model/admin/selection_com.php");
	?>
		<div class="col-md-12 col-xd-12 space">
			<form method="get" action="">
				<div class="form-group">
					<label for="motcle" class="control-label">
						<p>Mot Clé:</p>
					</label>
				<div class="form-group">
					<input type="text" class="form-control" name="motcle" value="<?php echo ($mc) ?>" placeholder="Entrer le Nom à chercher...">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Rechercher</button>
					<a href="imprimer-cli.php" class="btn btn-primary">Imprimer</a>
					<a href="ajout-com.php" class="btn btn-primary">Ajouter un Communiqué</a>
				</div>				
				</div>
			</form>
		</div>

		<div align="center" style="	padding-top: 150px;">

			<h1 style="font-size: 45px;">
				Bienvenue madame  <?php echo $_SESSION['user_name']; ?>
			</h1>
		</div>

			<div class="col-md-12 col-xs-12 spacer">
				<!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
				<div class="panel panel-info spacer">
					<!-- titre dans bootstrap -->
					<div class="panel-heading">
						LISTE DES COMMUNIQUES INDIVIDUELS
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<head>
								<tr>
									<th>ID</th><th>EVENEMENT</th><th>DESCRIPTION</th><th>EMAIL</th><th>DATE</th>
								</tr>
							</head>
							<body>
								<?php while ($et=$ps->fetch()){?>
								<tr>
								<td><?php  echo($et['id'])?></td>
								<td><?php  echo($et['nom'])?></td>
								<td><?php  echo($et['description'])?></td>
								<td><?php  echo($et['email'])?></td>
								<td><?php  echo($et['dates'])?></td>
								<!--liens -->
								<td><a onclick="return confirm('Etes-vous sûre...?');" href="../../model/admin/supprimer-com.php?id=<?php echo($et['id'])?>" class="btn btn-danger">Supprimer</a></td>
								<td><a href="editer-com.php?id=<?php echo($et['id'])?>" class="btn btn-primary">Editer</a></td>
											</tr>	
									<?php } ?>	
							</body>
						</table>
					</div>
				</div>	
			</div>

	</body>
</html>