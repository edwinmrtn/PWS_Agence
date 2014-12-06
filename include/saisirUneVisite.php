  <!DOCTYPE html>
<html>

	<head>
  
  
  <script language="javascript">
    function verifform() {
   if(formulaire.nom.value == "")
    {
     alert("Veuillez entrer votre nom!");
     formulaire.nom.focus();
     return false;
    }
   if(formulaire.adresse.value == "")
    {
     alert("Veuillez entrer votre adresse!");
    formulaire.adresse.focus();
     return false;
    }
   
   if(formulaire.tel.value == "")
    {
     alert("Veuillez entrer votre numero de telephone!");
    formulaire.tel.focus();
     return false;
    }
    if(formulaire.email.value == "")
    {
     alert("Veuillez entrer votre adresse électronique!");
     formulaire.email.focus();
     return false;
    }
      if(formulaire.dipo.value == "")
    {
     alert("Veuillez entrer vos diponibilite!");
     formulaire.dipo.focus();
     return false;
    }
    return true;
}
   
</script>


        <meta charset="utf-8" />
        <link rel="stylesheet" media="screen" type="text/css" href="styles.css" />
		<title>Mon site ! </title>
    </head>
    <body>

 
    <?php include("entete.php"); ?>
    
    <?php include("menus.php"); ?>
    
    <!-- Le corps -->
    
 
 <?php include("connexion.php"); ?>
 <?php
$req = $bdd->prepare('SELECT * FROM Bien b WHERE b.idBien = ? ');
$req->execute(array($_GET['id']));

echo '<TABLE BORDER>';
echo  '<TR>' . '<TD>Image</TD><TD>Description</TD></TR>';
$donnees = $req->fetch(); //ne contient qu'une seul ligne, pas besoin d'un while
echo  '<TR>' . ' <TD> ' . ' <img " src="../images/'. $donnees['photoBien'] .'"alt="Image Maisons">' . '</TD>' . '<TD>' . $donnees['detailBien'] .'</TD></TR>';
echo '</TABLE>';

?>



<?php 
 
 if (!isset($_POST['nom'])) //le nom est obligatoire a l'envoie, comme les autres entrees(grâce a javascript), tester seulement le nom est suffisant
		{  

echo '<form name="formulaire" onSubmit="return verifform()" method="post" action="saisirUneVisite.php?id=' . $_GET['id']. ' "> ';
echo '<fieldset>';
echo '   <legend>Vos coordonnées</legend> <!-- Titre du fieldset -->   ';

 echo '      <label for="nom">Nom</label>  ';
  echo '     <input style="color:#BDBDBD" type="text" name="nom" id="nom" value="Martin" onFocus="javascript:this.value=\'\'"/></br> ';
      
	   
echo '	   <label for="adresse">Adresse</label>    ';
echo '       <input style="color:#BDBDBD" type="text" name="adresse" id="adresse" value="007 avenue des champs elysées" onFocus="javascript:this.value=\'\'"/></br>   ';

echo '       <label for="tel">Téléphone</label>       ';
 echo '    <input style="color:#BDBDBD" type="tel" name="tel" id="tel" value="0306083634" onFocus="javascript:this.value=\'\'" /></br>      ';
 
 echo '      <label for="email">mail</label>                  ';
  echo '     <input style="color:#BDBDBD" type="email" name="email" id="email" value="martinedfr@yahoo.fr" onFocus="javascript:this.value=\'\'"/></br>  ';
	   
echo '	    <label for="dipo">Disponibilite</label>';
echo '       <input style="color:#BDBDBD" type="text" name="dispo" id="dispo" value="Lundi Mardi et Jeudi" onFocus="javascript:this.value=\'\'"/></br>';
       
echo '       <input type="submit" value="Envoyer" style="background-color:#3cb371" style="color:white; font-weight:bold"/>';

 echo '  </fieldset> ';
   
echo ' </form>  ';
 
  }
else
		{     
$req = $bdd->prepare('INSERT INTO Client (nomClient, adrClient, telClient, emailClient) VALUES (:nom,:adresse,:tel,:email)');
  
  $req->execute(array(
    'nom' => $_POST['nom'],
    'adresse' => $_POST['adresse'],
    'tel' => $_POST['tel'],
    'email' => $_POST['email'],
    )); 
	$newIdClient=$bdd->lastInsertId();
   
$req2 = $bdd->prepare('INSERT INTO Demande (dateDemande, disponibilite, idClient) VALUES (:date,:dispo,:idclient)');
  $req2->execute(array(
    'date' => date('Y-m-d'),
    'dispo' => $_POST['dispo'],
    'idclient' => $newIdClient,
    )); 
	$newIdDemande=$bdd->lastInsertId();

$req3 = $bdd->prepare('INSERT INTO Visiter (priorite,idBien,idDemande) VALUES (:priorite,:idbien,:iddemande)');
  $req3->execute(array(
    'priorite' => "1",
    'idbien' => $_GET['id'],
    'iddemande' => $newIdDemande,
    ));   
  
echo "Vous avez été enregistré avec le n° client suivant : " . $newIdClient ."</br>"; 
echo "Votre demande de visite a bien été enregistrée avec vos disponibilités suivantes :" .  $_POST['dispo'] . "</br>";
    }
  ?>
 	<!-- Le pied de page -->
<?php include("pied_de_page.php"); ?>
        </body>
        </html>
