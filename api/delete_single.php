<?php 
namespace App\api;
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

  // Get ID
$product->sku = isset($_GET['sku']) ? $_GET['sku'] : die(json_encode(array('error' => 'No SKU provided')));

$product->readSingleProduct();

// Check if product exists
if (!$product->sku) {
  // Product not found
  $response = array('message' => 'Product not found');
  echo json_encode($response);
  return;
}

// Delete product
if ($product->deleteProduct()) {
  // Product deleted successfully
  $response = array('message' => 'Product deleted successfully');
  echo json_encode($response);
} else {
  // Failed to delete product
  $response = array('message' => 'Failed to delete product');
  echo json_encode($response);
}

