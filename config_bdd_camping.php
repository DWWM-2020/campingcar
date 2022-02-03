
<?php

//Création d'une instance PDO (création de la chaîne de connexion)construction des variables de connexion serveur MySql

$host='localhost';//localhost car je suis sur mon ordinateur ou 127.0.0.1
$dbname='camping';// nom de la base de données
$identifiant='root';//identifiant
$password='';//mot de passe vide

//essaie de te connecter
try{            //PDO représente une connexion entre PHP et le serveur de la BdD
    $connexion= new PDO("mysql:host=$host; dbname=$dbname", $identifiant, $password);
   $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);/*setAttribut est une fonction PHP qui 
   met en place les constantes PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION pour afficher et gérer les erreurs*/
    
}//capture l'erreur
catch(PDOexception $erreur){        //dbbase??
    die("imposible de se connecter $dbbase" .$erreur->getMessage());
}//gestion des erreurs lors de l'instanciation

?>