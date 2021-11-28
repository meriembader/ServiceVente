<?php
	
	include_once "../../../../config.php";

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
		function afficherJoinedCommande(){
			$db = config::getConnexion();
			$sql="SELECT commande.nomUser,commande.prenomUser, commande.addresse, commande.telephone, produit.nom, commande.quantite,commande.modeLivraison,commande.prix_totale,commande.modePaiement ,commande.mail  FROM commande INNER JOIN produit ON commande.id_produit=produit.idProduit";
			$liste=$db->query($sql);
			return $liste;
			
		}
			
		function supprimerCommande($idC){
			$db = config::getConnexion();
			$sql="DELETE FROM commande where idC= :idC";
			$req=$db->prepare($sql);
			$req->bindValue(':idC',$idC);
	        $req->execute();
	        
		}
		function modifierCommande($commande,$idC){
			$db = config::getConnexion();
			
			$sql="UPDATE commande SET nomUser=:nomUser,prenomUser=:prenomUser, addresse=:addresse,telephone=:telephone ,nom=:nom,quantite=:quantite, modeLivraison=:modeLivraison,prix_totale=:prix_totale,modePaiement=:modePaiement,mail=:mail WHERE idC=:idC";
			try{
				$req=$db->prepare($sql);
				
				
				$req->bindValue(':nomUser',$commande->getNomUser());
				$req->bindValue(':prenomUser',$commande->getPrenomUser());
			$req->bindValue(':addresse',$commande->getAddresse());
			$req->bindValue(':id_produit',$commande->getId_produit());
			$req->bindValue(':quantite',$commande->getQuantite());
			$req->bindValue(':modeLivraison',$commande->getModeLivraison());
			$req->bindValue(':prix_totale',$commande->getPrix_totale());
			$req->bindValue(':modePaiement',$commande->getModePaiement());
			$req->bindValue(':mail',$commande->getMail());

				
				$s=$req->execute();
			}
			catch(Exception $e){
				echo("Erreur".$e->getMessage());
			}

		}
		
	}


?>
