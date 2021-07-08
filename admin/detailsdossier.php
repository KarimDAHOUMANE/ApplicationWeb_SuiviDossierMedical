<?php 
include('connexion.php');  
include('../include/header.php');

    $idpatient=$_GET['id']; //récupère l'id du patient
    $iddossier=$_GET['iddossier']; //récupère l'id du dossier
    $dossierprecedent = $bdd->query("SELECT ID FROM dossier WHERE ID = (SELECT MAX(ID) FROM dossier WHERE ID < '$iddossier' AND ID_Patient = '$idpatient')");
    $precedent = $dossierprecedent->fetch(); //récupère l'id du dossier précédent
    $dossiersuivant= $bdd->query("SELECT ID FROM dossier WHERE ID = (SELECT MIN(ID) FROM dossier WHERE ID > '$iddossier' AND ID_Patient = '$idpatient')");
    $suivant = $dossiersuivant->fetch(); //récupère l'id du dossier suivant
    if($precedent == NULL AND $suivant == NULL){
        echo '<style> #precedent, #suivant {visibility: hidden;} 
        .d-flex.align-items-center.justify-content-center {
            display: flex;
            float: left;
            justify-content: center;
        }
        
        .panel-body {
            justify-content: center;
            display: flex;
        }
        
        .panel-body {}
        
        .doc {
            justify-content: center;
            display: flex;
        }<style>';
    }
    if($precedent == NULL){
        echo '<style> #precedent {visibility: hidden;
        
        
        } @media (min-width: 767px) {
        .d-flex.align-items-center.justify-content-center {
            display: flex;
            float: left;
            justify-content: center;
        }
        
        .panel-body {
            justify-content: center;
            display: flex;
        }
        
        .panel-body {}
        
        .doc {
            justify-content: center;
            display: flex;}
        }<style>';
    }
    if($suivant == NULL){
        echo '<style> #suivant {visibility: hidden;}
        @media (min-width: 767px) {
        .d-flex.align-items-center.justify-content-center {
            display: flex;
            float: left;
            justify-content: center;
        }
        
        .panel-body {
            justify-content: center;
            display: flex;
        }
        
        .panel-body {}
        
        .doc {
            justify-content: center;
            display: flex;
        }} <style>';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dossier Patient</title>
</head>
<style>
      @media (min-width: 767px) {
.d-flex.align-items-center.justify-content-center {
    
    float: left;
}.doc {display: flex;justify-content: center;}



}

</style>
<body>

<a href="dossier.php?id=<?php echo $idpatient;?>" class="btn"><img
                                                src="image\rett.png" alt="retour"> Retour </a>


                                               
                                                 
    <?php
                 
                $req = $bdd->prepare('SELECT Nom,Prenom,Sexe,DATE_FORMAT(Date_Naissance,\'%d/%m/%Y\') AS Date_Naissance_New,
                ceil((DATEDIFF(NOW(),Date_Naissance)/365.25)-1)  AS  Age,Wilaya,Commune,Num_Tel,Email,
                DATE_FORMAT(Date_Ajout,\'%d/%m/%Y\') AS Date_Ajout_New  FROM patients WHERE ID = ?');

                $req->execute(array($idpatient));    
                $donnees = $req->fetch();?>
                <div class="doc"> 


             

    <div class=" d-flex  align-items-center  justify-content-center ">
    <a id="precedent" href="detailsdossier.php?iddossier=<?php echo $precedent['ID']?>&id=<?php echo $idpatient?>" class="btn"><img
                                                src="image\lef.png" alt="Consulter"></a>

        <div class="panel center">
            <div class="panel-body">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container-fluid  ">
                        <h2 class="display-4"> <?php   echo '<h2> Patient N° : ' . $_GET['id'] . '<h2>'; ?> </h2>

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
                        ?>
                </div></div></div></div>
                
                
                 
                
                                                
                
                </div>


               
<?php
        
         $req = $bdd->prepare('SELECT *, DATE_FORMAT(Date_Consultation, \'%d/%m/%Y\') AS DATEC FROM dossier WHERE ID_Patient = ? AND ID = ? ORDER BY ID DESC');
         $req -> execute(array($idpatient,$iddossier));
         $donnees = $req->fetch();
?>
<div class=" d-flex  align-items-center  justify-content-center ">
        <div class="panel center">
            <div class="panel-body">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container-fluid  ">
                <p><h2 class="display-4"><?php echo 'Consultation n°'.htmlspecialchars($donnees['ID']); ?></h2></p>
                                <p><?php echo 'Motif : '.htmlspecialchars($donnees['Motif']);?></p>
                                <p><?php echo 'Date : '.htmlspecialchars($donnees['DATEC']);?></p>
                                <p><?php echo 'Rapport : '.htmlspecialchars($donnees['Rapport']);?></p>
                                <p><?php echo 'Prescription : '.htmlspecialchars($donnees['Prescription']);?></p>
                                <a href="ordonnance.php?id=<?php echo $donnees['ID'];?>" class="btn " style="color:black;  "> <h4> Imprimer ordonnance <img src="image\opendoc.png" alt="Imprimer"></h4></a>
                            </tr>
                        </p>
                        </div></div></div></div>
                        <a id="suivant" href="detailsdossier.php?iddossier=<?php echo $suivant['ID']?>&id=<?php echo $idpatient?>" class="btn"><img
                                                src="image\righ.png" alt="Consulter"></a></div>
            </div>

<?php
$req->closeCursor();
?>
            
                                                
             
</body>

</html>