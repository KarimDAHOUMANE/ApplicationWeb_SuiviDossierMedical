<?php 
include('connexion.php');
include('dossier.php');

$modifid = $_GET['modifid'];
$id = $_GET['id'];
$req = $bdd->query('SELECT Motif, Rapport, Prescription, ID_Patient FROM dossier WHERE ID = '.$modifid);
$text = $req->fetch();

            echo "<script type=\"text/javascript\">document.getElementById('motif').value='".$text['Motif']."' </script>"  ;  
            echo "<script type=\"text/javascript\">document.getElementById('rapport').value= '".$text['Rapport']."' </script>"  ;
            echo "<script type=\"text/javascript\">document.getElementById('prescription').value= '".$text['Prescription']."' </script>"  ;
            echo "<script type=\"text/javascript\">enregistrerElt = document.getElementById('enregistrer')</script>" ;
//$req->closeCursor();
    
        echo "<script type=\"text/javascript\">formElt = document.getElementById('form')</script>" ;
        echo "<script type=\"text/javascript\">form.action='updateconsultation_post.php?id=".$modifid."&modifid=".$id."'</script>";
        $motif = htmlspecialchars($text['Motif']); 
        //var_dump($motif);
        $rapport = htmlspecialchars($text['Rapport']);
        $prescription = htmlspecialchars($text['Prescription']);
        $req2 = $bdd->query("UPDATE dossier SET Motif = '$motif',Rapport = '$rapport',Prescription = '$prescription' WHERE ID= '$id'");

    ?>
