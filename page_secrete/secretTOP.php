<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" type="text/css" href="main.css">
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
    
        <?php
    
            if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "banane"){ 
                // Si le mot de passe est bon
                // On affiche les codes
             ?>
        	<p id="badreponse">!!!!! DAAAAAAAMN !!!!!</p>
            <div class ="container">
                <iframe src="http://theuglydance.com/?v=pkbpcmkmze" scrolling="no" id="iniframe"></iframe>
            </div> 
     
        <?php

            }else{ // Sinon, on affiche un message d'erreur
                echo"<p id=\"badreponse\">Veuillez dégager d'ici . Cordialement , La NASA .</p>";
        		echo '<div><img src="images/yass2.jpg" height="750" width="450">
                            <bgsounc src="laugh.au" loop="1">
                      </div>';	
            }

            
        ?>
        >
        
    </body>
</html>