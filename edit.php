<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit Product</title>
</head>

<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Product</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="process.php" method="post">
            <?php 
            $config = require '../config/env.php';
            
            
        if (isset($_GET['sku'])) {
            

            $json_data = file_get_contents("https://scwproj.000webhostapp.com/api/read_single.php?sku=".$_GET['sku']);
            $product = json_decode($json_data, true);
            if (!empty($product)) {
                
                
        }

            
            
                include("connect.php");
                $id = $_GET['id'];
                switch ($_GET['type']) {
                    case 'Furniture':
                        $sql= "SELECT productList.*, furnitureObject.height, 
                        furnitureObject.width, furnitureObject.length
                        FROM productList 
                        INNER JOIN furnitureObject ON productList.sku = furnitureObject.sku
                        WHERE productList.sku = '$id'";
                        break;
                    case 'Book':
                        $sql= "SELECT productList.*, bookObject.weight
                        FROM productList
                        INNER JOIN bookObject ON productList.sku = bookObject.sku
                        WHERE productList.sku = '$id'";
                        break;
                    case 'DVD':
                        $sql= "SELECT productList.*, dvdObject.size
                        FROM productList
                        INNER JOIN dvdObject ON productList.sku = dvdObject.sku
                        WHERE productList.sku = '$id'";
                        break;
                    
                    default:
                        # code...
                        break;
                }
                
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="name" placeholder="Book Title:"
                    value="<?php echo $product["name"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="sku" placeholder="Author Name:"
                    value="<?php echo $product["sku"]; ?>">
            </div>
            <div class="form-element my-4">
                <textarea name="productDescription" id="" class="form-control"
                    placeholder="Book Description:"><?php echo $product["productDescription"]; ?></textarea>
            </div>
            <div class="form-elemnt my-4">
                <select name="productType" id="" class="form-control">
                    <option value="">Select Book Type:</option>
                    <option value="Furniture" <?php if($product["productType"]=="Furniture"){echo "selected";} ?>>Furniture
                    </option>
                    <option value="Book" <?php if($product["productType"]=="Book"){echo "selected";} ?>>Book</option>
                    <option value="DVD" <?php if($product["productType"]=="DVD"){echo "selected";} ?>>DVD</option>
                </select>
            </div>
            <?php
            switch ($row["productType"])  {
                
            case 'Furniture':?>
            <!-- frunitureInput section -->
            <div class="form-elemnt my-4" id="furnitureInput"
                <?php if($product["productType"]=="Furniture"){echo "selected";} ?>>
                <!-- Length -->
                <label for="length">Length</label>
                <input type="text" class="form-control" name="length" placeholder="Length:"
                    value="<?php echo $product["length"]; ?>">
                <!-- Width -->
                <label for="width" class="mt-2">Width</label>
                <input type="text" class="form-control" name="width" placeholder="Width:"
                    value="<?php echo $product["width"]; ?>">
                <!-- Height -->
                <label for="height" class="mt-2">Height</label>
                <input type="text" class="form-control" name="height" placeholder="Height:"
                    value="<?php echo $product["height"]; ?>">
            </div>
            <?php break; 
            case 'Book':?>
            <!-- bookInput section -->
            <div class="form-elemnt my-4" id="bookInput">
                <!-- Weight -->
                <label for="validationDefault04">Weight</label>
                <input type="text" class="form-control" name="weight" placeholder="in Kilogerams(kg):"
                    value="<?php if($product["productType"]=="Book"){echo "selected";} ?>">
            </div>
            <?php break; 
            case 'DVD':?>
            <!-- dvdInput section -->
            <div class="form-elemnt my-4" id="dvdInput">
                <!-- Size -->
                <label for="validationDefault04">Size</label>
                <input type="text" class="form-control" name="size" placeholder="in Megabytes(MB):"
                    value="<?php if($product["productType"]=="DVD"){echo "selected";} ?>">
            </div>
            <?php 
            break;
            default:
            # code...
            break;
            } ?>
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
                <input type="submit" name="edit" value="Edit Book" class="btn btn-primary">
            </div>
            <?php
            }else{
                echo "<h3>Book Does Not Exist</h3>";
            }
            
            ?>
        </form>
    </div>
</body>

</html>