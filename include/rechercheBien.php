<!DOCTYPE html>
<html>

	<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" media="screen" type="text/css" href="./styles.css" />
		<title>Mon site ! </title>
    </head>
 
 <?php include("connexion.php"); ?>
 <?php include("entete.php"); ?>
<?php include("menus.php"); ?>
<form method="post" action="rechercheBien.php">
   <p>
       <label for="arecherche">Rechercher</label> : 
	   <input type="search" name="arecherche" id="arecherche"  <?php if(isset ($_POST['prix']) and $_POST['prix'] == 200) {echo 'checked="checked"';}?>/>
   </p>
</form>

<?php

echo $_POST['someName'];
if (isset($_POST['arecherche']))
{
	//$resultdetail[0]="";
	//$resultid[0]="";
	//$resultphoto[0]="";
	
	$result[0] = ""; 
	$iterator = 0;
	$cpt2= 0;
	$arecherche = explode(" ", $_POST['arecherche']); //separe tout les mots recherché
 
	
 

 
	if (count($arecherche)==1)
	       	{	
				$req = $bdd->prepare("SELECT *  FROM  Bien  WHERE detailBien LIKE  ? ");
				$req->execute(array('%'.$arecherche[0].'%'));
				$patterns = array();
				$patterns[0] = "#\b".$arecherche[0]."\b#i";
				$replacements = array();
				$replacements[0] = "<b style=color:red>".$arecherche[0]."</b>";
				
				$tablefetch = $req->fetchAll();
				if(count($tablefetch)==0){
				echo 'Aucun resultat';
				}
				else{
				echo '<TABLE BORDER>';
				echo  '<TR><TD>Détail Bien</TD><TD>Photo</TD><TD>Lien</TD></TR>';
					foreach($tablefetch as $donneestableau){
						echo '<TR><TD>' . preg_replace($patterns, $replacements, $donneestableau['detailBien']. '</TD> <TD> ' . ' <img " src="../images/'. $donneestableau['photoBien'] .'"alt="Image Maisons">' .  ' <TD> ' . '<a href="saisirUneVisite.php?id='. $donneestableau['idBien']. '">Lien </a></TD></TR>');
					}
				echo '</TABLE>';
				}
				
            } 
	elseif (count($arecherche)==2)  
			{
				$req2 = $bdd->prepare('SELECT *  FROM  Bien  WHERE detailBien LIKE  ? AND detailBien LIKE  ?');
				$req2->execute(array('%'.$arecherche[0].'%', '%'.$arecherche[1].'%'));
				$patterns = array();
				$patterns[0] = "#\b".$arecherche[0]."\b#i";
				$patterns[1] = "#\b".$arecherche[1]."\b#i";
				$replacements = array();
				$replacements[0] = "<b style=color:red>".$arecherche[0]."</b>";
				$replacements[1] = "<b style=color:red>".$arecherche[1]."</b>";
				
				$tablefetch = $req2->fetchAll();
				if(count($tablefetch)==0){
					echo '<TABLE BORDER>';
					echo  '<TR><TD>Détail Bien</TD><TD>Photo</TD><TD>Lien</TD></TR>';
				}
				else{
					echo '<TABLE BORDER>';
					echo  '<TR><TD>Détail Bien</TD><TD>Photo</TD><TD>Lien</TD></TR>';
					foreach($tablefetch as $donneestableau){
						echo '<TR><TD>' . preg_replace($patterns, $replacements, $donneestableau['detailBien']. '</TD> <TD> ' . ' <img " src="../images/'. $donneestableau['photoBien'] .'"alt="Image Maisons">' .  ' <TD> ' . '<a href="saisirUneVisite.php?id='. $donneestableau['idBien']. '">Lien</a></TD></TR>');
					}
				
				}
				
				
				$req22 = $bdd->prepare('SELECT *  FROM  Bien  WHERE (detailBien LIKE  ? XOR detailBien LIKE  ? )');
				$req22->execute(array('%'.$arecherche[0].'%','%'.$arecherche[1].'%'));
				$patterns = array();
				$patterns[0] = "#\b".$arecherche[0]."\b#i";
				$patterns[1] = "#\b".$arecherche[1]."\b#i";
				$replacements = array();
				$replacements[0] = "<b style=color:red>".$arecherche[0]."</b>";
				$replacements[1] = "<b style=color:red>".$arecherche[1]."</b>";
				
				$tablefetch = $req22->fetchAll();
				if(count($tablefetch)==0){
				echo 'Aucun resultat';
				}
				else{
					foreach($tablefetch as $donneestableau){
						echo '<TR><TD>' . preg_replace($patterns, $replacements, $donneestableau['detailBien']. '</TD> <TD> ' . ' <img " src="../images/'. $donneestableau['photoBien'] .'"alt="Image Maisons">' .  ' <TD> ' . '<a href="saisirUneVisite.php?id='. $donneestableau['idBien']. '">Lien</a></TD></TR>');
					}
				}	
				echo '</TABLE>';				
			}
			
			
			
	elseif (count($arecherche)==3)
			{ 
				$req3 = $bdd->prepare('SELECT *  FROM  Bien  WHERE detailBien LIKE  ? AND detailBien LIKE  ? AND detailBien LIKE  ?');
				$req3->execute(array('%'.$arecherche[0].'%','%'.$arecherche[1].'%','%'.$arecherche[2].'%'));
				$patterns = array();
				$patterns[0] = "#\b".$arecherche[0]."\b#i";
				$patterns[1] = "#\b".$arecherche[1]."\b#i";
				$patterns[2] = "#\b".$arecherche[2]."\b#i";
				
				$replacements = array();
				$replacements[0] = "<b style=color:red>".$arecherche[0]."</b>";
				$replacements[1] = "<b style=color:red>".$arecherche[1]."</b>";
				$replacements[2] = "<b style=color:red>".$arecherche[2]."</b>";
				
				
	
				$tablefetch = $req3->fetchAll();
				if(count($tablefetch)==0){
					echo '<TABLE BORDER>';
					echo  '<TR><TD>Détail Bien</TD><TD>Photo</TD><TD>Lien</TD></TR>';
				}
				else{
					echo '<TABLE BORDER>';
					echo  '<TR><TD>Détail Bien</TD><TD>Photo</TD><TD>Lien</TD></TR>';
					foreach($tablefetch as $donneestableau){
						echo '<TR><TD>' . preg_replace($patterns, $replacements, $donneestableau['detailBien']. '</TD> <TD> ' . ' <img " src="../images/'. $donneestableau['photoBien'] .'"alt="Image Maisons">' .  ' <TD> ' . '<a href="saisirUneVisite.php?id='. $donneestableau['idBien']. '">Lien</a></TD></TR>');
					}
				
				}
				
				$req33 = $bdd->prepare('SELECT *  FROM  Bien  WHERE detailBien LIKE  ? XOR detailBien LIKE  ? AND detailBien LIKE  ?');
				$req33->execute(array('%'.$arecherche[0].'%','%'.$arecherche[1].'%','%'.$arecherche[2].'%'));
				$patterns = array();
				$patterns[0] = "#\b".$arecherche[0]."\b#i";
				$patterns[1] = "#\b".$arecherche[1]."\b#i";
				$patterns[2] = "#\b".$arecherche[2]."\b#i";
				
				$replacements = array();
				$replacements[0] = "<b style=color:red>".$arecherche[0]."</b>";
				$replacements[1] = "<b style=color:red>".$arecherche[1]."</b>";
				$replacements[2] = "<b style=color:red>".$arecherche[2]."</b>";
				
				$tablefetch = $req33->fetchAll();
				if(count($tablefetch)==0){
				echo 'Aucun resultat';
				}
				else{
					foreach($tablefetch as $donneestableau){
						echo '<TR><TD>' . preg_replace($patterns, $replacements, $donneestableau['detailBien']. '</TD> <TD> ' . ' <img " src="../images/'. $donneestableau['photoBien'] .'"alt="Image Maisons">' .  ' <TD> ' . '<a href="saisirUneVisite.php?id='. $donneestableau['idBien']. '">Lien</a></TD></TR>');
					}
					echo '</TABLE>';
				}
				
				
				
				
				
	       	}			
	/*
	while ($donneestableau = $reponse->fetch())
	
	{
	
    $cpt = 0;
    $description = ""; 
	$donneesdetail = str_replace(","," ", $donneestableau['detailBien']);
	
	$motrechercher = explode(" ", $donneesdetail);
    
    foreach($motrechercher as $element)
		  {
        	if (count($arecherche)==1)
	       	{			
								
            }             
			elseif (count($arecherche)==2)  
			{
									
            }  
			elseif (count($arecherche)==3)
			{ 
			
	       	}
if($cpt> 0){
		 
		 $resultphoto[$iterator] =$donneestableau['photoBien'];
		 $resultid[$iterator] = $donneestableau['idBien'];//pour l'id
		 $resultdetail[$iterator] =  $description; // pour les details
		 $iterator++;
  }
        
}
	echo '<TABLE BORDER>';
if(isset($resultphoto[0]) and  isset($resultid[0]) and isset($resultdetail[0])){	
	 foreach($resultdetail as $lignedetail){
	 
	 echo  '<TR>' . '<TD>' . $lignedetail .'</TD>' .' <TD> ' . '<img src="../images/'. $resultphoto[$cpt2] .'"alt="Image Maisons">' . '</TD>' . '<TD>' . '<a href="saisirUneVisite.php?id='. $resultid[$cpt2] . '">Lien</a> </TD>' . '</TR> ';
	 $cpt2++;
	 }
 }
 else{
 echo "pas de resultat";
 }
 echo '</TABLE>';
 */
}

?>

</html>