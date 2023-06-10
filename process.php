<?php
require_once "connect.php";
// if statement to check if the create button is clicked

if (isset($_POST["create"])) {
    // store the incoming data in variables
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $sku = mysqli_real_escape_string($conn, $_POST["sku"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $type = mysqli_real_escape_string($conn, $_POST["productType"]);
    
    // sql query to insert data into productList tqble in database
    
    $sqlInsert = "INSERT INTO productList(sku , name , price , productDescription, productType) VALUES ('$sku','$name','$price','$description','$type')";

    //swtich statement to check the type of product and insert the data into the appropriate table

    switch ($type) {
        case 'Furniture':
            $length= mysqli_real_escape_string($conn, $_POST["length"]);
            $width= mysqli_real_escape_string($conn, $_POST["width"]);
            $height= mysqli_real_escape_string($conn, $_POST["height"]);
            $productTypeInsert = "INSERT INTO furnitureObject (sku, length, width, height) VALUES ('$sku', '$length', '$width', '$height')";            
            break;
        case 'Book':
            $weight= mysqli_real_escape_string($conn, $_POST["weight"]);
            $productTypeInsert = "INSERT INTO bookObject (sku, weight) VALUES ('$sku', '$weight')";
            break;
        case 'DVD':
            $size= mysqli_real_escape_string($conn, $_POST["size"]);
            $productTypeInsert = "INSERT INTO dvdObject (sku, size) VALUES ('$sku', '$size')";
            break;
        
        default:
            # code...
            break;
    }

    // if statement to check if the queries are successful
    
    if(mysqli_query($conn,$sqlInsert) ){
        if (mysqli_query($conn,$productTypeInsert)) {
            session_start();
        $_SESSION["create"] = "Product Added Successfully!";
        header("Location:index.php");
        }else{
            die("Something went wrong");
        }
    }else{
        die("Something went wrong");
    }
}


// if statement to check if the edit button is clicked

if (isset($_POST["edit"])) {
    // store the incoming data in variables
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $sku = mysqli_real_escape_string($conn, $_POST["sku"]);
    $description = mysqli_real_escape_string($conn, $_POST["productDescription"]);
    $type = mysqli_real_escape_string($conn, $_POST["productType"]);


    // sql query to insert data into database
    switch ($type) {
        case 'Furniture':
            $length = mysqli_real_escape_string($conn, $_POST["length"]);
            $width = mysqli_real_escape_string($conn, $_POST["width"]);
            $height = mysqli_real_escape_string($conn, $_POST["height"]);
            $sqlUpdate ="UPDATE productList INNER JOIN furnitureObject ON productList.sku = furnitureObject.sku
            SET productList.name = '$name',
            productList.sku = '$sku',
            productList.productDescription = '$description',
            productList.productType = '$type', 
            furnitureObject.height = '$height', 
            furnitureObject.width = '$width', 
            furnitureObject.length = '$length'
            WHERE productList.sku = '$sku'";
            break;
        case 'Book':
            $weight = mysqli_real_escape_string($conn, $_POST["weight"]);
            $sqlUpdate ="UPDATE productList INNER JOIN bookObject ON productList.sku = bookObject.sku
            SET productList.name = '$name',
            productList.sku = '$sku',
            productList.productDescription = '$description',
            productList.productType = '$type', 
            bookObject.weight = '$weight'
            WHERE productList.sku = '$sku'";
            break;
        case 'DVD':
            $size = mysqli_real_escape_string($conn, $_POST["size"]);
            $sqlUpdate ="UPDATE productList INNER JOIN dvdObject ON productList.sku = dvdObject.sku
            SET productList.name = '$name',
            productList.sku = '$sku',
            productList.productDescription = '$description',
            productList.productType = '$type', 
            dvdObject.size = '$size'
            WHERE productList.sku = '$sku'";
            break;
        
        default:
            # code...
            break;
    }

    // if statement to check if the queries are successful

    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "Book Updated Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }
}
?>