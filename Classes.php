<?php 
class Product {
        public $Name;
        public $Price;
        public $Description;
        public $Image;
        public $Brand;
        public $productID;
    

        function setID($productID){
            $this -> productID = $productID;
        }
        function setName($name) {
            $this -> Name = $name;
        }
        function setPrice($price){
            $this -> Price = $price;
        }
        function setDescription($description){
            $this -> Description = $description;
        }
        function setImage($image){
            $this -> Image = $image;
        }
        function setBrand($brand){
            $this -> Brand = $brand;
        }
        

        function getID(){
            return $this -> productID;
        }
        function getName(){
            return $this -> Name;
        }
        function getPrice(){
            return $this -> Price;
        }
        function getDescription(){
            return $this -> Description;
        }
        function getImage(){
            return $this -> Image;
        }
        function getBrand(){
            return $this -> Brand;
        }

      }
      ?>