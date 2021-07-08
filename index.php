<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
    <link href="admin\bootstrap.css" type="text/css" rel="stylesheet">
    <link href="admin\mystyle.css" type="text/css" rel="stylesheet">
</head>
<body>
       
    <div class="d-flex  align-items-center  justify-content-center ">
        <div class="panel center">
            <div class="panel-body">

                <form id="form" class="form-horizontal" action="login_post.php" method="POST">
                                  
                    <legend><h2>Plateforme Administration </h2> </legend>
                  
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Pseudo : </label>  
                    <div class="col-md-8"style="width:200px;">
                    <input name="Pseudo" type="text" placeholder="Ex : admin_1" class="form-control input-md" data-dj-validator="text,3,20"   required>  
                    </div>
                    </div>
				
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="MDP">Mot de passe : </label>
                    <div class="col-md-8" style="width:200px;">
                        <input name="mdp" type="password" class="form-control input-md" data-dj-validator="text,4,20"  required>
                    </div>
                    </div>
                    <a href="inscription.php">Nouveau sur la plateforme ? S'inscrire maintenant ->> </a> <br>
                    <a href="motdepasseoublie.php"> Mot de passe oublier ?</a>
                
              
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-8">
                    <input type="submit" value="S'authentifier" id="validate"  class="btn btn-primary"> 
                    
                    </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
	
	

   
<script src=""></script>


    <script type="text/javascript" src="style\jquery-3.3.1.js" ></script>
            <script type="text/javascript" src="style\bootstrap.js" ></script>
            <script type="text/javascript" src="style\myScript.js" ></script>
            <script type="text/javascript" src="style\lib\jquery\jquery.min.js"></script>
            <script type="text/javascript" src="style\dist\DjValidator.js"></script>

</body>
</html>