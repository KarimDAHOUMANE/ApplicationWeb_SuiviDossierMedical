<?php 
session_start();
try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=dentaire;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
       die('Erreur : ' .$e->getMessage());
    }

?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap.css" type="text/css" rel="stylesheet">
    <link href="mystyle.css" type="text/css" rel="stylesheet">

<?php


if (isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['sexe']) AND isset($_POST['naissance']) AND isset($_POST['adresse']) AND isset($_POST['specialite']) AND isset($_POST['email']) AND isset($_POST['numtel'])  AND isset($_POST['pseudo']) AND isset($_POST['mdp']) )
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
    $adresse = htmlspecialchars($_POST['adresse']);
    $specialite = htmlspecialchars($_POST['specialite']);
    $email = htmlspecialchars($_POST['email']);
    $numtel = htmlspecialchars(intval($_POST['numtel']));
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = sha1($_POST['mdp']);
    $qst= htmlspecialchars($_POST['qst']);

    $query = $bdd->prepare('SELECT Pseudo FROM medecin WHERE Pseudo = ? ');
    $query->execute(array($pseudo));
    $pseudoexist = $query->rowCount();
    //var_dump($pseudoexist);
    
    if($pseudoexist == 0) {

    $req = $bdd->prepare('INSERT INTO medecin(Nom,Prenom,Sexe,Date_Naissance,Adresse,Specialite,Tel,Email,Pseudo,Mot_passe,Question_Secrete) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
    $req->execute(array($nom,$prenom,$sexe,$naissance,$adresse,$specialite,$numtel,$email,$pseudo,$mdp,$qst));
    $req->closeCursor();
    include("index.php");
    
    echo '<div class="alert alert-success " role="alert">
    
Vous vous êtes inscrits avec succès !</div>';



    } else{

        
        
        echo '<div class="alert alert-danger " role="alert">
    
        Ce pseudo existe déja !</div>';
        include("inscription.php");

    }

}



?>



         
