<?php

require_once 'Product.php';

class Dvd extends Product
{
    // DB stuff
    protected $table = 'DVD';

    //furniture parameters
    public $size;
    public function __construct($db, $sku, $name, $price, $size)
    {
        parent::__construct($db);
        parent::setSku($sku);
        parent::setName($name);
        parent::setPrice($price);
        parent::setType($type);
        $this->size = $size;
    }
    public function getSize()
    {
        return $this->size;
    }
    public function setSize($size)
    {
        $this->size = $size;
    }
    public function get()
    {
        return $this->name . " " . $this->sku . " " . $this->price . " " . $this->type . " " . $this->size;
    }

    public function create()
    {
        if ($this->createProduct()) {
            $query = "INSERT INTO $this->table
                SET
                    sku=:sku,
                    size=:size
            ";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":sku", $this->sku);
            $stmt->bindParam(":size", $this->size);

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
                size=:size
            WHERE sku =:sku";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":sku", $this->sku);
            $stmt->bindParam(":size", $this->size);

            try {
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
           
        }
    }
}
