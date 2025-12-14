<?php 
session_start();
include "db.php";

if(isset($_SESSION['user_name'])){
    $username = $_SESSION['user_name'];
}else{
    $username = "Guest";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container text-center mt-5 p-5 bg-white shadow rounded" style="max-width:600px;">
    <h2 class="text-success mb-3">🎉 Thank You, <?= $username; ?>!</h2>
    <p class="lead">Your application has been submitted successfully.</p>
    <hr>
    <p>We’ll review your details and get back to you soon.</p>

    <a href="index.php" class="btn btn-primary mt-3">⬅️ Back to Registration</a>
  </div>

</body>
</html>
