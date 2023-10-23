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

// Get post
$product->readSingleProduct();

// Check if product exists
if (!$product->sku) {
  // Product not found
  $response = array('message' => 'Product not found');
  echo json_encode($response);
  return;
}

// Create array
$post_arr = array(
  'sku' => $product->sku,
  'name' => $product->name,
  'price' => $product->price,
  'productType' => $product->type
);

// Make JSON
echo json_encode($post_arr);
