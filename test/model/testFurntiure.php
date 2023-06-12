require 'Product.php';
require 'Furniture.php'; // Include the class you want to test

class FurnitureTest extends ProductTest {
    protected $db;
    protected $furniture;

    // This function is called before each test and sets up the database connection and the product object
    protected function setUp() {
        parent::setUp();
        // Create a test database connection
        $this->db = parent::testDbConnection;
        $this->furniture = new Furniture($this->db, 'sample_sku', 'Furniture Name', 49.99, 'Furniture Type', 30, 40, 50);
    }

    public function testCreateFurniture() {
        $this->assertTrue($this->furniture->create());
    }

    public function testUpdateFurniture() {
    // Assuming 'existing_sku' exists in your database
    $existingFurniture = new Furniture($this->db, 'existing_sku', 'Existing Furniture Name', 29.99, 'Existing Furniture Type', 20, 30, 40);

    // Call the update method on the existing furniture
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
