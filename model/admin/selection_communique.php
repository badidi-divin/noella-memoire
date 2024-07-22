<?php
 		$mc="";
		 
			if(isset($_GET['motcle'])){
				$mc=$_GET['motcle'];
				$req="SELECT * FROM publication WHERE id_evenement LIKE '%$mc%'";
			}
			else
			{
				$req="SELECT * FROM publication";
			}
			$ps=$pdo->prepare($req);
			$ps->execute();
			