<?php 
include('connexion.php'); 
        $sup = $_GET['suppid'];
        $s=$bdd->query('DELETE FROM dossier WHERE ID = '.$sup);  
        include('dossier.php'); 
?>