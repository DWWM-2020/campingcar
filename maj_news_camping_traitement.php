<?php include 'config_bdd_camping.php';
//connexion 


//on récupère les Name, dans le formulaire maj_news_camping//
$id_camp=$_POST['id_camp'];
$nom_recup = $_POST['nomcamping'];
$ville=$_POST['ville'];
$code_postal=$_POST['code_postal'];
$telephone=$_POST['telephone'];
$note=$_POST['note'];

//on fait une requête de mise à jour de l'enregistrement//
/*on se connecte à la base de données appelé CONNEXION, et on enregistre l'ensemble des
nouveaux camping*/
$req= $connexion->prepare('UPDATE hebergement SET nom =?, ville =?,code_postal =?, telephone =?, notemoyenne =?  WHERE id_camping=?');
//si la req est juste, ECHO la mise à jour est faite sinon ECHO la mise a jour n'est pas effectuée.
if ($req->execute(array($nom_recup,$ville,$code_postal,$telephone,$note,$id_camp)))
    {
        echo "la mise à jour est faite <br>";
        echo '<a href="camping.php">Retour à la page Camping</a>';
    }else
    {
        echo "la mise à jour n'a pas été faite";
        
    
        //print_r($req->errorInfo());
    }
    

 ?>