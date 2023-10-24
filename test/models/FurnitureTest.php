<?php

namespace App\test\model;


use App\Furniture;
use PHPUnit\Framework\TestCase;

class FurnitureTest extends TestCase {

    protected $testDbConnection;

    //this function is called before each test and sets up the database connection and the product object
    protected function setUp() :void{
        $host = 'zhr.h.filess.io';
        $db_name = 'Georgie_tryicetrap'; 
        $username = 'Georgie_tryicetrap'; 
        $password = '068d2a6156abd6046f6826e6446f3b6b1f9c8fd1'; 

        // Create a test database connection
        $this->testDbConnection = new \PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $this->furniture = new Furniture($this->testDbConnection, 'sample_sku', 'Furniture Name', 49.99, 'Furniture', 30, 40, 50);
    }

    public function testCreateFurniture() {
        $this->assertTrue($this->furniture->create());
    }

    public function testUpdateFurniture() {
    // Assuming 'existing_sku' exists in your database
    $existingFurniture = new Furniture($this->testDbConnection, 'sample_sku', 'Existing Furniture Name', 29.99, 'Furniture', 20, 30, 40);

    // Call the update method 
    $this->assertTrue($existingFurniture->update());
}


    public function testGetHeight() {
        $this->assertEquals(30, $this->furniture->getHeight());
    }

    public function testGetWidth() {
        $this->assertEquals(40, $this->furniture->getWidth());
    }

    public function testGetLength() {
        $this->assertEquals(50, $this->furniture->getLength());
    }
}
