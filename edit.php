<?php

include("database.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM choice_agrovet WHERE id=$id ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
}


if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['productName']);
    $description  = mysqli_real_escape_string($conn, $_POST['productDescription']);
    $price = $_POST['productPrice'];
    $category = mysqli_real_escape_string($conn, $_POST['productCategory']);
    $availability = $_POST['productAvailability'];
    $id = $_POST['id'];


    $sql = "UPDATE choice_agrovet SET name='$name' , description = '$description', price = '$price' , 
            category = '$category' , availability = '$availability' , image ='' WHERE id = '$id";

    $dataInsert = mysqli_query($conn, $sql);

    if ($dataInsert) {
        echo "product added successfully";
    } else {
        die("something went wrong");
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Edit Product </title>
    <!-- Bootstrap CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Add New Product</h2>
        <form action="create_products.php" method="POST" enctype="multipart/form-data" class="shadow p-4 bg-white rounded">

            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" name="productName" value="<?php echo $row['name'] ?>" class="form-control" id="productName" required>
            </div>

            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea name="productDescription" value="<?php echo $row['description'] ?> class=" form-control" id="productDescription" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="productPrice" class="form-label">Price (KES)</label>
                <input type="number" name="productPrice" value="<?php echo $row['price'] ?> class=" form-control" id="productPrice" min="0" required>
            </div>

            <div class="mb-3">
                <label for="productImage" class="form-label">Product Image</label>
                <input type="file" name="productImage" class="form-control" id="productImage" accept="image/*">
            </div>

            <input type="hidden" name="id">

            <div class="mb-3">
                <label for="productCategory" class="form-label">Category</label>
                <select name="productCategory" class="form-select" id="productCategory" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="fashion">Fashion</option>
                    <option value="electronics">Electronics</option>
                    <option value="groceries">Groceries</option>
                    <option value="furniture">Furniture</option>
                    <option value="others">Others</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="productAvailability" class="form-label">Availability</label>
                <select name="productAvailability" class="form-select" id="productAvailability" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary w-100">Add Product</button>
        </form>
    </div>

</body>

</html>