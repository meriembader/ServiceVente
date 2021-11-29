<?php

          include_once "../../config.php";

	/**
	* 
	*/
	class produitC
	{
		
		function ajouter($produit){
			$db = config::getConnexion();
			$sql = "INSERT INTO produit (?,?,?,?,?,?,?) VALUES (:reference,:nom,:prix,:chemin_img,:quantite_total,:description,:status)";
			try {
				$req = $db->prepare($sql);
			$req->bindValue(':reference',$produit->getReference());
			$req->bindValue(':nom',$produit->getNom());
			$req->bindValue(':quantite_total',$produit->getQuantite_total());
			$req->bindValue(':prix',$produit->getPrix());
			$req->bindValue(':description',$produit->getDescription());
			$req->bindValue(':chemin_img',$produit->getChemin_img());
			$req->bindValue(':status',$produit->getStatus());
			$req->execute();
		}
		catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			

		}


		function afficherproduit(){
			$db = config::getConnexion();
			$sql="SELECT * FROM produit ";
			$liste=$db->query($sql);
			return $liste;
			
		}

		function supprimerproduit($reference){
			$db = config::getConnexion();
			$sql="DELETE FROM produit where reference= :reference";
			$req=$db->prepare($sql);
			$req->bindValue(':reference',$reference);
	        $req->execute();
	        
		}

	

		function recuperer_produit($reference){
			
			$sql="SELECT * FROM produit WHERE reference=$reference";
			$db = config::getConnexion();
			try{
				$req=$db->prepare($sql);
				$req->execute();
				
				$produit = $req->fetch();
				return $produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

	}

  ?>