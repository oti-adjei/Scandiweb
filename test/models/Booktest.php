<?php

namespace App\test\model;

use App\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
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

    public function testCreateBook()
    {
        // Create a Book object 
        
        $book = new Book($this->testDbConnection, 'SKU123', 'Book Title', 19.99, 'Book', 2.5);

        // Call the create method.
        $this->assertTrue($book->create());
    }

    public function testUpdateBook()
    {
        // Create a Book object 
        $book = new Book($this->testDbConnection, 'SKU123', 'Updated Title', 24.99, 'Book', 3.0);

        // Call the update method.
        $this->assertTrue($book->update());
    }
}
