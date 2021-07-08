<?php
 include('admin/connexion.php');


        $email = htmlspecialchars($_POST['email']);
        $questionsecrete = htmlspecialchars($_POST['questionsecrete']);
        $reponse = $bdd->query(" SELECT * FROM medecin WHERE Email = '$email' AND Question_Secrete = '$questionsecrete' ");
        if (isset($email)  == ($donnees=$reponse->fetch()))
        {
                $mdp = sha1($_POST['mdp']);
                $req = $bdd->query("UPDATE medecin SET Mot_passe = '$mdp' WHERE Email = '$email' AND Question_Secrete = '$questionsecrete' ");
                include("index.php");
                       
                    echo '<div class="alert alert-success " role="alert">Votre mot de passe a été modifié avec succès !</div>';
                    $req->closeCursor();
                    $reponse->closeCursor();
        }
else{
include('motdepasseoublie.php');

            echo ' <div class="alert alert-danger  " role="alert">
            
           Email ou réponse à la question incorrect </div>';
}
?>