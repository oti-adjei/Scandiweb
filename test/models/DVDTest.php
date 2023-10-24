<?php

namespace App\test\model;

use PHPUnit\Framework\TestCase;
use App\DVD;


class DVDTest extends TestCase {

    protected $testDbConnection;

    // Create an instance of the Product class
    protected $product;

    //this function is called before each test and sets up the database connection and the product object
    protected function setUp():void {
        $host = 'zhr.h.filess.io';
        $db_name = 'Georgie_tryicetrap'; 
        $username = 'Georgie_tryicetrap'; 
        $password = '068d2a6156abd6046f6826e6446f3b6b1f9c8fd1'; 

        // Create a test database connection
        $this->testDbConnection = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $this->product = new Product($this->testDbConnection);
    }
    
    public function testCreateDVD() {
        $dvd = new DVD($this->testDbConnection, 'sample_sku', 'DVD Name', 19.99, 'DVD', 20);

        $this->assertTrue($dvd->create());
    }

    public function testUpdateDVD() {
        $dvd = new DVD($this->testDbConnection, 'sample_sku4', 'DVD Name', 20.99, 'DVD', 20);

        $this->assertTrue($dvd->update());
    }

    public function testGetSize() {
        $dvd = new DVD($this->testDbConnection, 'sample_sku4', 'DVD Name', 19.99, 'DVD', 20);

        $this->assertEquals('DVD Size', $dvd->getSize());
    }
}
