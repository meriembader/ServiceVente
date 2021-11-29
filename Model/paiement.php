<?php

	/**
	* 
	*/
	class paiement
	{
		private $id;
		private $commandeRef;
		private $produit;
		private $prix;
		private $date;
		private $mode;
		
		function __construct($id,$commandeRef,$produit,$prix,$date,$mode)
		{
			$this->id=$id;
			$this->commandeRef=$commandeRef;
			$this->produit=$produit;
			$this->prix=$prix;
			$this->date=$date;
			$this->mode=$mode;
		}

		function getId(){
			return $this->id;
		}
		function getCommandeRef(){
			return $this->commandeRef;
		}
		function getProduit(){
			return $this->produit;
		}
		function getPrix(){
			return $this->prix;
		}
		function getDate(){
			return $this->date;
		}

		function getMode(){
			return $this->mode;
		}

		function setId($id){
			$this->id=$id;
		}
		function setCommandeRef($commandeRef){
			$this->commandeRef=$commandeRef;
		}
		function setProduit($produit){
			$this->produit=$produit;
		}
		function setPrix($prix){
			$this->prix=$prix;
		}
		function setDate($date){
			$this->date=$date;
		}
	
		function setMode($mode){
			$this->mode=$mode;
		}
	}

  ?>