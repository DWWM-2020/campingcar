<?php // inclure la BdD et démarrer la session
session_start();
include 'config_bdd_camping.php';

//isset détermine si la variable est déclarée/ $_POST transmet les information au formulaire
if (isset($_POST['message']) && !empty($_SESSION['auth'])) // non vide dans la session
{

    // ma variable QUI $_POST transmet les information au formulaire
    $message = $_POST['message'];

    $pseudo = $_SESSION['username']; //on enregistre le pseudo dans la session
    //préparation de la connexion d'insertion dans la table CHAT de plusieurs valeurs
    $insertmsg = $connexion->prepare('INSERT INTO chat(pseudo_username, commentaire, date_com) VALUE (?, ?, NOW())');
    //exécution dans le tableau des variables
    $insertmsg->execute(array($pseudo, $message));
}

?>
<!doctype html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link id="pagestyle" type="text/css" rel="stylesheet" href="css/feuille1.css">
  <script src="page-1.js" type="js/page-1.js"></script>
 
</head>

<!--div class="container-fluid  max-width: auto;"-->  
<body id="camping">
  <!--?php include 'header.php'; ?-->

  <header>
  <?php include 'headerbis.php'?> <!-- insere le tableau fait sur une autre page-->
</br>
  </header>
  
</br>


    <div class="container-fluid">
        <div class="row">
            <div class="col col-sm-2"></div>
        <div class="col col-sm-6 mt-5" style="color:white" ;>
                <h1><b>Bienvenue dans l'espace commentaires</b></h1>
                </p>
            </div>
            <div class="col col-sm-2"></div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">

            <div class="col col-sm-6">
                <form method="post" action="actualite.php">
                    <p>
                    <div class="nom_utilisateur" style="color:white">
                        <br>
                        <?php
                            // $_SESSION, cette variable reste stockée sur le serveur le temps qu'un utilisateur reste connecté
                        if (isset($_SESSION['username'])) {//si l'index USERNAME ET définie dans la variable super globale session 
                            echo "Bonjour " . $_SESSION['username'] . "!";
                        }
                        ?>

                        <?php
                        
                        if (isset($_SESSION['username'])) {
                            echo "<input name='pseudo_username' type='hidden' value={$_SESSION['username']} />";
                        }

                        if (isset($_SESSION['error_mdp'])) {//si l'index error_mpd est définit
                            echo $_SESSION['error_mdp'];/* affichage du message d'erreur stockée dans la variable super globale SESSION à l'index erreur mdp
                             qui a été défini dans la page:connexion_membre_traitement.php,qui revoie au formulaire de connexion*/
 
                            unset($_SESSION['error_mdp']);/*détruit l'index error_mdp de la session après avoir afficher le message 
                            et laisse la possibilité à l'utilisateur de recommencer*/
                        }
                        ?>


                        <div class="container-fluid">

                            <p>

                                <b><textarea type="textarea" name="message" id="email" rows="5" cols="50" placeholder="commentaire" required>
    </textarea></b>
                            </p>
                        </div>
                        <p>
                            <label for="envoyer">
                        </p>
                        <input type="submit" value="envoyer"></label> <a href="camping.php" class="btn btn-warning" role="button">
                            Retour aux Campings</a> <!--a href="profil.php" class="btn btn-primary" role="button"> Editer mon profil--></a>
                    </div>'
                    </p>
                </form>


            </div>
        </div>
    </div>




    <div class=container-fluid>
        <div class="row ">
            <div class="col col-sm-12 ">
                <div class="commentaire">

                    <?php
                    /*variable nouveau message se connecte à la table chat donne les 20 derniers
           messages*/
                    $allmsg = $connexion->query('SELECT*FROM chat ORDER BY id DESC LIMIT 0, 20');
                    //tant qu'il récupère de nouveau message il les affiche
                    while ($msg = $allmsg->fetch()) {
                    ?>

                        <div class="container section_message bg-light ">
                            <!- et echo affiche le pseudo, la date et le commentaire-->
                                <b><?php echo $msg['pseudo_username']; ?> :</b>

                                <b><?php echo $msg['date_com']; ?><b></br>

                                        <?php echo $msg['commentaire']; ?>

                                        <br>
                        </div>
                    <?php
                    }
                    ?>
                    <!--le bouton de deconnexion, avec le lien vers la page-->
                </div> <br> <a class="btn btn-danger" href="deconnexion_membre.php" role="button">Me deconnecter</a>
            </div>
        </div>
    </div>










    <!-- JAVASCRIPT BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>