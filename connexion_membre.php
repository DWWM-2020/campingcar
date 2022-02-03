<?php require_once('demarragesession.php'); ?>

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

  <header class="bg-dark text-white p-4 m-b-5 "> 
    <h2>Camping Car & Co</h2>
  </header>
  
</br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm"></div>

            <div class="col-sm mt-5" style="color:white" ;>
                <h3><b>Veuillez rentrer de nouveau vos coordonnées pour vous connecter</b></h3>
                <h3><b style="color:red";></b></h3>
                <?php if (isset($_SESSION['error_mdp'])) {//si l'index error_mpd est définit
                            echo $_SESSION['error_mdp'];/* affichage du message d'erreur stockée dans la variable super globale 
                            SESSION à l'index erreur mdp qui a été défini dans la page:connexion_membre_traitement.php,qui renvoie 
                            au formulaire de connexion*/
 
                            unset($_SESSION['error_mdp']);/*détruit l'index error_mdp de la session après avoir afficher le message 
                            et laisse la possibilité à l'utilisateur de recommencer*/
                        }?></h3>
            </div>
            <div class="col-sm"></div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-sm"></div>
            <div class="container-fluid">



                <form action="connexion_membre_traitement.php" method="POST">

                    <p>
                    <div class="nom d'utilisateur" style="color:white" ;></label>
                        <br>
                        <input type="text" name="username" id="username" placeholder="nom d'utilisateur" required>
                        </p>

                        <p>
                        <div class="email" style="color:white" ;></div>
                        <br>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                        </p>

                        <p>
                        <div class="mot de passe" style="color:white" ;></div>
                        <br>
                        <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                        </p>


                        <p>
                            <label for="envoyer"></label>
                            <input type="submit" value="envoyer">
                            <!--a&nbsp<a class="btn btn-danger" >  href="recup_mail.php" role="button">Mot de passe oublier</a>-->
                        </p>


                </form>
            </div>
        </div>


        <div class="col-sm"></div>
    </div>
    </div>





    <!-- JAVASCRIPT BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>