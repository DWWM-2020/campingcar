<?php
include 'header.php';
include ('config_bdd_camping.php');//connexion 
?>
<?php
$id_supp=$_POST['id_camping'];//recupération de l'ID camping

$req=$connexion->query("DELETE FROM hebergement WHERE id_camping='$id_supp'");
//procédure de suppression de l'enregistrement

header("location:camping.php");
//après suppression retour à la liste des campings
?>
