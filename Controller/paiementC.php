<?php
	
	include_once "../../../../config.php";

	/**
	* 
	*/

	
	class paiementC
	{
		
		function afficher(){
			$db = config::getConnexion();
			$sql = "SELECT * FROM paiement ";
			$liste = $db->query($sql);
			return $liste;
		}

		function ajouter($paiement){
			$db = config::getConnexion();
			$sql = "INSERT INTO paiement VALUES(:commandeRef,:produit,:prix,:date,:mode)";
			$req = $db->prepare($sql);
			
			$req->bindValue(':commandeRef',$paiement->getCommandeRef());
			
			$req->bindValue(':produit',$paiement->getProduit());
			$req->bindValue(':prix',$paiement->getPrix());
			$req->bindValue(':date',$paiement->getDate());
			$req->bindValue(':mode',$paiement->getMode());
	

			$req->execute();
		}

		function recuperer($nomUser){
			$db = config::getConnexion();
			$sql = "SELECT * FROM paiement WHERE mode=:mode";
			$req=$db->prepare($sql);
			$req->bindValue(':mode',$mode);
			return $req;
		}
	/*	function afficherJoinedpaiement(){
			$db = config::getConnexion();
			$sql="SELECT commande.reference,paiement.prix,paiement.mode   FROM paiement INNER JOIN commande ON paiement.commandeRef=commande.idC";
			$liste=$db->query($sql);
			return $liste;
		
		}*/
			
		function supprimerpaiement($id){
			$db = config::getConnexion();
			$sql="DELETE FROM paiement where id= :id";
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
	        $req->execute();
	        
		}
		function modifierpaiement($paiement,$id){
			$db = config::getConnexion();
			
			$sql="UPDATE paiement SET  :commandeRef,:produit,:prix,:date,:mode WHERE id=:id";
			try{
				$req=$db->prepare($sql);
				
				
			
				$req->bindValue(':commandeRef',$paiement->getCommandeRef());
			
				$req->bindValue(':produit',$paiement->getProduit());
				$req->bindValue(':prix',$paiement->getPrix());
				$req->bindValue(':date',$paiement->getDate());
				$req->bindValue(':mode',$paiement->getMode());
	
				
				$s=$req->execute();
			}
			catch(Exception $e){
				echo("Erreur".$e->getMessage());
			}

		}
		
	}


?>
