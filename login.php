<?php 
session_start();

include "db.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    
   $sql = "SELECT * FROM users WHERE email='$email'";
   $result = mysqli_query($conn,$sql);
   $user = mysqli_fetch_assoc($result);

   if($user && password_verify($password, $user['password'])){
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];
    header("Location: dashboard.php");
    exit;
   }else{
    echo"error";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Application Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height:100vh;">

  <div class="card shadow p-4" style="width: 400px;">
    <h3 class="text-center mb-4">Login</h3>

    <form action="" method="POST">
      
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
      </div>

     
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
      </div>

      
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="remember">
          <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <a href="#" class="text-decoration-none">Forgot password?</a>
      </div>

      
      <button type="submit" class="btn btn-primary w-100">Sign in</button>

      
      <div class="text-center mt-3">
        <p>Not a member? <a href="index.php">Register</a></p>
      </div>
    </form>
  </div>

</body>
</html>
