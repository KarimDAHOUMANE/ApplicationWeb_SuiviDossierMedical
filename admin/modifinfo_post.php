<?php 

include('connexion.php'); 

    if (isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['sexe']) AND isset($_POST['naissance']) AND isset($_POST['wilaya']) AND isset($_POST['commune']) AND isset($_POST['email']) AND isset($_POST['numtel']))
    {
        $id = $_GET['id'];  
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
        $req = $bdd->query("UPDATE patients SET Nom = '$nom',Prenom= '$prenom',Sexe= '$sexe',Date_Naissance= '$naissance',Wilaya= '$wilaya', Commune= '$commune',Email= '$email',Num_Tel= '$numtel' WHERE ID= '$id' ");
        include("listpatient.php");
    }
    
    echo '<div class="alert alert-success " role="alert">
        
    Le patient N° '.$id.' a été modifié avec succès. </div>';
    
?>