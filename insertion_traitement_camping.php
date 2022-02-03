<?php session_start();
include 'config_bdd_camping.php';

//récupération des données dans le formulaire //
$nomcamping= $_POST ['camping'];
$localisation= $_POST ['ville'];
$code_postal= $_POST ['code_postal'];
$telephone= $_POST ['telephone'];
$note= $_POST ['note'];
$nombre=1;//variable désignant le nombre de note attribuée
$moyenne= $_POST ['note'];
// Textes complets 	id_camping	nom	ville	code_postal	telephone notetotale nombrenote	notemoyenne 	
//$req procédure d'enregistrement dans la table hebergement//
$req = $connexion->prepare ("INSERT INTO hebergement (nom, ville, code_postal, telephone, notetotale,  nombrenote, notemoyenne)
VALUES(?, ?, ?, ?, ?, ?,?)");

//si la requete s'exécute echo, sinon probleme//
if ($req->execute(array($nomcamping,$localisation,$code_postal,$telephone,$note,$nombre,$moyenne)))
{
    echo '
    <link rel="stylesheet" href="css/inserer.css" media="screen"/>		 
    <body id="camping">

    <div class=" row bg-transparent mt-5  text-center"style="color:maroon;"> 
            <div class="container-fluid"> </div>
              <div class="ajout" style="margin-top:250px;" >
                <div class="container-fuid" style="justify-content: center;">          
      
    <div class="alert alert-success" role="alert">
        L ajout a bien été enregistrée 
        Voici un recapitulatif d\'ajout : 
        <br> nom:'.$nomcamping.'
        <br> ville:' .$localisation.'
        <br> Code postal: '.$code_postal.'
        <br> Téléphone: '.$telephone.'
        <br> Note: '.$note.';
        <br> <br>';
    
   
     echo "<a href='camping.php'> Revenir à la page précedente </a>";
     '</div>
        </div>
            </div>';
           
             
}else{
    
    echo'
    <div class="alert alert-danger" role="alert">
    Problème d\'enregistrement : <br>
    </div>';

    //prise en charge des erreurs//
   // print_r($req->errorInfo());
}

?>

