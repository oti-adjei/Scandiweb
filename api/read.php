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
$productList = new Product($db);

// Blog post query
$results = $productList->readProducts();
// Get row count
$nums = $results->rowCount();

// Check if any products
if ($nums > 0) {
    // Post array
    $productList_arr = array();
    // $posts_arr['data'] = array();

    while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        //not that the variables are from the field names in database and not the Product class

       //how i did it initally without adding the other tables

        // $product_item = array(
        //     'sku' => $sku,
        //     'name' => $name,
        //     'price' => $price,
        //     'productType' => $productType,
        // );
        $product_item = array(
            'sku' => $sku,
            'name' => $name,
            'price' => $price,
            'productType' => $productType
        );
        
        // Array format for varying product variables based on product type
        $typeMappings = array(
            'Book' => array('weight' => $weight),
            'DVD' => array('size' => $size),
            'Furniture' => array(
                'height' => $height,
                'length' => $length,
                'width' => $width,
            )
        );
        
        // Create typeMapping array based on product type
        $typeMapping = isset($typeMappings[$productType]) ? $typeMappings[$productType] : array();
        
        // Merge product and typeMapping arrays
        $product = array_merge($product_item, $typeMapping);

        // Push to "data"
        array_push($productList_arr, $product);
        // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($productList_arr);

} else {
    // No Posts
    echo json_encode(
        array('message' => 'No Products Found')
    );
}
