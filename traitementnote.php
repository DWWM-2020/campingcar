
<?php
  include 'config_bdd_camping.php';
  if(session_status() == PHP_SESSION_NONE){//si session statut, est utilisé pour connaitre l"état de la session courante== session activé 
    session_start();//démarre la session ou reprend une session éxistante
  }
?>
<?php 
$id_camping=$_POST['id'];//nouvelles variables identiques à l'index id du formulaire
$note= (int)$_POST['note'];
$nombre=(int)$_POST['nombrenote'];
$totale=(int)$_POST['notetotale'];
$nombre = $nombre + 1;
$totale = $totale + $note; 
$moyenne = round($totale / $nombre); 

if(isset($_POST['note'])){
 
    $req=$connexion->prepare("UPDATE hebergement SET notetotale = ?, nombrenote =?, notemoyenne=? WHERE id_camping= ?");
    if($req->execute(array(
         $totale,$nombre,$moyenne,$id_camping,
    ))){
        header('Location:camping.php');
    }
}

  ?>

