<?php 
   // Headers
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
 
   include_once '../config/database.php';
   include_once '../controller/productController.php';
   include_once '../models/Furniture.php';
   include_once '../models/Book.php';
   include_once '../models/DVD.php';
 
   // Instantiate DB & connect
   $database = new Database();
   $db = $database->connect();
 
 
   // Get raw posted data
   $jsonData = file_get_contents('php://input');
   $data = json_decode($jsonData, true);
   print_r($data);

   $productType = $data['type'];
   echo("This is" . $productType ."\n");
   
   $product = new $productType($db,...$data);
   print_r( $product);
   
   print_r($product->get());
   $product->create();

//   if ($product->create()) {
//       print("It worked");
//   }
//   else {
//       print("Something went wrong");
//   }