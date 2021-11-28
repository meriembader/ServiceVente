

<?php
include_once "../../../../Controller/commandeC.php";
include_once "../../../../Model/commande.php";

$commandeC=new commandeC();

if(isset($_POST['supprimer'])){
   
   $commandeC->supprimerCommande($_POST['idC']);
   header('location: consulterCommande.php');
 } 
 ?>