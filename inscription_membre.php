<?php require_once('demarragesession.php'); ?>
<?php
include "config_bdd_camping.php";
// Vérification de la validité des informations >
?>


<?php

if (isset($_POST['inscription'])) {
    if (empty($_POST['username']) || !preg_match('/[a-zA-Z0-9]+/', $_POST['username'])) {
        $message = 'votre username doit être une chaine de caractères (alphanumérique) !';
    } elseif (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $message = 'Entrez une adresse email valide, Merci.';
    } elseif (empty($_POST['password']) || $_POST['password'] != $_POST['password2']) {
        $message = 'Rentrez un mot de passe valide.';
    } else {
        require_once "config_bdd_camping.php"; //inclue la Bdd

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT) . //password_defaut= utilise l'algorithme BCRYPT
            //Fonction permet de hacher le MDP par défault depuis PHP 5.5.0 (constante)

            //requete SQL
            $req = 'INSERT INTO membre(username,email,password)VALUES(:username, :email, :password)';

        //requete recupérée à partir du formulaire
        //bindvalue lie la valeur :username à [username]
        $requete->bindvalue(':username', $_POST['username']);
        $requete->bindvalue(':email', $_POST['email']);
        $requete->bindvalue(':password', $_POST['password']);

        //exécuter la requete        
        $requete->execute();
        $message = 'vous etes bien inscrit';
    }
}
?>

<!doctype html>
<html lang="fr">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- la méta viewport= controle de la fenêtre, width devis width= largeur de fenêtre qui varie selon l'appareil,
     initial-scale1= niveau de zomm initial au chargement de la page, rétrécie pour s'adapter
    Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link id="pagestyle" type="text/css" rel="stylesheet" href="css/inscription_membre.css">
    <link rel="stylesheet" href="css/inscription_membre.css" type="text/css" media="screen" />
    <?php include 'header.php'; ?>
</head>


<body id="camping" ;>
    <!-- id inclu la photo du CSS camping -->
    <?php include 'header.php'; ?>
    <!-- titre-->

    <div class="container-fluid">
        <div class="row">
            <div class="col col-md" style="color:white" ;>
                <div class="titre">
                    <h3><b>Inscription à l'Espace Membres</b></h3>
                    </p>
                    <br>
                    <p>
                        <?php
                        if (isset($message)) echo $message; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!--formulaire-->
    <div class="container-fluid">
        <!--contenu pleine largeur -->
        <div class="row justify-content-md-center">
            <!--ligne centrer pour un breakpoint moyen MD >- 768 px -->
            <div class="col-md-auto"></div><!-- colonne md auto= largeur automatique  en fonction de la longeur -->


            <div class="col-md-auto"></div>

            <div class="form">
                <!-- création du formulaire -->
                <form id="login-form" class="form " action="" method="POST">
                    <!-- l'attribut id login-form a une class CSS, class=précise que c'est un formulaire,
                    action= envoie les données du formulaire a la même page, méthod=les données du formulaire
                    sont envoyées en tant que publication HTTP avec la méthode POST sur une autre page -->
                    <div class="form-group">
                        <label for="username" class="text-info">Pseudo: </label><br>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email" class="text-info">Adresse email: </label><br>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group"> <!-- pour grouper les labels-->
                        <label for="password" class="text-info">Mot de passe: </label><br>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password2" class="text-info"> Confirmation du Mot de passe: </label><br>
                        <input type="password" name="password2" id="password2" class="form-control">
                    </div>

                    <br>

                    <div class="form-group">
                    <!-- affiche comme un bouton inscription et connexion pour les membres déjà inscrit -->
                        <input type="submit" name="inscription" class="btn btn-info btn-md" value="S'inscrire">
                        <a href="connexion_membre.php" class="btn btn-info btn-md">Se connecter</a>



                </form>
                <div>
                </div>
            </div>


            <div class="col col-md-auto"></div>
        </div>
    </div>


    <!-- JAVASCRIPT BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>