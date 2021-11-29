
<?php
	/**
	* 
	*/
	class Produit
	{
		private $id;
		private $name;
		private $desc;
		private $price;
		private $rrp;
		private $quatity;
		private $image;
	
		
		function __construct($name,$desc,$price,$rrp,$quatity,$image)
		{
			$this->name=$name;
			$this->desc=$desc;
			$this->price=$price;
			$this->rrp=$rrp;
			$this->quatity=$quatity;
			$this->image=$image;
		
			
		}

		function getName(){
			return $this->name;
		}
		function getDesc(){
			return $this->desc;
		}
		function getPrice(){
			return $this->price;
		}
		function getrrp(){
			return $this->rrp;
		}
		function getQuatity(){
			return $this->quatity;
		}
		function getImage(){
			return $this->image;
		}
	
		function setName($name){
			$this->name=$name;
		}
		function setDesc($desc){
			$this->desc=$desc;
		}
		function setPrice($price){
			$this->price=$price;
		}
		function setrrp($rrp){
			$this->rrp=$rrp;
		}
		function setQuatity($quatity){
			$this->quatity=$quatity;
		}
		
		function setImage($image){
			$this->image=$image;
		}
		
	}

  ?>
