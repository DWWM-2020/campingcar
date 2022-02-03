<?php session_start();
include "config_bdd_camping.php";

$username = $_POST['username'];
$req = $connexion->prepare('SELECT id, password, email FROM membre WHERE username = :username');
 
$req->execute(array(
    ':username' => $username,));
$resultat = $req->fetch();
 
    if (password_verify($_POST['password'], $resultat['password']) and $_POST['email'] == $resultat['email']) {
       
        $_SESSION['auth'] = $resultat;
        $_SESSION['username'] = $username;
        echo 'Vous êtes connecté !<br>'; 
        header("location:actualite.php");
    }
 
    else {
        $_SESSION['error_mdp']='<P style="color:red">Mauvais identifiant ou mot de passe ! Veuillez vous reconnecter.</P>';
        
    
        header("location:connexion_membre.php");
    }
?>
