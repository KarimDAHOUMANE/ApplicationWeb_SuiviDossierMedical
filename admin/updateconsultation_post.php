<?php 
include('connexion.php');

$modifid = $_GET['modifid'];

        $motif = htmlspecialchars($_POST['motif']); 
        $rapport = htmlspecialchars($_POST['rapport']);
        $prescription = htmlspecialchars($_POST['prescription']);
        $bdd->query("UPDATE dossier SET Motif = '$motif',Rapport = '$rapport',Prescription = '$prescription' WHERE ID= ".$modifid);
        include('dossier.php');
    ?>
