<?php
namespace App;

class Product
{
    // DB stuff
    protected $conn;
    protected $tables = 'productList';

    // Post Properties
    public $sku;
    public $name;
    public $price;
    public $type;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Getters and Setters
    public function getSku()
    {
        return $this->sku;
    }
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }

    // METHODS

    // All Products
    public function readProducts()
    {
        // Create query
        //how i did it initiallly with no other extra params
        //$query = 'SELECT * FROM ' . $this->tables . '';
        $query ='SELECT p.sku, p.name, p.price, p.productType, f.length, f.width, f.height, d.size, b.weight
              FROM ' . $this->tables . ' p
              LEFT JOIN Furniture f ON p.sku = f.sku
              LEFT JOIN DVD d ON p.sku = d.sku
              LEFT JOIN Book b ON p.sku = b.sku';

        // Prepare the query statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();
        return $stmt;
    }

    // Single Product
    public function readSingleProduct()
    {
        // Create query
        $query = 'SELECT * FROM ' . $this->tables . ' p
                                    WHERE
                                      p.sku = ?
                                    LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->sku);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Check if product is found
        if (!$row) {
            $this->sku = null;
        return; // Exit the function if product is not found
        }

        // Set properties
        $this->sku = $row['sku'];
        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->type = $row['productType'];
    }

    // Create Product so far without extra properties
    public function createProduct()
    {
        // Create query
        $query = "INSERT INTO productList
            SET sku = :sku,
                name = :name,
                price = :price,
                productType = :type";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

    

        // Bind data
        $stmt->bindParam(':sku', $this->sku);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':type', $this->type);

        // Execute query
        if ($stmt->execute()) {
            return true;
        } else {
            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);

            return false;
        }

    }

    // Update Product so far without extra properties
    public function updateProduct()
    {
        // Create query
        $query = "UPDATE " . $this->table . "
          SET sku = :sku,
              name = :name,
              price = :price,
              type = :productType;
          WHERE sku = :sku";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        // $this->sku = htmlspecialchars(strip_tags($this->sku));
        // $this->name = htmlspecialchars(strip_tags($this->name));
        // $this->price = htmlspecialchars(strip_tags($this->price));
        // $this->type = htmlspecialchars(strip_tags($this->productType));

        // Bind data
        $stmt->bindParam(':sku', $this->sku);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':productType', $this->type);

        // Execute query
        if ($stmt->execute()) {
            return true;
        } else {
            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);

            return false;
        }

    }

    // Delete Post for one product
    public function deleteProduct()
    {

        //Create query
        $query = "DELETE FROM " . $this->tables . " WHERE sku = :sku";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind data
        $stmt->bindParam(':sku', $this->sku);

        // Execute query
        if ($stmt->execute()) {
            return true;
        } else {
            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);

            return false;

        }

    }

    // Delete Post for multiple products
    public function delete($skus)
    {

        // Prepare placeholders for the SKU values
        $placeholders = rtrim(str_repeat('?,', count($skus)), ',');

        // Create the DELETE query
        $query = "DELETE FROM ".$this->tables." WHERE sku IN (".$placeholders.")";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind data
        // $stmt->bindParam(':skuList', $skuList);
        
        // Execute query with the SKUs as parameters
        if ($stmt->execute($skus)) {
            $rowCount = $stmt->rowCount();
            if ($rowCount > 0) {
                return true; // Products deleted successfully
            } else {
                return false; // No records found matching the provided SKUs
            }
        } else {
            return false; // Failed to execute the query
        }

    }

}
