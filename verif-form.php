<?php include "demarragesession.php";
?>
<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="css/feuille1.css" type="text/css" media="screen" />
</head>


  <header>
  <?php include 'headerbis.php'?> <!-- insere le tableau fait sur une autre page-->
</br>
  </header>


    <?php
    include "config_bdd_camping.php"; // connexion à la Base de données


    ?>
      <div class="container-fluid " style="margin-top: 5%;"> 
         <div class=" row bg-transparent text-center m-t-5"style="color:maroon;">
           <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jumbotron bg-grey mx-auto">
                <div class="container mx-auto">
                <p style="text-align:center;">
                <h3><strong>Voici la liste sur votre ville</strong></h3> <br>

                <?php

                if (isset($_GET['nom'])) { /*si le nom donné dans "name"du formulaire de la page CAMPING.PHP 
                    existe il est récupéré par l'URL(via la méthode GET) */
                    $nom = (string) $_GET['nom']; //le champ Recherche, doit être une chaîne de caractère*/

                    $req = $connexion->query("SELECT * FROM hebergement WHERE ville LIKE '%$nom' "); /* Requête de connexion QUERY=une seule donnée
                     interroge la base de données: quand la ville demandait dans la barre de recherche et = ce qui est stocké sur le champs ville
                      de la Base de données hebergement.*/

                    $reqs = $req->fetchALL();/*la variable $req après avoir récupéré les données dans la BdDonnées, est affectée a la variable
                     $reqs, pour pouvoir la réutiliser . fetchALL récupére TOUTES les données de la BdD*/

                    foreach ($reqs as $r) { //dans $reqs on "boucle" pour récupérer chaque données du tableau qui sera appelé ($r)

                ?>
                        <a href="http://www.google.fr/maps?um=1&tab=pl&ie=UTF-8&hl=fr&q=<?php echo $r['nom']?>"><?php echo $r['nom']?></a>
                     <?php echo "Ville: " . $r['ville'], " Télèphone: " . $r['telephone']. " Moyenne: " . $r['notemoyenne']; ?></p><br /><?php
                    }
                }
                        ?>
                        

                <p><a href="camping.php" class="btn btn-warning" role="button">Retour a la recherche</a></p>
            


            <?php
    /*reprend les noms des campings et affiche le lien map*/
    if (isset($_GET['nom'])) { /*si le nom donné dans "name"du formulaire de la page CAMPING.PHP 
    existe il est récupéré par l'URL(via la méthode GET) */
    $nom = (string) $_GET['nom']; //le champ Recherche, doit être une chaîne de caractère*/

    $req = $connexion->query("SELECT * FROM hebergement WHERE ville LIKE '%$nom' "); /* Requête de connexion QUERY=une seule donnée
     interroge la base de données: quand la ville demandait dans la barre de recherche et = ce qui est stocké sur le champs ville
      de la Base de données hebergement.*/

    $reqs = $req->fetchALL();/*la variable $req après avoir récupéré les données dans la BdDonnées, est affectée a la variable
     $reqs, pour pouvoir la réutiliser . fetchALL récupére TOUTES les données de la BdD*/

    foreach ($reqs as $r) { //dans $reqs on "boucle" pour récupérer chaque données du tableau qui sera appelé ($r)

?>
       <!--le résultat de la recherche du nom devient un lien hypertext que j'ai mis en début de ligne de rcherhe--><?php
    }
}
        ?>

                </div>
                <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
            </div>
        </div>
    </div>



    <!-- JAVASCRIPT BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>