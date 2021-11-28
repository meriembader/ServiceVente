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
			$sql = "INSERT INTO paiement VALUES(:id_commande,:prix_totale,:mode)";
			$req = $db->prepare($sql);
			
			$req->bindValue(':id_commande',$paiement->getid_commande());
			
			$req->bindValue(':prix_totale',$paiement->getPrix_totale());
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
		function afficherJoinedpaiement(){
			$db = config::getConnexion();
			$sql="SELECT commande.reference,paiement.prix_totale,paiement.mode   FROM paiement INNER JOIN commande ON paiement.id_commande=commande.idC";
			$liste=$db->query($sql);
			return $liste;
		
		}
			
		function supprimerpaiement($idPaiement){
			$db = config::getConnexion();
			$sql="DELETE FROM paiement where idPaiement= :idPaiement";
			$req=$db->prepare($sql);
			$req->bindValue(':idPaiement',$idPaiement);
	        $req->execute();
	        
		}
		function modifierpaiement($paiement,$idPaiement){
			$db = config::getConnexion();
			
			$sql="UPDATE paiement SET  id_commande=:id_command ,prix_totale=:prix_totale,mode=:mode WHERE idPaiement=:idPaiement";
			try{
				$req=$db->prepare($sql);
				
				
			
			$req->bindValue(':id_commande',$paiement->getid_commande());
		
			$req->bindValue(':prix_totale',$paiement->getPrix_totale());
			$req->bindValue(':mode',$paiement->getmode());
	
				
				$s=$req->execute();
			}
			catch(Exception $e){
				echo("Erreur".$e->getMessage());
			}

		}
		
	}


?>
