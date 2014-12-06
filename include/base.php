<?php include("connexion.php"); ?>
<?php
$reponse = $bdd->query('SELECT *  FROM  bien');
echo '<h1>Table Bien</h1>';
echo '<TABLE BORDER>';
echo  '<TR>' . '<TD>Titre de la villa</TD><TD>Detail de la villa</TD><TD>Prix</TD><TD>Type de villa</TD><TD>Image</TD></TR>';
while ($donnees = $reponse->fetch()) // envoyer ligne par ligne dans données
{
	echo  '<TR>';
	echo '<TD>' . $donnees['idBien'] .'</TD>';
	echo '<TD>' . $donnees['titreBien'] .'</TD>';
	echo '<TD>' . $donnees['detailBien'] .'</TD>';
	echo '<TD>' . $donnees['adrBien'] .'</TD>';
	echo '<TD>' . $donnees['prixBien'] .'</TD>';
	echo '<TD>' . $donnees['idType'] .'</TD>';
	echo '<TD>' . $donnees['photoBien'] .'</TD>';
	echo '</TR>';	

}
echo '</TABLE>';

echo '<h1>Table Client</h1>';
$reponse = $bdd->query('SELECT *  FROM  client');
echo '<TABLE BORDER>';
echo  '<TR>' . '<TD>id client</TD><TD>nom du client</TD><TD>adresse</TD><TD>telephone</TD><TD>mail</TD></TR>';
while ($donnees = $reponse->fetch()) // envoyer ligne par ligne dans données
{
	echo '<TD>' . $donnees['idClient'] .'</TD>';
	echo '<TD>' . $donnees['nomClient'] .'</TD>';
	echo '<TD>' . $donnees['adrClient'] .'</TD>';
	echo '<TD>' . $donnees['telClient'] .'</TD>';
	echo '<TD>' . $donnees['emailClient'] .'</TD>';
	echo '</TR>';
}
echo '</TABLE>';

echo '<h1>Table Demande</h1>';	
	$reponse = $bdd->query('SELECT *  FROM  demande');
echo '<TABLE BORDER>';
echo  '<TR>' . '<TD>id demande</TD><TD>data</TD><TD>disponibilité</TD><TD>id Client</TD></TR>';
while ($donnees = $reponse->fetch()) // envoyer ligne par ligne dans données
{
	echo  '<TR>';
	echo '<TD>' . $donnees['idDemande'] .'</TD>';
	echo '<TD>' . $donnees['dateDemande'] .'</TD>';
	echo '<TD>' . $donnees['disponibilite'] .'</TD>';
	echo '<TD>' . $donnees['idClient'] .'</TD>';
	echo '</TR>';
}
echo '</TABLE>';

echo '<h1>Table Ressembler</h1>';
	$reponse = $bdd->query('SELECT *  FROM  ressembler');
echo '<TABLE BORDER>';
echo  '<TR>' . '<TD>id bien1</TD><TD>id bien2</TD><TD>ordre</TD></TR>';
while ($donnees = $reponse->fetch()) // envoyer ligne par ligne dans données
{
	echo  '<TR>';
	echo '<TD>' . $donnees['idBien1'] .'</TD>';
	echo '<TD>' . $donnees['idBien1'] .'</TD>';
	echo '<TD>' . $donnees['ordre'] .'</TD>';
	echo '</TR>';	
}
echo '</TABLE>';
	

echo '<h1>Table typeBien</h1>';	
	$reponse = $bdd->query('SELECT *  FROM  typebien');
echo '<TABLE BORDER>';
echo  '<TR>' . '<TD>id type</TD><TD>nom type</TD></TR>';
while ($donnees = $reponse->fetch()) // envoyer ligne par ligne dans données
{
	echo  '<TR>';
	echo '<TD>' . $donnees['idType'] .'</TD>';
	echo '<TD>' . $donnees['nomType'] .'</TD>';
	echo '</TR>';
}
echo '</TABLE>';

echo '<h1>Table Visiter</h1>';
$reponse = $bdd->query('SELECT *  FROM  visiter');
echo '<TABLE BORDER>';
echo  '<TR>' . '<TD>priorité</TD><TD>idBien</TD><TD>idDemande</TD></TR>';
while ($donnees = $reponse->fetch()) // envoyer ligne par ligne dans données
{
	echo  '<TR>';
	echo '<TD>' . $donnees['priorite'] .'</TD>';
	echo '<TD>' . $donnees['idBien'] .'</TD>';
	echo '<TD>' . $donnees['idDemande'] .'</TD>';
	echo '</TR>';
}
echo '</TABLE>';
?>