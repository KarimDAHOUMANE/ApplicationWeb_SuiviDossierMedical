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
 
    <nav class="navbar navbar-inverse navbar-fixed-top ">
                <div class="container-fluid">
                    
                    <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"data-target="#mainNavBar" >
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                        <a href="#"class="navbar-brand" >MENU</a>
                    </div>

                    <!--Meni Items -->
                    <div class="collapse navbar-collapse" id="mainNavBar"  >
                    
                        <ul class="nav navbar-nav ">
                            <li class="active"><a href="#"> Patient</a> </li>
                            <li><a href="listpatient.php">Liste des patients </a></li>
                        </ul>
                    </div>
                </div>    
    </nav>
                                          







  <form action="addpatient_post.php" method="post"   >
                                        
                                              
        <table border="0" cellspacing="4" cellpadding="4" >
        <tr><td><label class="fl">Nom : </label></td><td><input type="text" name="nom" class="form-group" requiered></td></tr>
        <tr><td><label class="fl">Prénom : </label></td><td><input type="text" name="prenom" class="form-group"></td></tr>
       
        <tr><td><label class="fl">Sexe : </label></td><td><select name="sexe" class="form-group">
                                        <option value="homme">Homme</option>
                                        <option value="femme">Femme</option>
                                     </select></td></tr>
            <tr><td><label class="fl">Date de naissance : </label></td><td><input type="date" name="naissance" class="form-group"></td></tr>
            <td><label class="fl">Wilaya : </label></td><td><input type="text" name="wilaya"class="form-group"></td></tr>
            <tr><td><label class="fl">Commune : </label></td><td><input type="text" name="commune"class="form-group"></td></tr>
            <tr><td><label class="fl">E-mail : </label></td><td><input type="email" name="email" style="width:200px;" placeholder="azerty@gmail.com" class="form-group"></td></tr>
            <tr><td><label class="fl">Téléphone : </label></td><td><input type="tel" name="numtel" style="width:90px;" class="form-group"></td></tr>
            <tr><td></td><td><input type="submit" value="Ajouter" class="btn btn-success"></td></tr>

        </table>
        </fieldset>
        </form>





                      


                    <div class="container footer text-right">
                        <div class="row footer">
                            <ul class="list-inline" >
                                    <li><a href="">sp Mention legales</a> </li>
                                    <li><a href="">Partenaires </a></li>
                                    <li><a href="">Avis</a></li>
                                    <li><a href="">FAQ</a></li>
                               
                            </ul>

                        </div>

                    </div>
                
                
                <script type="text/javascript" src="jquery-3.3.1.js" ></script>
                <script type="text/javascript" src="bootstrap.js" ></script>
                <script type="text/javascript" src="myScript.js" ></script>

                

                <div class="row">
	<div class="panel panel-default col-md-4">
		<div class="panel-body">
			<form id="form" class="form-horizontal">
				<fieldset>
				
				<legend>Custom styles and messages</legend>
				
				<div class="form-group">
				  <label class="col-md-4 control-label" for="textarea">Name</label>
				  <div class="col-md-8">                     
				    <textarea class="form-control" name="textarea" placeholder="text,3,12" data-dj-validator="text,3,12" data-dj-validator-msg="Name is not valid!" required></textarea>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-md-4 control-label" for="passwordinput">Word (word)</label>
				  <div class="col-md-8">
				    <input name="passwordinput" type="password" placeholder="word,4,8" class="form-control input-md" data-dj-validator="word,4,8" data-dj-validator-msg="Passwrod invalid!" required>
				  </div>
				</div>
		
				<div class="form-group">
				  <label class="col-md-4 control-label" for="textinput">Alphabetic text (atext)</label>  
				  <div class="col-md-8">
				  <input name="textinput" type="text" placeholder="placeholder" class="form-control input-md" data-dj-validator="atext,3,12" data-dj-validator-msg="Only between 3 and 12 letters." required>  
				  </div>
				</div>
						
				<div class="form-group">
				  <label class="col-md-4 control-label" for="textinput">Alphabetic and numeric text (antext)</label>  
				  <div class="col-md-8">
				  <input name="textinput" type="text" placeholder="antext,3,12" class="form-control input-md" data-dj-validator="antext,3,12" data-dj-validator-msg="Only between 3 and 12 letters or digits." required>
				  </div>
				</div>
			
				</fieldset>
				
				<div class="form-group">
				  <label class="col-md-4 control-label" for="singlebutton"></label>
				  <div class="col-md-8">
				    <button type="button" id="validate" name="singlebutton" class="btn btn-primary">Validate!</button>
				  </div>
				</div>
			
			</form>
		</div>
	</div>
	</div>
	
	
	</body>
	<script type="text/javascript" src="../lib/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../dist/DjValidator.js"></script>
	<script type="text/javascript">
	
		$.setDjValidatorStyle('display:none; text-align:center; color:white; background-color:red;');
		
		$(document).ready(function(){
			$('#validate').click(function(){
				alert($('#form').djValidator('validate'));
			});
		});
	</script>




    
</body>
</html>