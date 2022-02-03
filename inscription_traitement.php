<?php require_once('demarragesession.php');?>
<?php
include "config_bdd_camping.php"; 

?>

<!doctype html>
<html lang="fr">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/feuille1.css" media="screen"/>			
    </head>
    
<body id="camping">

<?php
/* SECURITE Hachage du mot de passe par la fonction password_hash  
constante PASSWORD_DEFAULT qui  indique l'algoritme bcrypt par défaut*/
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
/*on récupère içi le nom d'utilisateur rentré sous forme de chaine de caractère, que contient l'index username 
de la variable super globale POST que l'on réaffecte dans une variable $username*/
$username = $_POST['username'];
$email = $_POST['email'];

$req = $connexion->prepare('SELECT * FROM membre WHERE email = :email or username= :username'); 
/*requête préparée: c'est une requête SQL qui se passe en 2 temps qui utilise une méthode de l'objet
PDO  et en 2e temps il exécute la requête*/

$req->execute(array(':email' => $email, ':username'=>$username));
$resultat = $req->fetch();
//Si le résultat et pris, email ou pseudo message lors de l'inscription.
if($resultat){
    echo '
    <br/>
    <div id="inscription">            
    <p>Bonjour, ce mail ou ce pseudo est déjà pris</p> 
    <a href="inscription.php" class="btn btn-warning" 
        style="text-align:center;margin-right:10px;" role="button">Retour à l\'Inscription</a>
    </div>';

}
else{
//$req procédure d'enregistrement dans la table MEMBRE
    $req = $connexion->prepare('INSERT INTO membre (username, password, email) 
VALUES(?, ?, ?)');

//si la requete s'exécute  avec le bon username, email et password echo , sinon probleme//
if($req->execute(array($username,$password,$email)))
    {
       echo "
        <div id='inscription'>
        <div class='alert alert-succes' role='alert'>
        <div class='bienvenue'>Bienvenue $username,<br>
        Votre adresse mail est $email, veuillez cliquer sur Se Connecter et entrer de nouveaux vos identifiants<br/>
        pour être diriger sur l'espace membre. </div></div>";
    
        echo '<a href="connexion_membre.php" class="btn btn-warning" 
        style="text-align:center;margin-right:10px;" role="button">Se connecter</a>'; 
        
         echo '<a href="connexion_membre.php" class="btn btn-primary" role="button">
         Retour au formulaire de Connexion</a></div>';
        
    }
    else {
        echo '<div class="alert alert-danger" role="alert">
        Problème d\'enregistrement: <br/>
        </div>';
    }
}
    ?> 
 

    </body>

</html>