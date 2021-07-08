<?php 

    include('connexion.php');
    $id = $_GET['id'];
    if (isset($_POST['motif']) AND isset($_POST['rapport']) AND isset($_POST['prescription'])){
        $motif = htmlspecialchars($_POST['motif']);
        $rapport = htmlspecialchars($_POST['rapport']);
        $prescription = htmlspecialchars($_POST['prescription']);
        
        $reqinsert = $bdd->prepare("INSERT INTO dossier(ID_Patient,Motif,Rapport,Prescription,Date_Consultation) VALUES (?,?,?,?,NOW()) ");
        $reqinsert->execute(array($id,$motif,$rapport,$prescription));

        $reqinsert->closeCursor();
    include('dossier.php');
    }
?>