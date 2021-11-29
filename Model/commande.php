<?php

	/**
	* 
	*/
	class commande
	{
		public $idC;
		private $nomUser;
		private $prenomUser;
		private $addresse;
		private $telephone;
		private $id_produit;
		private $quantite;
		private $modeLivraison;
		private $modePaiement;
		private $mail;
		private $status;



		function __construct($nomUser,$prenomUser,$addresse,$telephone,$id_produit,$quantite,$modeLivraison,$prix_totale,$modePaiement,$mail,$status)
		{
	
			$this->nomUser=$nomUser;
			$this->prenomUser=$prenomUser;
			$this->addresse=$addresse;
			$this->telephone=$telephone;
			$this->id_produit=$id_produit;
			$this->quantite=$quantite;
			$this->modeLivraison=$modeLivraison;
		
			$this->modePaiement=$modePaiement;
			$this->mail=$mail;
			$this->status=$status;

		}

	
		function getNomUser(){
			return $this->nomUser;
		}
		function getPrenomUser(){
			return $this->prenomUser;
		}

		function getAddresse(){
			return $this->addresse;
		}

		function getId_produit(){
			return $this->id_produit;
		}
		function getQuantite(){
			return $this->quantite;
		}
		function getModeLivraison(){
			return $this->modeLivraison;
		}
	
		function getModePaiement(){
			return $this->modePaiement;
		}
		function getMail(){
			return $this->mail;
		}

		function getStatus(){
			return $this->status;
		}



		
		function setNomUser($nomUser){
			$this->nomUser=$nomUser;
		}
		function setPrenomUser($prenomUser){
			$this->prenomUser=$prenomUser;
		}
	
		function setAddresse($addresse){
			$this->addresse=$addresse;
		}
	
		function setId_produit($id_produit){
			$this->id_produit=$id_produit;
		}
	
		function setQuantite($quantite){
			$this->quantite=$quantite;
		}
	
		function setModeLivraison($modeLivraison){
			$this->modeLivraison=$modeLivraison;
		}
		
		function setModePaiement($modePaiement){
			$this->modePaiement=$modePaiement;
		}

		function setMail($mail){
			$this->mail=$mail;
		}
		function setStatus($status){
			$this->status=$status;
		}
	
	}
	

  ?>
