<?php

	/**
	* 
	*/
	class commande
	{
		private $idC;
		private $nomUser;
		private $prenomUser;
		private $addresse;
		private $telephone;
		private $id_produit;
		private $quantite;
		private $modeLivraison;
		private $prix_totale;
		private $modePaiement;
		private $mail;


		function __construct($nomUser,$prenomUser,$addresse,$telephone,$id_produit,$quantite,$modeLivraison,$prix_totale,$modePaiement,$mail)
		{
			
			$this->nomUser=$nomUser;
			$this->prenomUser=$prenomUser;
			$this->addresse=$addresse;
			$this->telephone=$telephone;
			$this->id_produit=$id_produit;
			$this->quantite=$quantite;
			$this->modeLivraison=$modeLivraison;
			$this->prix_totale=$prix_totale;
			$this->modePaiement=$modePaiement;
			$this->mail=$mail;

		}

	/*	function getIdC(){
			return $this->idC;
		}*/
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
		function getPrix_totale(){
			return $this->prix_totale;
		}
		function getModePaiement(){
			return $this->modePaiement;
		}
		function getMail(){
			return $this->mail;
		}



		/*function setIdC($idC){
			$this->idC=$idC;
		}*/
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
		function setPrix_totale($prix_totale){
			$this->prix_totale=$prix_totale;
		}
		function setModePaiement($modePaiement){
			$this->modePaiement=$modePaiement;
		}

		function setMail($mail){
			$this->mail=$mail;
		}
	
	}
	

  ?>
