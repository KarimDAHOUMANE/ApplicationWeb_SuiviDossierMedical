<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"/>
        <title>Consultation Dossier</title>
        <link href="bootstrap.css" type="text/css" rel="stylesheet">
    <link href="mystyle.css" type="text/css" rel="stylesheet">
    <style>

a {
    color: white;
}
span.icon-bar {
    background: white;
}
@media (min-width: 767px) {
    input.form-control.mr-sm-2 {
        margin-top: 8px;    margin-left: 80px;

} }
@media (max-width: 767px) {
    input.form-control.mr-sm-2 {
        margin-top: 8px;    margin-left: 28px; width :180px;
} 
input.btn.btn-outline-success.my-2.my-sm-0 {
    margin-top: 8px;    margin-left: 28px; 
}
}



    </style>
</head>
<body>


<nav class="navbar navbar-dark navbar-fixed-top "style="background-color: #17a2b8;    " >
                <div class="container-fluid">
                    
                    <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"data-target="#mainNavBar" >
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand">Plateforme Médecin</a>
                    </div>

                    <!--Meni Items -->
                    <div class="collapse navbar-collapse" id="mainNavBar"  >
                    
                        <ul class="nav navbar-nav ">
                        <li><a href="listpatient.php">Liste des patients </a></li>
                            <li class="" ><a href="addpatient.php" >Ajouter un patient</a> </li>
                           <ul class="nav navbar-nav navbar-center">
                            <li><form action="recherche.php" method="get" class="form-inline my-2 my-lg-0" onsubmit="return recherche.value!=''" role="search">
                    <input name="recherche" type="text" placeholder="Recherche"  class="form-control mr-sm-2" style=" " >
                    
                    <input type="submit" value="Recherche" class="btn btn-outline-success my-2 my-sm-0" style=" margin-top: 8px;">
                </form>  
                            </li></ul>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">     
                            
                            <li><a href="../logout.php" >Déconnexion</a></li>                              
                        </ul>
                             
                    </div>
                  
    </form>
                    
                               
                    
    </nav>





    
</body>



</html>