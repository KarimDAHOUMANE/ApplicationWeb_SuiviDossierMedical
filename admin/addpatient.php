<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter Patient</title>
    <link href="bootstrap.css" type="text/css" rel="stylesheet">
    <link href="mystyle.css" type="text/css" rel="stylesheet">
</head>

<body>
<?php  
include("..\include\header.php");
?>    
    <div class=" d-flex  align-items-center  justify-content-center ">
        <div class="panel center">
            <div class="panel-body">

                <form id="form" class="form-horizontal" action="addpatient_post.php" method="post"  >
                    <fieldset>
                    
                    <div class=" "> <legend><h2> Formulaire d'ajout</h2></legend> </div>
                   
                  
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Nom: </label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="nom" type="text" placeholder="" class="form-control input-md"  data-dj-validator="atext,4,20" onKeyUp="this.value=this.value.toUpperCase()"   required>  
                    </div>
                    </div>

                    <div class="form-group" >
                    <label class="col-md-4 control-label" for="textinput">Prénom: </label>  
                    <div class="col-md-8" style="width:250px;">
                    <input name="prenom" type="text" placeholder="" class="form-control input-md" data-dj-validator="atext,2,20" onKeyUp="this.value=this.value.charAt(0).toUpperCase()+this.value.slice(1);" required>  
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
                    <label class="col-md-4 control-label" for="textinput">Wilaya: </label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="wilaya" type="text" placeholder="Tizi Ouzou" class="form-control input-md" data-dj-validator="atext,3,20" onKeyUp="this.value=this.value.toUpperCase()" required>  
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Commune: </label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="commune" type="text" placeholder="Azazga" class="form-control input-md" data-dj-validator="atext,3,20" onKeyUp="this.value=this.value.toUpperCase()" required>  
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">E-mail : </label>  
                    <div class="col-md-8"style="width:250px;">
                    <input name="email" type="email" placeholder="azerty@gmail.com" class="form-control input-md" data-dj-validator="email,*" > 
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label" >Téléphone :</label>  				
                    <div class="col-md-8"style="width:250px;">				  
                    <input name="numtel"  type="tel"  class="form-control input-md" data-dj-validator="phone" placeholder="0337 23 44 10"  required>
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