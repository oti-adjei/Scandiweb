<?php

namespace App\test\model;

use App\test\model\ProductTest;
use App\DVD;
class DVDTest extends ProductTest {
    
    public function testCreateDVD() {
        $db = parent::testDbConnection;
        $dvd = new DVD($db, 'sample_sku', 'DVD Name', 19.99, 'DVD Type', 'DVD Size');

        $this->assertTrue($dvd->create());
    }

    public function testUpdateDVD() {
        $db = parent::testDbConnection;
        $dvd = new DVD($db, 'sample_sku', 'DVD Name', 19.99, 'DVD Type', 'DVD Size');

        $this->assertTrue($dvd->update());
    }

    public function testGetSize() {
        $db = parent::testDbConnection;
        $dvd = new DVD($db, 'sample_sku', 'DVD Name', 19.99, 'DVD Type', 'DVD Size');

        $this->assertEquals('DVD Size', $dvd->getSize());
    }
}
