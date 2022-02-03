<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}//état de la Session courante et égale session activée et qu'elle existe demarre une nouvelle ou reprend la Session éxistante
?>


<!doctype html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link id="pagestyle" type="text/css" rel="stylesheet" href="css/feuille1.css">
  <script src="page-1.js" type="js/page-1.js"></script>
 
</head>


  <header>
  <?php include 'headerbis.php'?> <!-- insere le tableau fait sur une autre page-->
</br>
  </header>

    
    <div class="container-fluid" style="margin-top: 10%;">
        <div class="container mx-auto" style="height:400px;min-width:60px;width:600px">
           <div class="row bg-transparent  "style="justify-content:center" >
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mx-auto">
          
                    <h1 class="text-info" ><strong>VOUS RECHERCHEZ DES AIRES DE CAMPING CAR OU CAMPINGS</strong></h1> <br>
                    
                     <p class="text-info" style="text-align:center;"> Vous recherchez une Aire ou Camping dans une ville ?<br></p>
               
                      <!--BARRE DE RECHERCHE-->
                   <form action="verif-form.php" method="get">
                  <!-- cet attribut contient le fichier qui va traiter les données en GET pour que l'internaute puisse partager-->
                  <input type="recherche" name="nom">
                  <!--nom sera utilisé sur la page traitement "verif-form.php"-->
                      <input type="submit" name="s" value="Rechercher par Ville">
                      <!-- rechercher -->
                </form> 
             </div>
             <div class=" col-xs-1 col-sm-1 col-md-2 col-lg-2 "></div> 
             </div>
           </div>
    </div>

    
                          <!--carte map-->
        <div class="container-fluid " style="margin-top: 5%;"> 
         <div class=" row  text-center">
         <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                     <iframe src="https://www.google.com/maps/d/embed?mid=1CMsVKqHvvAt5ICtpmlgjLScHH8J4nRHG&ehbc=2E312F" width="640" height="480" texte="center" ></iframe>
                  
                      
               </div>
            
              <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div-->
             
            </div>  
          </div>
      

       <div class="container-fluid " style="margin-top: 5%;"> 
         <div class=" row bg-transparent text-center">
         <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="container" style="height:100px;height:600px;min-width:60px;width:600px;overflow:auto;">
                <h3 class="text-danger"><strong> Venez partager et ajouter vos endroits</strong></h3> 
                      <?php include 'inserer_camping.php'?> <!-- insere le tableau fait sur une autre page-->
                  
                </div>
             </div>
             <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
           </div> 
        </div>

          <div class="hebergement">
             <div class="container-fluid mt-2">
                <div class="container mx-auto">
                  <div class="row">
                  <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="container mx-auto" style="min-height:30px;height:50px;min-width:100px;width:600px;">
                      <h3 class="text-info" style="justify-content: center;">Derniers Ajouts</h3>
               </div>
              </div>
              <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
             </div>
            </div>  
           </div>

          <div class="container-fluid mt-5 mb-5">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="container" style="min-height:200px;height:300px;min-width:100px;width:600px;overflow:auto;">
                 
                  <div class="table-wrapper-scroll-y my-custom-scrollbar">
                  <?php include 'config_bdd_camping.php'; ?>
                  <?php if (isset($_SESSION['auth'])) {
                    $user_id = $_SESSION['auth']['id'];
                    $req = $connexion->query("SELECT * FROM membre WHERE id=$user_id"); 
                    $donnee = $req->fetch();
                    $role = $donnee['admin'];
                  }
                  ?>
                
                  <table class="table table-striped text-white">
                    <thead class="text-white">
                      <th class="nom">Nom du Camping</th>
                      <th class="ville">Ville</th>
                      <th class="codepostal">Code postal</th>
                      <th class="tel">Téléphone</th>
                      <!--<th>Note</th>-->
                      <th class="moyenne"> Moyenne du Camping</th>
                      <th class="note"> Ajouter une note</th>
                    

                      <?php
                      // si la session authentifié 
                      if (isset($_SESSION['auth']) && $role == "admin") /* si la session est authentifier
                      avec le rôle ADMIN Mise à jour et Supprimer sera visible*/ : ?>
                        <th>MAJ/SUP</th>
                      <?php endif ?>
                    </thead>
                    <?php

                    //selectionne tout dans la BdD hebergement
                    $req = $connexion->query('SELECT * FROM hebergement');
                    //tant qu'il y a de données dans le tableau, la requête lit, celles-ci ligne par ligne
                    while ($donnees = $req->fetch()) {
                      //enregistrement des données sous formes de variables
                      $id_camping = $donnees['id_camping'];
                      $nom = $donnees['nom'];
                      $ville = $donnees['ville'];
                      $code_postal = $donnees['code_postal'];
                      $telephone = $donnees['telephone'];
                      $moyenneduCamping = $donnees['notemoyenne'];
                      $total = $donnees['notetotale'];
                      $nombre = $donnees['nombrenote'];
                    ?>
                      <tr>
                        <!--pas id camping sinon l' ID  s'affiche a l'ecran-->
                        
                        <td><?php echo $nom; ?></td>
                        <!--echo écrira en clair le NOM de la variable nom etc... pour les autres dessous-->
                        <td><?php echo $ville; ?></td>
                        <td><?php echo $code_postal; ?></td>
                        <td><?php echo $telephone; ?></td>
                        <td><?php echo $moyenneduCamping; ?></td>
                        
                        <td>
                          <form action="traitementnote.php" method="post">
                            <!-- action se fera dans la page traitement note.php-->
                            <input name="id" value="<?php echo $id_camping; ?>" type="hidden" />
                            <input name="notemoyenne" value="<?php echo $moyenneduCamping ?> " type="hidden" />
                            <input name="notetotale" value="<?php echo $total ?> " type="hidden" />
                            <input name="nombrenote" value="<?php echo  $nombre ?> " type="hidden" />
                            <input name="note" type="number" min="1" max="5" />
                            <!--la note va de 1 à 5 dans la page camping-->
                         
                            <input class="btn btn-info" type="submit" value="Envoie">
                          </form>
                        </td>
                        <?php
                        // avec le role administrateur//
                        if (isset($_SESSION['auth']) && $role == "admin") : ?>
                          <td>
                            <form action="maj_news_camping.php" method="post">
                              <!--la methode utilisée est post plus sécurisée pout la tranmission-->
                              <input name="id_camping" value="<?php echo $id_camping ?>" type="hidden" />
                              <input type="submit" name="maj" id="maj" value="maj" />
                            </form>
                          </td>

                          <td>
                            <form action="sup_news_camping.php" method="post">
                              <input name="id_camping" value="<?php echo $id_camping ?>" type="hidden" />
                              <input type="submit" name="sup" id="sup" value="sup" />
                            </form>
                          </td>

                          <td>
                            <form action="moyenne_note.php" method="post">
                              <input name="id_camping" value="<?php echo $id_camping ?>" type="hidden" />
                              <input type="submit" name="moyenne" id="moyenne" value="moyenne" />
                            </form>
                          </td>

                        <?php endif ?>
                      <?php } ?>
                  </table>

                  </form>
                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
                  


  <br><br>
  
            

  
    <div class="container-fluid mr-3">
        <div class="container mx-auto" style="height:400px;min-width:60px;width:600px;">
           <div class="row  text-center color-maroon"style="justify-content:center " >
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jumbotron bg-grey mx-auto">
          <p style="text-align:center;"><strong class="text-secondary">LES MEILLEURS ENDROITS DES CAMPINGS CARISTES</strong> <br>
           
             
          <p class="text-secondary" style="text-align:center;"> Vous pouvez vous inscrire à l'espace "Membres" et participer en apportant vos adresses d'aires ou de campings, et des points d'améliorations en discutant avec d'autre Camping-caristes.</p> 
            
              <p style="text-align: center;">
                <?php
                if (isset($_SESSION['auth'])) {
                  echo '<a class="btn btn-danger" href="deconnexion_membre.php" role="button">Me deconnecter</a>';
                } else {
                  echo '<a class="btn btn-warning" href="inscription.php" role="button">M\'inscrire</a>&nbsp';
                  echo '<a class="btn btn-primary" href="connexion_membre.php" role="button">Me connecter</a> ';
                }

                ?>
              </p>
            </p>
              </div>
          </div>
       </div>
      </div>
    </div>
     </div>
    
     <div class="container-fluid bg-light ">
    
            <footer class="text-muted p-3" ><span>2022© campings-caristes</span></footer>
        
     </div>        
      <!--?php include 'footer.php'; ?-->
   
    <!-- script -->
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>

              </body>

</html>