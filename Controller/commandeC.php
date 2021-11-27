<?php
	
	include_once "../../config.php";

	/**
	* 
	*/
	class commandeC
	{
		
		function afficher(){
			$db = config::getConnexion();
			$sql = "SELECT * FROM commande ";
			$liste = $db->query($sql);
			return $liste;
		}

		function ajouter($commande){
			$db = config::getConnexion();
			$sql = "INSERT INTO categrie VALUES(:nomUser,:prenomUser,:addresse,:telephone,:id_produit,:quantite,:modeLivraison,:prix_totale,:modePaiement,:mail)";
			$req = $db->prepare($sql);
			$req->bindValue(':nomUser',$commande->getNomUser());
			$req->bindValue(':prenomUser',$commande->getPrenomUser());
			$req->bindValue(':addresse',$commande->getAddresse());
			$req->bindValue(':id_produit',$commande->getId_produit());
			$req->bindValue(':quantite',$commande->getQuantite());
			$req->bindValue(':modeLivraison',$commande->getModeLivraison());
			$req->bindValue(':prix_totale',$commande->getPrix_totale());
			$req->bindValue(':modePaiement',$commande->getModePaiement());
			$req->bindValue(':mail',$commande->getMail());

			$req->execute();
		}

		function recuperer($nomUser){
			$db = config::getConnexion();
			$sql = "SELECT * FROM commande WHERE nomUser=:nomUser";
			$req=$db->prepare($sql);
			$req->bindValue(':nomUser',$nomUser);
			return $req;
		}

		
	}


?>
