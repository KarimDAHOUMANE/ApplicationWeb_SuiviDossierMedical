<?php 
include('connexion.php'); 
        $sup = $_GET['suppid'];
        $s=$bdd->query('DELETE FROM patients WHERE ID = '.$sup);  
        include('listpatient.php'); 
?>