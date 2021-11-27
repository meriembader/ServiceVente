<?php

	/**
	* 
	*/
	class paiement
	{
		public $idPaiement;
		public $id_commande;
		public $prix_totale;
		public $mode;
		
		function __construct($id_commande,$prix_totale,$mode)
		{
			$this->id_commande=$id_commande;
			$this->prix_totale=$prix_totale;
			$this->mode=$mode;
		}

		function getId_commande(){
			return $this->id_commande;
		}
		function getPrix_totale(){
			return $this->prix_totale;
		}
		function getMode(){
			return $this->mode;
		}

		function setId_commande($id_commande){
			$this->id_commande=$id_commande;
		}
		function setPrix_totale($prix_totale){
			$this->prix_totale=$prix_totale;
		}
		function setMode($mode){
			$this->mode=$mode;
		}
	}

  ?>