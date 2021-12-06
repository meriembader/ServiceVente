<?php
	
	class config {
		private static $pdo = NULL;
	
		public static function getConnexion() {
		  if (!isset(self::$pdo)) {
			try{
			  self::$pdo = new PDO('mysql:host=localhost;dbname=ventebd', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
			  
			}catch(Exception $e){
			  die('Erreur: '.$e->getMessage());
			}
		  }
		  return self::$pdo;
		}
	  }
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
			$sql = "INSERT INTO commande VALUES(:nomUser,:prenomUser,:addresse,:telephone,:id_produit,:quantite,:modeLivraison,:modePaiement,:mail,:status)";
			$req = $db->prepare($sql);
			$req->bindValue(':nomUser',$commande->getNomUser());
		
			$req->bindValue(':prenomUser',$commande->getPrenomUser());
			$req->bindValue(':addresse',$commande->getAddresse());
			$req->bindValue(':id_produit',$commande->getId_produit());
			$req->bindValue(':quantite',$commande->getQuantite());
			$req->bindValue(':modeLivraison',$commande->getModeLivraison());
			$req->bindValue(':modePaiement',$commande->getModePaiement());
			$req->bindValue(':mail',$commande->getMail());
			$req->bindValue(':status',$commande->getStatus());


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
			$sql="SELECT commande.nomUser,commande.prenomUser, commande.addresse, commande.telephone, products.name, commande.quantite,commande.modeLivraison,commande.modePaiement ,commande.mail  FROM commande INNER JOIN products ON commande.id_produit=products.id";
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
			
			$sql="UPDATE commande SET nomUser=:nomUser,prenomUser=:prenomUser, addresse=:addresse,telephone=:telephone ,nom=:nom,quantite=:quantite, modeLivraison=:modeLivraison,modePaiement=:modePaiement,mail=:mail WHERE idC=:idC";
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
