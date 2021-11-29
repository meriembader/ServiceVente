

<?php
include_once "../../../../Controller/paiementC.php";
include_once "../../../../Model/paiement.php";

$paiementC=new paiementC();

if(isset($_POST['supprimer'])){
   
   $paiementC->supprimerpaiement($_POST['id']);
   header('location: consulterPaiement.php');
 } 
 ?>