<?php
session_start();
 include('admin/connexion.php');
?>

    <?php
        $pseudo = htmlspecialchars($_POST['Pseudo']);
        $mdp = sha1($_POST['mdp']);
        $reponse = $bdd->query(" SELECT * FROM medecin WHERE Pseudo = '$pseudo' AND Mot_passe = '$mdp' ");
        if (isset($_POST['Pseudo'])  == ($donnees=$reponse->fetch()))
        {
    $_SESSION['ID'] = $donnees['ID'];
    $_SESSION['Pseudo'] = $donnees['Pseudo'];
    $_SESSION['Nom'] = $donnees['Nom'];
    $_SESSION['Prenom'] = $donnees['Prenom'];
    $_SESSION['Sexe'] = $donnees['Sexe'];
    $_SESSION['Date_Naissance'] = $donnees['Date_Naissance'];
    $_SESSION['Adresse'] = $donnees['Adresse'];
    $_SESSION['Specialite'] = $donnees['Specialite'];
    $_SESSION['Tel'] = $donnees['Tel'];
    $_SESSION['Email'] = $donnees['Email'];
    header('location:admin\listpatient.php');
        }
        else
        {  
            include('index.php');
            ?>
            
           
            
            <?php
            echo ' <div class="alert alert-danger  " role="alert">

            
           Pseudo ou Mot de passe incorrect </div>';
        }
    ?>


