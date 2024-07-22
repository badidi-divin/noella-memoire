<?php
	session_start();
	// Connection datatabase
	require_once '../../bdd/connexion.php';
	require_once '../../model/admin/edit-com.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width-device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../includes/css/bootstrap.css">
	<style type="text/css">
		.spacer{
				margin-top: 10px;
			}
			.space{
				margin-top: 70px;
			}
			.spac{
				margin-top: 80px;
			}
			.a{
				text-align:center;
				text-decoration: blink;
			}
	</style>
</head>
<body>
	<!-- Navigation -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!--cette class utilisé c pour avoir une barre de navigation horizontal -->
			<ul class="nav navbar-nav">
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="profile.php">Tableau de bord</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="logout.php">Se deconnecter</a>
				</li>
			</ul>
		</div>
	<!-- navigation end -->
<div class="contenair space col-md-6 col-xd-12 col-md-offset-3">
	<!-- panel default ce n'est que la couleur qui va changer -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="a">ENREGISTREMENT</h3>
		</div>
		<div class="panel-body">
		
			<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label">
						Adresse Email Parents:
					</label>
					<select name="email" class="form-control" autocomplete="off" required="required">
						<?php
							$ps=$pdo->prepare("SELECT * FROM parent");
							$ps->execute();
						?>
															<option disabled="disabled">
																Choisissez une rubrique
															</option>
															<?php
														while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
															?>
															<option value="<?php echo $s->email_parent; ?>">
																<?php echo $s->email_parent; ?>
															</option>
															<?php
														}

													?>
											</select>
					
				</div>
				<div class="form-group">
					<label class="control-label">
						Evenement:
					</label>
					<input type="text" name="evenement" required="required" class="form-control" value="<?= $userinfo['nom']; ?>">
				</div>
				<div class="form-group">
					<label class="control-label">
						Description:
					</label>
					<textarea type="text" name="description" required="required" class="form-control"><?= $userinfo['description']; ?>
					</textarea>
				</div>
				<div class="form-group a">
					<button type="submit" class="btn btn-primary" name="formconnect">Edition</button>
				</div>
			</form>
			<?php
			if (isset($erreur)) {
				echo "<font color='red'>".$erreur."</font>";
			}
		?>
		</div>
	</div>
</div>
</body>
</html>