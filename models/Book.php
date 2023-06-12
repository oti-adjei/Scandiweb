<?php

require_once 'Product.php';

class Book extends Product
{
    // DB stuff
    protected $tables = 'Book';

    //furniture parameters
    public $weight;
    public function __construct($db, $sku, $name, $price, $type, $weight)
    {
        parent::__construct($db);
        parent::setSku($sku);
        parent::setName($name);
        parent::setPrice($price);
        parent::setType($type);
        $this->weight = $weight;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    public function get()
    {
        return $this->name . " " . $this->sku . " " . $this->price . " " . $this->type . " " . $this->weight;
    }
    public function create()
    {

        if ($this->createProduct()) {
            $query = "INSERT INTO ".$this->tables."
                SET
                    sku=:sku,
                    weight=:weight

            ";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":sku", $this->sku);
            $stmt->bindParam(":weight", $this->weight);

            try {
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    public function update()
    {
        if ($this->updateProduct()) {
            $query = "UPDATE " . $this->tables . "
            SET sku= :sku,
                weight=:weight
            WHERE sku =:sku";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":sku", $this->sku);
            $stmt->bindParam(":weight", $this->weight);

            try {
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            
        }
    }
}
