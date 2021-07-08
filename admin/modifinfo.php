<?php

include('connexion.php'); 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter Patient</title>
    <link href="bootstrap.css" type="text/css" rel="stylesheet">
    <link href="mystyle.css" type="text/css" rel="stylesheet">
    
</head>
<style>


input#validate {
        margin-right: 80px; 
        margin-top: 20px;
    }


</style>
<body>
    <?php 
        include("..\include\header.php");
    
          $id=$_GET['id'];
          $requete = $bdd->prepare('SELECT ID,Nom,Prenom,Sexe,DATE_FORMAT(Date_Naissance,\'%d/%m/%Y\') AS Date_Naissance_New,Wilaya,Commune,Email,Num_Tel FROM patients WHERE ID = ?');
          $requete->execute(array($id));
          $donnees = $requete->fetch();
          $_SESSION['$nom1'] = htmlspecialchars($donnees['Nom']);
          $_SESSION['$prenom1'] = htmlspecialchars($donnees['Prenom']);
          $_SESSION['$sexe1'] = htmlspecialchars($donnees['Sexe']);
          $_SESSION['$naissance1'] = htmlspecialchars($donnees['Date_Naissance_New']);
          $_SESSION['$wilaya1'] = htmlspecialchars($donnees['Wilaya']);
          $_SESSION['$commune1'] = htmlspecialchars($donnees['Commune']);
          $_SESSION['$email1'] = htmlspecialchars($donnees['Email']);
          $_SESSION['$numtel1'] = htmlspecialchars($donnees['Num_Tel']);
        ?>

            

            
    <div class="  d-flex  align-items-center  justify-content-center">
      <div class="panel center">
        <div class="panel-body">
            <form id="form" class="form-horizontal" action="modifinfo_post.php?id=<?php echo $id;?>" method="post"  >
                <fieldset style=" margin-top: 25px;">

                
                
                <legend> <h2><p>  </p>  Modifier Patient N°: <?php echo $id; ?></h2></legend>
                
                <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Nom: </label>  
                <div class="col-md-8"style="width:250px;">
                <input name="nom" type="text" placeholder="" class="form-control input-md" data-dj-validator="atext,3,32" onKeyUp="this.value=this.value.toUpperCase()"  value="<?php echo $_SESSION['$nom1'];?>" required>  
                </div>
                </div>

                <div class="form-group" >
                <label class="col-md-4 control-label" for="textinput">Prenom: </label>  
                <div class="col-md-8" style="width:250px;">
                <input name="prenom" type="text" placeholder="" class="form-control input-md" data-dj-validator="atext,3,32" onKeyUp="this.value=this.value.charAt(0).toUpperCase()+this.value.slice(1);"  value="<?php echo $_SESSION['$prenom1'];?>" required>  
                </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label"  >Sexe :</label>  
                    <div class="col-md-8" style="width:250px;">
                        <select name="sexe" class="form-control" value="<?php echo  $_SESSION['$sexe1'];?>" required>
                        <?php if ($_SESSION['$sexe1'] == 1) { 
                                echo "<option value= homme SELECTED>Homme</option>";
                                echo "<option value= femme >Femme</option>";
                        	    } else {
                                echo "<option value= homme >Homme</option>";  
                        		echo "<option value= femme SELECTED>Femme</option>";
                        	  }?> 
                        </select>
                    </div>
                    </div>

                        
             
                

                <?php  $req = $bdd->prepare('SELECT Date_Naissance FROM patients WHERE ID = ?');
              $req->execute(array($id));
              $donnee = $req->fetch();
              $donnee['$naissance1'] = htmlspecialchars($donnee['Date_Naissance']);?>
              
                <div class="form-group">
                <label class="col-md-4 control-label" >Date de naissance : </label>  
                <div class="col-md-8" style="width:250px;">
                <input name="naissance" type="date" class="form-control" value="<?php echo $donnee['$naissance1'];?>" required>  
                </div>
                </div>
                       
                <div class="form-group">
                <label class="col-md-4 control-label">Wilaya: </label>  
                <div class="col-md-8"style="width:250px;">
                <input name="wilaya" type="text" placeholder="Ex: Tizi Ouzou" class="form-control input-md" onKeyUp="this.value=this.value.toUpperCase()"  data-dj-validator="atext,3,12"  value="<?php echo $_SESSION['$wilaya1'];?>" required>  
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Commune: </label>  
                <div class="col-md-8"style="width:250px;">
                <input name="commune" type="text" placeholder="Ex: Azazga" class="form-control input-md" onKeyUp="this.value=this.value.toUpperCase()"  data-dj-validator="atext,3,12" value="<?php echo $_SESSION['$commune1'];?>" required>  
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">E-mail : </label>  
                <div class="col-md-8"style="width:250px;">
                <input name="email" type="email" placeholder="azerty@gmail.com" class="form-control input-md" data-dj-validator="email,*" value="<?php echo $_SESSION['$email1'];?>" > 
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Téléphone :</label>  				
                <div class="col-md-8"style="width:250px;">				  
                <input name="numtel"  type="tel"  class="form-control input-md" data-dj-validator="phone" placeholder="0337 23 44 10"  value="<?php echo $_SESSION['$numtel1'];?>" required>
                </div>
                </div>                  


                <div class="form-group d-flex  align-items-center  justify-content-center">
                
               
                <input type="submit" value="Valider" id="validate"  class="btn btn-primary" onclick="return confirm ('Êtes-vous sûr de vouloir effectuer la modification  ?');" > 
               
               
              
                </div>

              
                </fieldset>

     
            </form>
        </div>
     </div>
    </div>

        <?php $requete->closeCursor();?>


        <script type="text/javascript" src="jquery-3.3.1.js" ></script>
            <script type="text/javascript" src="bootstrap.js" ></script>
            <script type="text/javascript" src="myScript.js" ></script>
            <script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
            <script type="text/javascript" src="dist/DjValidator.js"></script>
            <script type="text/javascript">

                    $.setDjValidatorStyle('display: -webkit-inline-box;color:#d80313; ');
                    
                    $(document).ready(function()
                    {
                        $('#validate').click(function()
                        {
                            return($('#form').djValidator('validate'));
                        });
                    });

    </script>
            
</body>
</html>