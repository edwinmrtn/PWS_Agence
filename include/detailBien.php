<?php include("connexion.php"); ?>
<?php

$req = $bdd->prepare('SELECT *,  count(v.idBien) as nbr_visite FROM bien b,  visiter v, typebien tb WHERE b.idBien = ?  AND v.idBien = b.idBien AND b.idType = tb.idType');
$req->execute(array($_GET['id']));

echo '<TABLE BORDER>';
echo  '<TR>' . '<TD>Image</TD><TD>Description</TD><TD>Adresse</TD><TD>Prix</TD><TD>Nom du type</TD><TD>Nombre de visites demandées</TD></TR>';
$donnees = $req->fetch(); //ne contient qu'une seul ligne, pas besoin d'un while
echo  '<TR>' . ' <TD> ' . ' <img " src="../images/'. $donnees['photoBien'] .'"alt="Image Maisons">' . '</TD>' . '<TD>' . $donnees['detailBien'] .'</TD>' . '<TD>' . $donnees['adrBien'] .'</TD>' . '<TD>' . $donnees['prixBien'] .'</TD>' . '<TD>' . $donnees['nomType'] .'</TD>'. '<TD>' . $donnees['nbr_visite'] .'</TD>' . '</TR>';
echo '</TABLE>';

$req2 = $bdd->prepare("SELECT * from ressembler r, bien b where r.idBien1 = ? and r.idBien2 = b.idBien");
$req2->execute(array($_GET['id']));


$tablefetch = $req2->fetchAll();
if (count($tablefetch) == 0) {
   echo '<h2>Aucun biens ressemblants</h2>';
} else {
	echo '<h2>Les biens ressemblants</h2>';
	echo '<TABLE BORDER>';
	echo  '<TR><TD>Titre</TD><TD>Photo</TD></TR>';
    foreach ($tablefetch as $donnees2) {
       echo  '<TR><TD>' .  $donnees2['titreBien'] .'</TD> <TD> ' . '<a href="detailBien.php?id='. $donnees2['idBien2']. '"> <img " src="../images/'. $donnees2['photoBien'] .'"alt="Image Maisons"></a>' . '</TD></TR>';
    }
	echo '</TABLE>';
}



?>