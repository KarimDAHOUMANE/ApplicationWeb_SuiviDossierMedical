<?php 
session_start();
include('connexion.php'); 


    if (isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['sexe']) AND isset($_POST['naissance']) AND isset($_POST['wilaya']) AND isset($_POST['commune']) AND isset($_POST['email']) AND isset($_POST['numtel']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        if ($_POST['sexe'] == 'homme')
            {
                $sexe = 1;
            }
        else
            {
                $sexe = 2;
            }
        $naissance = htmlspecialchars($_POST['naissance']);
        $wilaya = htmlspecialchars($_POST['wilaya']);
        $commune = htmlspecialchars($_POST['commune']);
        $email = htmlspecialchars($_POST['email']);
        $numtel = htmlspecialchars(intval($_POST['numtel']));       
        $req = $bdd->prepare('INSERT INTO patients(ID_Medecin,Nom,Prenom,Sexe,Date_Naissance,Wilaya,Commune,Email,Num_Tel,Date_Ajout) VALUES (?,?,?,?,?,?,?,?,?,NOW())');
        $req->execute(array($_SESSION['ID'],$nom,$prenom,$sexe,$naissance,$wilaya,$commune,$email,$numtel));
        $req->fetch();
    }
    header("location:listpatient.php");
    echo '<div class="alert alert-success " role="alert">
        
    Un nouveau patient a été ajouté !</div>';
    
    $req->closeCursor();
?>