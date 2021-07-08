<?php
session_start();
include('connexion.php');
header( 'content-type: text/html; charset=utf-8' );
    $id = $_GET['id'];
      
    
         $reqpatient = $bdd->query("SELECT *, DATE_FORMAT(Date_Consultation, '%d/%m/%Y') AS Date_Consultation,ceil((DATEDIFF(NOW(),Date_Naissance)/365.25)-1)  AS  Age FROM dossier, patients WHERE `dossier`.`ID_Patient`= `patients`.`ID` AND `dossier`.`ID`='$id' ");
     
         $donnees = $reqpatient-> fetch();

     
        


include('fpdf/fpdf.php');



$pdf = new FPDF('p', 'mm','A5');
$pdf->AddPage();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,5,'Dr. '.$_SESSION['Nom'].' '.$_SESSION['Prenom'],0,1,'L');
$pdf->Cell(0,5,$_SESSION['Specialite'],0,1,'L');
$pdf->Cell(0,5,$_SESSION['Adresse'],0,1,'L');
$pdf->Cell(0,5,'Email : '.$_SESSION['Email'],0,1,'L');
$pdf->Cell(0,5,'Tel : 0'.$_SESSION['Tel'],0,1,'L');

$pdf->SetFont('Arial','B',20);

$pdf->Cell(0,25, 'ORDONNANCE' ,0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,18,'Le  ' .$donnees[`dossier`.'Date_Consultation'], 0,1,'R');
$pdf->Cell(0,7,'Patient(e) : '.$donnees[`dossier`.'Nom'].' '.$donnees[`patients`.'Prenom'], 0,1,'R'); 
$pdf->Cell(0,5,'Age : '.$donnees[`patients`.'Age'], 0,1,'R');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,15, 'Prescription :', 0,1,'L');

$pdf->setY(120);
$pdf->SetFontSize(14);
$pdf->SetMargins(30,0);
$pdf->ln(1);    //Mettre la 1ère ligne au même niveau
$pdf->Write(7,html_entity_decode($donnees[`dossier`.'Prescription'],ENT_COMPAT | ENT_HTML5,"iso-8859-1"));

$pdf->setY(175);
$pdf->Cell(0,10, 'Signature' , 0,0,'R');


$pdf->Output();


?>  

