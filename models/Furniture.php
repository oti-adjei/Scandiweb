<?php

require_once 'Product.php';

class Furniture extends Product {
    // DB stuff
    protected $table = 'Furniture';

    //furniture parameters
     public $height;
     public $width;
     public $length;

     //constructor
     public function __construct($db, $sku, $name, $price, $type, $height, $width, $length) {
         parent::__construct($db);
         
         // you can use this->setSku($sku) instead of parent::setSku($sku)
         parent::setSku($sku);
         parent::setName($name);
         parent::setPrice($price);
         parent::setType($type);
         
         $this->height = $height;
         $this->width = $width;
         $this->length = $length;
     }
     public function getHeight() {
         return $this->height;
     }
     public function setHeight($height) {
         $this->height = $height;
     }
     public function getWidth() {
         return $this->width;
     }
     public function setWidth($width) {
         $this->width = $width;
     }
     public function getLength() {
         return $this->length;
     }
     public function setLength($length) {
         $this->length = $length;
     }
     public function get() {
         return $this->name . " " . $this->sku . " " . $this->price . " " . $this->type . " " . $this->height . " " . $this->width . " " . $this->length;
     }

     public function create(){
        if ($this->createProduct()) {
            $query = "INSERT INTO ".$this->table."
                SET sku= :sku,
                    height= :height,
                    width= :width,
                    length= :length";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":sku", $this->sku);
            $stmt->bindParam(":height", $this->height);
            $stmt->bindParam(":width", $this->width);
            $stmt->bindParam(":length", $this->length);

            try {
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
     }
     public function update(){
        if ($this->updateProduct()) {
            $query = "UPDATE ".$this->tables."
            SET sku= :sku,
                height= :height,
                width= :width,
                length= :length,
            WHERE sku =:sku";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":sku", $this->sku);
        $stmt->bindParam(":height", $this->height);
        $stmt->bindParam(":width", $this->width);
        $stmt->bindParam(":length", $this->length);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            # code...
        }
     }


 }