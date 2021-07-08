       <meta charset = "utf-8"/> 
         <title>Mot de passe oublié</title>
     <link href="admin\bootstrap.css" type="text/css" rel="stylesheet">
    <link href="admin\mystyle.css" type="text/css" rel="stylesheet"> 
    <style>
span.icon-bar {
    background: white;
}
body {
    /* margin: 9; */
    margin-top: 0px;
}
    </style>
  
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
           
                <form class="form-horizontal" action="motdepasseoublie_post.php" method="post"  >
                    <fieldset>
                    
                    <div class=" "> <legend><h2> Récupération du mot de passe </h2></legend> </div>
                   
                    <p>Pour pouvoir récuperer votre mot de passe vous devrez saisir votre email et répondre à la question secrete.<p>
                    <p>Saisissez ensuite votre nouveau mot de passe puis validez.</p>   
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Email: </label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="email" type="email" placeholder="" class="form-control input-md" data-dj-validator="atext,3,20" required>  
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Question secrète : Quel est le nom de votre meilleur ami ?</label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="questionsecrete" type="text" placeholder="" class="form-control input-md" data-dj-validator="atext,3,20"" required>  
                    </div>
                    </div>    

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Nouveau Mot de passe: </label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="mdp" type="password" placeholder="" class="form-control input-md" data-dj-validator="atext,3,20"" required>  
                    </div>
                    </div>         


                    <div class="form-group d-flex  align-items-center  justify-content-center">
                    
                
                    <input type="submit" value="Valider" id="validate"  class="btn btn-primary"> 
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