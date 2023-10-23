<?php

namespace App\test\model;

use App\test\model\ProductTest;
use App\Book;

class BookTest extends ProductTest
{
    

    public function testCreateBook()
    {
        // Create a Book object (you can use mocks for the database).
        $db = parent::testDbConnection;
        $book = new Book($db, 'SKU123', 'Book Title', 19.99, 'Book', 2.5);

        // Call the create method.
        $this->assertTrue($book->create());
    }

    public function testUpdateBook()
    {
        // Create a Book object (you can use mocks for the database).
        $db = parent::testDbConnection;
        $book = new Book($db, 'SKU123', 'Updated Title', 24.99, 'Book', 3.0);

        // Call the update method.
        $this->assertTrue($book->update());
    }
}
