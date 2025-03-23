<?php 
class Product {
        public $Name;
        public $Price;
        public $Description;
        public $Image;
        public $Brand;
        public $productID;
        public $category;
        public $prodOptionID;
    
        function setProdOption($prodOptionID){
            $this -> prodOptionID = $prodOptionID;
        }
        function setID($productID){
            $this -> productID = $productID;
        }
        function setCategory($category){
            $this -> Category = $category;
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
        

        function getProdOption(){
            return $this -> prodOptionID;
        }
        function getID(){
            return $this -> productID;
        }
        function getCategory(){
            return $this -> category;
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