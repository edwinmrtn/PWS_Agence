<?php include("connexion.php"); ?>
<?php
	$req = $bdd->prepare('SELECT b.idBien, b.detailBien, b.adrBien, b.prixBien, b.idType, b.photoBien,  count(v.idBien)
							FROM bien b,  visiter v
							WHERE b.idBien = ?
							AND v.idBien = b.idBien
							GROUP BY b.idBien, b.detailBien, b.adrBien, b.prixBien, b.idType, b.photoBien');
	$req->execute(array($_GET['id']));
	
	$err = $bdd->prepare('SELECT b.idBien, b.detailBien, b.adrBien, b.prixBien, b.idType, b.photoBien
							FROM bien b
							WHERE b.idBien = ?
							GROUP BY b.idBien, b.detailBien, b.adrBien, b.prixBien, b.idType, b.photoBien');
	$err->execute(array($_GET['id']));
	
	
	if($affiche = $req->fetch()){
		echo '<TABLE BORDER><TR><TD>Image</TD><TD>Detail</TD><TD>Adresse</TD><TD>Prix</TD><TD>Nom du typeBien</TD><TD>Nombre de visites demandees</TD></TR>';
		echo  	'<TR>' .
					' <TD> ' .
						' <img " src="../images/'. $affiche['photoBien'] .
						'"alt="Image Maisons">' . 
					'</TD>' . 
					'<TD>' .
						$affiche['detailBien'] .
					'</TD>'  . 
					'<TD>' .
						$affiche['adrBien'] .
					'</TD>'  .
					'<TD>' .
						$affiche['prixBien'] .
					'</TD>'  .
					'<TD>' .
						$affiche['idType'] .
					'</TD>'  .
					'<TD>' .
						$affiche['count(v.idBien)'] .
					'</TD>'  .
				'</TR>';
		while ($affiche = $req->fetch())
		{
			echo  	'<TR>' .
						' <TD> ' .
							' <img " src="../images/'. $affiche['photoBien'] .
							'"alt="Image Maisons">' . 
						'</TD>' . 
						'<TD>' .
							$affiche['detailBien'] .
						'</TD>'  . 
						'<TD>' .
							$affiche['adrBien'] .
						'</TD>'  .
						'<TD>' .
							$affiche['prixBien'] .
						'</TD>'  .
						'<TD>' .
							$affiche['idType'] .
						'</TD>'  .
						'<TD>' .
							$affiche['count(v.idBien)'] .
						'</TD>'  .
					'</TR>';
		}
	}
	else{$erreur = $err->fetch();
		echo '<TABLE BORDER><TR><TD>Image</TD><TD>Detail</TD><TD>Adresse</TD><TD>Prix</TD><TD>Nom du typeBien</TD><TD>Nombre de visites demandees</TD></TR>';
		echo  	'<TR>' .
					' <TD> ' .
						' <img " src="../images/'. $erreur['photoBien'] .
						'"alt="Image Maisons">' . 
					'</TD>' . 
					'<TD>' .
						$erreur['detailBien'] .
					'</TD>'  . 
					'<TD>' .
						$erreur['adrBien'] .
					'</TD>'  .
					'<TD>' .
						$erreur['prixBien'] .
					'</TD>'  .
					'<TD>' .
						$erreur['idType'] .
					'</TD>'  .
					'<TD>' .
						'0' .
					'</TD>'  .
				'</TR>';
		while ($erreur = $err->fetch())
		{
			echo  	'<TR>' .
						' <TD> ' .
							' <img " src="../images/'. $erreur['photoBien'] .
							'>' . 
						'</TD>' . 
						'<TD>' .
							$erreur['detailBien'] .
						'</TD>'  . 
						'<TD>' .
							$erreur['adrBien'] .
						'</TD>'  .
						'<TD>' .
							$erreur['prixBien'] .
						'</TD>'  .
						'<TD>' .
							$erreur['idType'] .
						'</TD>'  .
						'<TD>' .
							'0' .
						'</TD>'  .
					'</TR>';
		}
	}
	echo '</TABLE>';
	


?>