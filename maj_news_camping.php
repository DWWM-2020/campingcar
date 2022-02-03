<?php 
include 'config_bdd_camping.php'; 
   
//récupétationde l'ID à modifié des données du formulaire //
$id_maj=$_POST['id_camping'];
// Requête de récupération dans une boucle pour récupérer chaque ligne//
$req= $connexion->query("SELECT*FROM hebergement WHERE id_camping='$id_maj'");
while ($donnees =$req->fetch())
{
   //enregistrement des sonnées sous forme de variable//
    $nom =$donnees['nom'];
    $ville =$donnees['ville'];
    $code_postal = $donnees['code_postal'];
    $telephone = $donnees['telephone'];
    $note=$donnees['notemoyenne'];

   ?>
<!doctype html>
<html lang="fr">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link id="pagestyle" type="text/css" rel="stylesheet" href="css/feuille1.css">
    <link rel="stylesheet" href="css/feuille1.css" type="text/css" media="screen"/>		
    </head>
 <body id="camping">
 <div class="container-fluid mx-auto">
        <div class="row"> 
            <div class="column ">
                 <div class="container">


<form id="form1" name="form1" method="post" action="maj_news_camping_traitement.php">
<p style="margin-top: 20%;">
<label for="titre">identifiant de camping</label>          <!--readonly, permet de cibler 
un élément que l'utilisateur ne peut pas modifier (l'élément est en lecture seule).-->
<input type ="text" name="id_camp" id="id_camp" readonly value="<?php echo $id_maj ?>"/>
</p>
<p>
    <label for="titre">Nom de Camping</label>
    <input type="text" name="nomcamping" id="camping" value="<?php echo $nom ?>"/>
</p>
<p>
<label for="titre">Ville</label>
<input type ="text" name="ville" id="ville" value="<?php echo $ville; ?>"/>
</p>

<p>
<label for="titre">code_postal</label>
<input type ="text" name="code_postal" id="code_postal" value="<?php echo $code_postal; ?>"/>
</p>

<p>
<label for="titre">Télephone</label>
<input type ="text" name="telephone" id="telephone" value="<?php echo $telephone; ?>"/>
</p>

<p>
<label for="titre">note</label>
<input type ="text" name="note" id="note"  value="<?php echo $note ?>"/>
</p>



<input type="submit" value="Envoyer les modifs">

</form>
</div>
       </div>
        </div>
 </div>
<?php } ?>