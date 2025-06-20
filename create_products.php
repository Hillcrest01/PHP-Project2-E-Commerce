<?php

include("database.php");

//We check if the data has been submitted via the form.
if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($conn, $_POST['productName']);
  $description  = mysqli_real_escape_string($conn, $_POST['productDescription']);
  $price = $_POST['productPrice'];
  $category = mysqli_real_escape_string($conn, $_POST['productCategory']);
  $availability = $_POST['productAvailability'];


  $sql = "INSERT INTO choice_agrovet (name, description, price, imageURL, availability, category)
            VALUES('$name' , '$description' , '$price' , '' , '$availability', '$category')";
}
$dataInsert = mysqli_query($conn, $sql);

if($dataInsert){
  echo "product added successfully";
} else{
die("something went wrong");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Product</title>
  <!-- Bootstrap CDN for styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-5">
    <h2 class="text-center mb-4">Add New Product</h2>
    <form action="create_products.php" method="POST" enctype="multipart/form-data" class="shadow p-4 bg-white rounded">

      <div class="mb-3">
        <label for="productName" class="form-label">Product Name</label>
        <input type="text" name="productName" class="form-control" id="productName" required>
      </div>

      <div class="mb-3">
        <label for="productDescription" class="form-label">Description</label>
        <textarea name="productDescription" class="form-control" id="productDescription" rows="3" required></textarea>
      </div>

      <div class="mb-3">
        <label for="productPrice" class="form-label">Price (KES)</label>
        <input type="number" name="productPrice" class="form-control" id="productPrice" min="0" required>
      </div>

      <div class="mb-3">
        <label for="productImage" class="form-label">Product Image</label>
        <input type="file" name="productImage" class="form-control" id="productImage" accept="image/*" >
      </div>

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
