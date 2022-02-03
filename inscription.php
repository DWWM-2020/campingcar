<?php require_once('demarragesession.php'); ?>

<!doctype html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link id="pagestyle" type="text/css" rel="stylesheet" href="css/inscription_membre.css">
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
    <div class="container mx-auto" style="height:400px;min-width:60px;width:600px">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"style="color:white" ;>
                        <h2 class="mx-auto" style="text-align:center"><b>Inscription à l'Espace Membres</b></h2>
</br>
                    


                 <?php if (isset($_SESSION['error_mdp'])) { //si l'index error_mpd est définit
                echo $_SESSION['error_mdp'];/* affichage du message d'erreur stockée dans la variable super globale SESSION à l'index erreur mdp
                             qui a été défini dans la page:connexion_membre_traitement.php,qui revoie au formulaire de connexion*/

                unset($_SESSION['error_mdp']);} 
                ?> <!--détruit l'index error_mdp de la session après avoir afficher le message 
                            et laisse la possibilité à l'utilisateur de recommencer-->
               
            <!--formulaire HTML, form=formulaire action=attribut (adresse de la page) ou sont envoyées les données , 
méthode=cette attribut définit comment sont envoyées les données, POST= format dans lesquel sont envoyées 
les données içi au serveur-->

  
                <form action="inscription_traitement.php" method="POST" class="form_inscription" style="text-align:center";>

                <p>
                <div class="nom d'utilisateur" style="color:white" ;></div>
                <br><!-- Name, fait le lien entre le champ du formulaire et la variable$ $_POST qui sera içi username-->
                <input type="text" name="username" id="username" placeholder="nom d'utilisateur" required>
                </p>

                <p>
                <div class="email" style="color:white" ;></div>
                <br>
                <input type="email" name="email" id="email" placeholder="Email" required>


                </p>

                <p>
                <div class="mot de passe" style="color:white" ;></div>
                <br> <!-- pour ne pas voir le mot de passe entrer-->
                <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                </p> <!-- ecrit mot de passe dans la case-->


                <p>
                    <input type="submit" name="inscription" class="btn btn-info btn-md" value="Envoyer">

                    <a href="camping.php" class="btn btn-warning" role="button">
                        Retour aux Campings</a>
                    </form>
                </div>     
    </div>
</div>


    <footer class="bg-light text-muted p-3"><span>2022© campings-caristes</span></footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
</body>

</html>