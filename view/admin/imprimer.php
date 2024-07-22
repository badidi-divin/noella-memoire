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
	<?php 
	    require_once("../../bdd/connexion.php");
		require_once("../../model/admin/selection_communique.php");
	?>
		<div align="center" style="	padding-top: 150px;">
			<h1 style="font-size: 45px;">
				COLLEGE DES GENIES RUTA
			</h1>
		</div>

			<div class="col-md-12 col-xs-12 spacer">
				<!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
				<div class="panel panel-info spacer">
					<!-- titre dans bootstrap -->
					<div class="panel-heading">
						LISTE DES COMMUNIQUES
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th><th>EVENEMENT</th><th>DESCRIPTION</th><th>IMAGE</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$ps->fetch()){?>
								<tr>
								<td><?php  echo($et['id_publication'])?></td>
								<td><?php  echo($et['id_evenement'])?></td>
								<td><?php  echo($et['description'])?></td>
								<td><a href="../../includes/images/<?php  echo($et['image'])?>" target="_blank"><img src="../../includes/images/<?php  echo($et['image'])?>" width="100" height="120"></a></td>
											</tr>	
									<?php } ?>	
							</tbody>
							
						</table>
						<div style="padding-left: 600px;">
							<button  onclick="window.print()" class="btn btn-primary">Imprimer</button>
						</div>
					</div>
				</div>	
			</div>

	</body>
</html>