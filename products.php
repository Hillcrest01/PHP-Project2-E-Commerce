<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Display</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .product-card {
      max-width: 400px;
      margin: auto;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .product-image {
      height: 250px;
      object-fit: cover;
    }
    .product-title {
      font-size: 1.5rem;
      font-weight: 600;
    }
    .availability {
      font-weight: 500;
    }
  </style>
</head>
<body class="bg-light">

  <div class="container py-5">
    <h2 class="text-center mb-4">Product Display</h2>

  </div>

</body>
</html>


<?php

include("database.php");
$sql = 'SELECT * from choice_agrovet';
$result = mysqli_query($conn, $sql);
//we then need to convert the data received from the database into an array for easy data reading.



while($row = mysqli_fetch_array($result)){
?>
<div class="card product-card">
  <img src="http://placehold.it/360x150" alt="Dummy Image" class="card-img-top product-image">
  <div class="card-body">
    <h5 class="product-title"> <?php echo $row['name'] ?> </h5>
    <p class="text-muted mb-1"> Category: <?php echo $row['category'] ?> </p>
    <p class="mb-2"> <?php echo $row['description'] ?> </p>
    <p class="fw-bold text-primary">Price: <?php echo $row['price'] ?> </p>
    <p class="availability text-success">Availability: <?php echo $row['availability'] ?></p>

    <a href="#" class="btn btn-outline-primary w-100 mb-2">Add to cart</a>

    <div class="d-flex justify-content-between">
      <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-warning w-50 me-2">Edit</a>
      <a href="delete_product.php?id=<?php echo $row['id'] ?>" class="btn btn-danger w-50">Delete</a>
    </div>
  </div>
</div>

<?php } ?>




