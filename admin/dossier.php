<?php 
include('connexion.php');  
include('../include/header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dossier Patient</title>
</head>
<style> 
p.dj-validator-msg {
    display: table-caption;
    margin-left: 8px;
}
            @media (max-width: 767px) {
 

input#validate {
     
    margin-left: 14px;
    width: 276px;
 

}}
      
      @media (min-width: 767px) {
.d-flex.align-items-center.justify-content-center {
    
    float: left;
}.doc {display: flex;justify-content: center;}

input#validate {
     
    margin-left: 200px;
    width: 272px;
 

}
.table-responsive {
  /* min-height: .01%; */
  /* overflow-x: auto; */
  overflow: inherit;
}
}

.container.flex {
    display: flex;
     
}

label.col-md-4.control-label {
    text-align: right;
}
 
 h2 {
  text-align: center;
}

table caption {
	padding: .5em 0;
}

@media screen and (max-width: 767px) {
  table caption {
    border-bottom: 1px solid #ddd;
  }
  .table-responsive {
  /* min-height: .01%; */
  /* overflow-x: auto; */
  overflow: auto;
}
}

.p {
  text-align: center;
  padding-top: 140px;
  font-size: 14px;
}

 
</style>

<body>

    <?php
                
                $req = $bdd->prepare('SELECT Nom,Prenom,Sexe,DATE_FORMAT(Date_Naissance,\'%d/%m/%Y\') AS Date_Naissance_New,
                ceil((DATEDIFF(NOW(),Date_Naissance)/365.25)-1)  AS  Age,Wilaya,Commune,Num_Tel,Email,
                DATE_FORMAT(Date_Ajout,\'%d/%m/%Y\') AS Date_Ajout_New  FROM patients WHERE ID = ?');

                $req->execute(array($_GET['id']));    
                $donnees = $req->fetch();?>

<section id="contact" class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card p-6">
            <div class="card-body">
            <h2 class="display-6"> <?php   echo '<h2> Patient N° : ' . $_GET['id'] . '<h2>'; ?> </h2>
<h4>
<?php
echo '<p> Nom : ' . htmlspecialchars($donnees['Nom']) . '</p>';
echo '<p> Prénom : ' . htmlspecialchars($donnees['Prenom']) . '</p>';
if (htmlspecialchars($donnees['Sexe']) == 1)
{
    echo '<p> Sexe : Homme</p>';
}
else
{
    echo '<p> Sexe : Femme</p>';
}
echo '<p> Né(e) le : ' . htmlspecialchars($donnees['Date_Naissance_New']) . '</p>';
echo '<p> Age : ' . htmlspecialchars($donnees['Age']) . '</p>';   
echo '<p> Adresse : ' . htmlspecialchars($donnees['Commune']) . ',' . htmlspecialchars($donnees['Wilaya']) . '</p>';
echo '<p> Numéro de téléphone : ' .htmlspecialchars($donnees['Num_Tel']) . '</p>';
echo '<p> E-mail : ' . htmlspecialchars($donnees['Email']) . '</p>';
echo '<p> Inscrit le : ' . htmlspecialchars($donnees['Date_Ajout_New']) . '</p>';

$req->closeCursor();

$id = $_GET['id'];?></h4>
            </div>
          </div>
        </div>


        <div class="col-md-6">
          <div class="card p-4">
            <div class="card-body">
              <h3 class="text-center">Ajouter une consultation</h3>
              <hr>
              <form action="add_post.php?id=<?php echo $id;?>"  method="POST" id="form" >
    
              <div class="form-group" >
                    <label class="col-md-4 control-label"  for="textinput">Motif: </label>  
                    <div class="col-md-8"style="width:300px;" >
            <input id="motif" name="motif" class="form-control" style="    border-bottom-width: 1px;    margin-bottom: 12px;" type="text" value="" data-dj-validator="atext,3,20" onKeyUp="this.value=this.value.charAt(0).toUpperCase()+this.value.slice(1);"   required >
                  </div>
                </div>
              </div>

              <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Rapport: </label>  
                    <div class="col-md-8"style="width:300px; height:100px">
            <textarea id="rapport" name="rapport" class="form-control"style="    border-bottom-width: 1px;    margin-bottom: 12px;" data-dj-validator="atext,3,20"  onKeyUp="this.value=this.value.charAt(0).toUpperCase()+this.value.slice(1);"  required ></textarea>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Prescription: </label>  
                    <div class="col-md-8"style="width:300px; height:100px">
            <textarea id="prescription" name="prescription" class="form-control" style="    border-bottom-width: 1px;    margin-bottom: 12px;"  data-dj-validator="atext,3,20"  onKeyUp="this.value=this.value.charAt(0).toUpperCase()+this.value.slice(1);"  required></textarea>
                  </div>
                </div>

                <div class="form-group d-flex  align-items-center  justify-content-center">
                <input type="submit"  class="btn btn-outline-danger  " id="validate" value="Enregistrer">
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    
  </form>

  </p>
  <p>
    
  <div class="dr"style="width: 366px;padding-top: 19px;border-top-width: 4px;" >  </div>
               
               <div class="container">
               <h3 class=" col-lg-4 col-lg-offset-4" style="
               margin-top: 0px;
           ">Liste des Consultations </h3>
                   <div class="row">
                       <div>
                       <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table   table-hover">
        <tr>
                                <th class="col-sm-1" BGCOLOR=#17a2b8>ID</th>
                                <th BGCOLOR=#17a2b8>Motif</th>
                                <th BGCOLOR=#17a2b8>Date Consultation</th>
                                <th BGCOLOR=#17a2b8>Détails</th>
                                <th BGCOLOR=#17a2b8>Ordonnance</th>
                                <th BGCOLOR=#17a2b8>Modifier</th>
                           

        </tr>
    <?php
        
         $req = $bdd->prepare('SELECT ID, Motif, DATE_FORMAT(Date_Consultation, \'%d/%m/%Y\') AS DATEC FROM dossier WHERE ID_Patient = ? ORDER BY ID DESC');
         $req -> execute(array($id));
         
         while ($donnees = $req->fetch())
        {
            ?>
            <p>
                                <tr>
                                    <td><?php echo htmlspecialchars($donnees['ID']); ?></td>
                                    <td><?php echo htmlspecialchars($donnees['Motif']);?></td>
                                    <td><?php echo htmlspecialchars($donnees['DATEC']);?></td>
                                    <td><a href="detailsdossier.php?iddossier=<?php echo $donnees['ID'];?>&id=<?php echo $id;?>" class="btn"><img src="image\form.png" alt ="Détails"></a></td>
                                    <td><a href="ordonnance.php?id=<?php echo $donnees['ID'];?>" class="btn"><img src="image\opendoc.png" alt="Imprimer"></a></td>
                                    <td><a id="modif" href="update.php?id=<?php echo $id;?>&modifid=<?php echo $donnees['ID'];?>"  class="btn"><img src="image\edit.png" alt="Modifier"></a></td>
                                  

                                </tr>    
            </p>
            <?php
        }
$req->closeCursor();
?>
</table>
</div></div>
</div>
</div>
</div>
</div>
  
</body>
<script type="text/javascript" src="jquery-3.3.1.js" ></script>
            <script type="text/javascript" src="bootstrap.js" ></script>
            <script type="text/javascript" src="myScript.js" ></script>
            <script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
            <script type="text/javascript" src="dist/DjValidator.js"></script>
            <script type="text/javascript">

                    $.setDjValidatorStyle('display:none; text-align:inherit; font:.9em fantasy bold italic;color:#d80313; ');
                    
                    $(document).ready(function()
                    {
                        $('#validate').click(function()
                        {
                            return($('#form').djValidator('validate'));
                        });
                    });

    </script>
</html>