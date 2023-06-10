<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add New Book</title>
</head>

<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Add New Book</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>

        <!-- form section -->
        <form method="post" id="myForm">
            <!--Name input section -->
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name:">
            </div>
            <!-- sku input section -->
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="sku" id="sku" placeholder="SKU:">
            </div>
            <!-- price input section -->

            <div class="form-element my-4">
                <input type="number" step="0.01" class="form-control" name="price" id="price" placeholder="Price">
            </div>
            <!-- description input section -->
            <!-- <div class="form-element my-4">
                <textarea name="description" id="" class="form-control" placeholder="Book Description:"></textarea>
            </div> -->

            <!-- select type for porduct-->
            <div class="form-elemnt my-4">
                <select name="type" id="productType" class="form-control" placeholder="Select Type">
                    <option value="">Select Product Type:</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Book">Book</option>
                    <option value="DVD">DVD</option>
                </select>
            </div>

            <!-- dvdInput section -->
            <div class="form-elemnt my-4 d-none" id="dvdInput">
                <!-- Size -->
                <label for="validationDefault04">Size</label>
                <input type="text" class="form-control" name="size" id="size" placeholder="in Megabytes(MB):">
            </div>

            <!-- bookInput section -->
            <div class="form-elemnt my-4 d-none" id="bookInput">
                <!-- Weight -->
                <label for="validationDefault04">Weight</label>
                <input type="text" class="form-control" name="weight" id="weight" placeholder="in Kilogerams(kg):">
            </div>

            <!-- frunitureInput section -->
            <div class="form-elemnt my-4 d-none" id="furnitureInput">
                <!-- Length -->
                <label for="length">Length</label>
                <input type="text" class="form-control" name="length" id="length" placeholder="Length:">
                <!-- Width -->
                <label for="width" class="mt-2">Width</label>
                <input type="text" class="form-control" name="width" id="width" placeholder="Width:">
                <!-- Height -->
                <label for="height" class="mt-2">Height</label>
                <input type="text" class="form-control" name="height" id="height" placeholder="Height:">
            </div>


            <!-- submit button -->
            <div class="form-element my-4">
                <input type="submit" name="create" value="Add Product" class="btn btn-primary">
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
        <script src="create.js"></script>

    </div>
</body>

</html>