use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    protected $testDbConnection;

    // Create an instance of the Product class
    protected $product;

    //this function is called before each test and sets up the database connection and the product object
    protected function setUp() {
        $host = 'zhr.h.filess.io';
        $db_name = 'Georgie_tryicetrap'; 
        $username = 'Georgie_tryicetrap'; 
        $password = '068d2a6156abd6046f6826e6446f3b6b1f9c8fd1'; 

        // Create a test database connection
        $this->testDbConnection = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $this->product = new Product($this->testDbConnection);
    }
    
    public function testGettersAndSetters()
    {
        $this->product->setSku('SKU123');
        $this->product->setName('Product Name');
        $this->product->setPrice(10.99);
        $this->product->setType('Product Type');

        $this->assertEquals('SKU123', $this->product->getSku());
        $this->assertEquals('Product Name', $this->product->getName());
        $this->assertEquals(10.99, $this->product->getPrice());
        $this->assertEquals('Product Type', $this->product->getType());
    }

    public function testCreateProduct()
    {
        // Create a product
        $this->product->setSku('SKU123');
        $this->product->setName('Product Name');
        $this->product->setPrice(10.99);
        $this->product->setType('Product Type');

        $result = $this->product->createProduct();

        // Assert that the product was created successfully
        $this->assertTrue($result);
    }

    public function testReadProducts()
    {
        // Perform the test database setup here
        // Insert sample data into the database for testing
        // Call the readProducts method
        $result = $this->product->readProducts();

        // Assert that the result is not empty or specific product details
        $this->assertNotEmpty($result);
        // You can add more specific assertions based on your database setup
    }

    public function testReadSingleProduct()
    {
        // Perform the test database setup here
        // Insert a specific product into the database for testing
        // Set the SKU of the product to be read
        $this->product->setSku('SKU123');

        // Call the readSingleProduct method
        $this->product->readSingleProduct();

        // Assert that the product properties have been set correctly
        $this->assertEquals('SKU123', $this->product->getSku());
        $this->assertEquals('Product Name', $this->product->getName());
        $this->assertEquals(10.99, $this->product->getPrice());
        $this->assertEquals('Product Type', $this->product->getType());
    }

    public function testUpdateProduct()
    {
        // Perform the test database setup here
        // Insert a product into the database for testing
        // Set the SKU of the product to be updated
        $this->product->setSku('SKU123');

        // Update the product properties
        $this->product->setName('Updated Product Name');
        $this->product->setPrice(15.99);
        $this->product->setType('Updated Product Type');

        // Call the updateProduct method
        $result = $this->product->updateProduct();

        // Assert that the product was updated successfully
        $this->assertTrue($result);
    }

    public function testDeleteProduct()
    {
        // Perform the test database setup here
        // Insert a specific product into the database for testing
        // Set the SKU of the product to be deleted
        $this->product->setSku('SKU123');

        // Call the deleteProduct method
        $result = $this->product->deleteProduct();

        // Assert that the product was deleted successfully
        $this->assertTrue($result);
    }

    public function testDelete()
    {
        // Perform the test database setup here
        // Insert multiple products into the database for testing
        // Set an array of SKUs to be deleted
        $skus = ['SKU123', 'SKU124', 'SKU125'];

        // Call the delete method
        $result = $this->product->delete($skus);

        // Assert that the products were deleted successfully
        $this->assertTrue($result);
    }

    // ... (other methods and teardown code)
}
