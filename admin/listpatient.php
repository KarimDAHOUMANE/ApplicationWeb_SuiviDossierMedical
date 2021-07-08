<?php
session_start();
include('connexion.php'); 
    $_SESSION['$patientsparpage'] = 5; //Nombre de patients par page (système de pagination)
    $idmedecin=$_SESSION['ID'];
    $patientstotalreq = $bdd->query('SELECT ID FROM patients WHERE ID_Medecin ='.$idmedecin);
    $nbpatient = $patientstotalreq->rowCount(); //Sert à compter le nombre de ligne dans la table de la bdd
    $pagesTotales = ceil($nbpatient/$_SESSION['$patientsparpage']); //Transforme la variable E.000 en E+1 (Pour enlever la virgule)
    $_SESSION['$nbpatientlastpage'] = $nbpatient%$_SESSION['$patientsparpage']; 
    $_SESSION['$i'] = 1;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Liste des patients</title>
    <link href="bootstrap.css" type="text/css" rel="stylesheet">
    <link href="mystyle.css" type="text/css" rel="stylesheet">
</head>
 <style>
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
}

.p {
  text-align: center;
  padding-top: 140px;
  font-size: 14px;
}
 </style>

<body>




<?php include("..\include\header.php"); ?>
 
   
                <div class="dr"style="width: 366px;padding-top: 19px;border-top-width: 4px;" >  <h2><?php echo 'Dr. '.$_SESSION['Nom'].' '.$_SESSION['Prenom'];?></h2></div>
               
    <div class="container">
    <h3 class=" col-lg-4 col-lg-offset-4" style="margin-top: 0px;">Liste des Patients </h3>
        <div class="row">
            <div>
               
                
                
               <div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table   table-hover">
                  
                        <thead>
                            <CAPTION align=top>
                                <h4> Nombre de Patients : <?php echo $nbpatient;?></h4>
                            </CAPTION>



                            <tr>
                                <th   BGCOLOR=#17a2b8>ID Patient</th>
                                <th BGCOLOR=#17a2b8>Nom</th>
                                <th BGCOLOR=#17a2b8>Prénom</th>
                                <th BGCOLOR=#17a2b8>Sexe</th>
                                <th BGCOLOR=#17a2b8>Age</th>
                                <th BGCOLOR=#17a2b8>Wilaya</th>
                                <th BGCOLOR=#17a2b8>Commune</th>
                                <th BGCOLOR=#17a2b8>Dossier</th>
                                <th BGCOLOR=#17a2b8>Modifier</th>
                                <th BGCOLOR=#17a2b8>Supprimer</th>
                            </tr>



                            <?php

    
    if (isset ($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0)
        {
            $_GET['page'] = intval($_GET['page']);
            $pagecourante = $_GET['page'];
        }
    else
        {
            $pagecourante = 1;
        }
        $_SESSION['$depart'] = ($pagecourante - 1)*$_SESSION['$patientsparpage'];

    $requete = $bdd->query("SELECT ID,Nom,Prenom,Sexe,ceil((DATEDIFF(NOW(),Date_Naissance)/365.25)-1)  AS  Age,Wilaya,Commune FROM patients WHERE ID_Medecin='$idmedecin' ORDER BY ID LIMIT ".$_SESSION['$depart'].",".$_SESSION['$patientsparpage']);

     while ($donnees = $requete->fetch())
    {?>
                            <p>
                                <tr>
                                    <td><?php echo htmlspecialchars($donnees['ID']); ?></td>
                                    <td><?php echo htmlspecialchars($donnees['Nom']);?></td>
                                    <td><?php echo htmlspecialchars($donnees['Prenom']);?></td>
                                    <td><?php if (htmlspecialchars($donnees['Sexe']) == 1)
            {
                echo 'Homme';
            }
        else
            {
                echo 'Femme';
            }?></td>
                                    <td><?php echo htmlspecialchars($donnees['Age']);?></td>
                                    <td><?php echo htmlspecialchars($donnees['Wilaya']);?></td>
                                    <td><?php echo htmlspecialchars($donnees['Commune']);?></td>
                                    <td><a href="dossier.php?id=<?php echo $donnees['ID'];?>" class="btn"><img
                                                src="image\form.png" alt="Consulter"></a></td>
                                    <div class="container">
                                        <td><a href="modifinfo.php?id=<?php echo $donnees['ID'];?>"
                                                class="btn blue"><img src="image\edit.png" alt="Modifier"></a></td>

                                    </div>

                                    <td><a class="btn red"
                                            href="delpatient_post.php?suppid=<?php echo $donnees['ID'];?>&page=<?php if($_SESSION['$nbpatientlastpage'] == 1) { echo $_SESSION['$i'] - 1; } else {echo $_SESSION['$i'];}?>"
                                            onclick="return confirm ('Voulez-vous vraiment supprimer ce patient ?');"><img
                                                src="image\rubbish-bin.png" alt="Supprimer"></a></td>
                                </tr>
                            </p>

                            <?php 
    }?>

                        </thead>


                    </table>
                    </div>

</div>
</div>
                </div>

            </div>
        </div>
    </div>


    <?php


    echo '<p align="center" class="footer" >Page : ';


    for ($i=1;$i<=$pagesTotales;$i++)
    { 
       
        if ($i == $pagecourante)
        {
            echo ' '.$i.' '; $_SESSION['$i'] = $i; 
        }
        else
        {
            echo ' <a href="listpatient.php?page='.$i.'" class="btn btn-link">' . $i . '</a> '; 
        }
       
    }

 ?>
    </TABLE>
    <?php
    $requete->closeCursor();
    $patientstotalreq->closeCursor();    
?>



    <script type="text/javascript" src="jquery-3.3.1.js"></script>
    <script type="text/javascript" src="bootstrap.js"></script>
    <script type="text/javascript" src="myScript.js"></script>

</body>

</html>