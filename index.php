<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Scandiweb Offline</title>
</head>

<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between mt-4">
            <h1>Product List</h1>
            <div>
                <a href="create.php" class="btn btn-primary">ADD</a>
                <a href="" onclick ="deleteFunction()" class="btn btn-danger">MASS DELETE</a>
            </div>
        </header>

        <!-- Div for line -->
        <div class="line"></div>
        <!-- Display sesssion boxes -->
        <div class="Display-area">
        <?php
        include('connect.php');
        $sqlSelect = "SELECT * FROM productList";
        $result = mysqli_query($conn,$sqlSelect);
        while($data = mysqli_fetch_array($result))
        //  begin of php for bracket
        {
        ?>

        
        <div class="display-box">
            <div class=checkbox_sec>
                <input type="checkbox" class= "delete-checkbox" name="checkbox" value="<?php echo $data['sku']; ?>" placeholder="Check to Select">
                 <!-- assigned the sku value to variable id and the product type to variable type and passed it to edit.php -->
                <a href="edit.php?id=<?php echo $data['sku']; ?>&type=<?php echo $data['productType']; ?>" class="btn btn-outline-warning btn-sm">Edit</a>

            </div>
            <div class="content">
                <h6><?php echo $data['name']; ?></h6>
                <h6><?php echo $data['sku']; ?></h6>
                <h6><?php echo $data['price']; ?></h6>
                <h6><?php echo $data['productType']; ?></h6>
            </div>
           
            
        </div>
        
        <!-- End of php for bracket -->
        <?php
        }
        ?>
        </div>
        <script src="checkbox-delete.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
</body>

</html>

