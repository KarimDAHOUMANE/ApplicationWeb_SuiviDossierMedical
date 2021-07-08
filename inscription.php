<?php
 $bdd = new PDO('mysql:host=localhost;dbname=dentaire', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
         <meta charset = "utf-8"/> 
     <link href="admin\bootstrap.css" type="text/css" rel="stylesheet">
    <link href="admin\mystyle.css" type="text/css" rel="stylesheet"> 
    <style>
 @media (min-width: 767px) {
    .d-flex.align-items-center.justify-content-center {
    height: 380px;
}

.form-group.d-flex.align-items-center.justify-content-center {
    height: 47px;
}
}





    
 

span.icon-bar {
    background: white;
}
body {
    /* margin: 9; */
    margin-top: 0px;
}
    </style>
    <!-- LOGIN -->
  
          <?php
            if (isset($erreurs)) {
                foreach ($erreurs as $erreur) {
                    ?>
                    <div class="erreur"><?php echo $erreur; ?></div>
                    <?php
                }
            }
            if (isset($success)) {
                ?>
                    <div class="success"><?php echo $success; ?></div>
                <?php
            }
            
         ?>
         
         <a href="index.php" class="btn"><img
                                                src="admin\image\rett.png" alt="retour"> retour </a> 

         <div class=" d-flex  align-items-center  justify-content-center ">
     
        <div class="panel center">
            <div class="panel-body">
           
                <form id="form" class="form-horizontal" action="inscription_post.php" method="post"  >
                    <fieldset>
                    
                    <div class=" ">  <legend>  <h2>  Inscription </h2></legend> </div>
                   
                  
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Nom: </label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="nom" type="text" placeholder="" class="form-control input-md" data-dj-validator="atext,3,20" onKeyUp="this.value=this.value.toUpperCase()"  required>  
                    </div>
                    </div>

                    <div class="form-group" >
                    <label class="col-md-4 control-label" for="textinput">Prénom: </label>  
                    <div class="col-md-8" style="width:250px;">
                    <input name="prenom" type="text" placeholder="" class="form-control input-md" data-dj-validator="atext,3,20" onKeyUp="this.value=this.value.charAt(0).toUpperCase()+this.value.slice(1);"  required>  
                    </div>
                    </div>
                            
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Sexe :</label>  
                    <div class="col-md-8" style="width:250px;">
                        <select name="sexe" class="form-control" required>
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                        </select>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Date de naissance : </label>  
                    <div class="col-md-8" style="width:250px;">
                    <input name="naissance" type="date" class="form-control" required>  
                    </div>
                    </div>
                           
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Adresse: </label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="adresse" type="text" placeholder="Tizi Ouzou" class="form-control input-md" onKeyUp="this.value=this.value.toUpperCase()" data-dj-validator="antext,3,20" required>  
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Specialité: </label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="specialite" type="text" placeholder="Dentiste" class="form-control input-md" onKeyUp="this.value=this.value.charAt(0).toUpperCase()+this.value.slice(1);" data-dj-validator="atext,3,20" required>  
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">E-mail : </label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="email" type="email" placeholder="azerty@gmail.com" class="form-control input-md" data-dj-validator="email,*" required> 
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label" >Téléphone :</label>  				
                    <div class="col-md-8"style="width:250px;">				  
                    <input name="numtel"  type="tel"  class="form-control input-md" data-dj-validator="phone" placeholder="0337 23 44 10"  required>
                    </div>
                    </div>      

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Pseudo: </label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="pseudo" type="text" placeholder="" class="form-control input-md" data-dj-validator="antext,3,20" required>  
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Mot de passe: </label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="mdp" type="password" placeholder="" class="form-control input-md" data-dj-validator="antext,3,20" required>  
                    </div>
                    </div>            

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Quel est votre meilleur ami: </label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="qst" type="textArea" placeholder="" class="form-control input-md" data-dj-validator="atext,3,20" required>  
                    </div>
                    
                    </div>            


                    <div class="form-group d-flex  align-items-center  justify-content-center">
                    
                
                    <input type="submit" value="Ajouter" id="validate"  class="btn btn-primary">
                    <button type="reset"class="btn" >Annuler</button> 
                       

                    
                    
                    </div>
                   
                    </fieldset>

                </form>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="jquery-3.3.1.js" ></script>
            <script type="text/javascript" src="admin/bootstrap.js" ></script>
            <script type="text/javascript" src="admin/myScript.js" ></script>
            <script type="text/javascript" src="admin/lib/jquery/jquery.min.js"></script>
            <script type="text/javascript" src="admin/dist/DjValidator.js"></script>
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