<?php
include "config_bdd_camping.php"; 
// Vérification de la validité des informations >

?>
<?php require_once('demarragesession.php');?>

<!doctype html>
<html lang="fr">
  <head>
 
        
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/inserer.css" type="text/css" media="screen"/>		
    </head>


</p>

  <div class="container-fluid">
      <br>
      <div id="contenu">
    <form id="form1" action="insertion_traitement_camping.php"method="post">
    
    <p>
    <label class="Camping" style="color:white";>Aire ou Camping</label>
    <br>
    <input type="text" name="camping" id="camping" placeholder="Nom de l'aire" required>
    </p>

    <p>
    <label class="Ville" style="color:white";>Ville</label>
    <br>
    <input type="text " name="ville" id="Ville" placeholder="Nom de la Ville"  required>
    </p>

    <p>
    <label class="code_postal" style="color:white";>Code postal</label>
    <br>
    <input type="text" name="code_postal" id="code_postal"placeholder="code postal" required>
    </p>

    <p>
    <label class="tlephone" style="color:white";>Téléphone format 0011223344</label>
    <br>
    <input type="tel" name="telephone" id="telephone" pattern="[0-9]{10}" maxlength="10" 
    placeholder="Téléphone du Camping" required>
  </p>

    <p>
    <label class="note" style="color:white";>Note attribuée</label>
    <br>
    <input type="int" name="note" id="note" placeholder="note" required>
    </p>

    <p>
    <label for="envoyer"></label>
    <input type="submit" name="Envoyer" class="btn btn-danger btn-md" value="Envoyer">
  
    </p>
    
    </form>
</div>
  </div>