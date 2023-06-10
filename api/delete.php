<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../models/Product.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$product = new Product($db);

$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

// Access the SKUs array
$skus = $data['skus'];
print_r($skus);


// Delete products
if ($product->delete($skus)) {
    // Product deleted successfully
    $response = array('message' => 'Product deleted successfully');
} else {
    // Failed to delete products
    $response = array('message' => 'Failed to delete product');
}

// Return the response as JSON
echo json_encode($response);




// Use the $skus array as needed
// $skusString = "'" . implode(",", $skus) . "'";
// echo $skuString;


