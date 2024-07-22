<?php
 		$mc="";
		 
			if(isset($_GET['motcle'])){
				$mc=$_GET['motcle'];
				$req="SELECT * FROM individuel WHERE nom LIKE '%$mc%'";
			}
			else
			{
				$req="SELECT * FROM individuel";
			}
			$ps=$pdo->prepare($req);
			$ps->execute();
			