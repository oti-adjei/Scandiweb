<?php

// if statement to check if the create button is clicked

if (isset($_POST["create"])) {
    // URL to send the POST request to
    $url = "https://scandigeorge.000webhostapp.com/api/create.php";

   // Data to send in the POST request
    $productList_arr = array(
        'sku' => $_POST["sku"],
        'name' => $_POST["name"],
        'price' => $_POST["price"],
        'type' => $_POST["type"]
        );
        json_encode($productList_arr);
      
        // Make JSON
        print_r(json_encode($productList_arr));

        header('Content-Type: application/json');
        // Initialize cURL
        $curl = curl_init();

        // Set the cURL options
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $productList_arr);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request
        $response = curl_exec($curl);

        curl_close($curl);

        if ($response === false) {
            // cURL request failed
            echo 'Error: ' . curl_error($curl);
        } else {
            // API response received
            echo 'Response: ' . $response;
        }

    }
?>