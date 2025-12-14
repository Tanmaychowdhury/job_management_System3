<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['user_name'];
$sql = "SELECT * FROM users WHERE name = '$username'";

$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #0d6efd;
            color: white;
            padding-top: 30px;
            position: fixed;
            width: 220px;
        }
        .sidebar .active {
  background-color: #ffffff33;
  border-radius: 8px;
}

.sidebar a:hover {
  transform: scale(1.05);
  transition: 0.3s;
}
img {
  border: 3px solid #007bff;
  box-shadow: 0 0 8px rgba(0,0,0,0.1);
}


        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }

        .sidebar a:hover {
            background-color: #084298;
            border-radius: 4px;
        }

        .main-content {
            margin-left: 230px;
            padding: 30px;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }
        #findJobsMenu a {
    font-size: 15px;
    padding: 8px 20px;
    color: #f8f9fa;
}
#findJobsMenu a:hover {
    background-color: #0b5ed7;
    border-radius: 4px;
}

    </style>
</head>

<body>

    <!-- Sidebar -->
 
<div class="sidebar">
    <h4 class="text-center">
        <img src="uploads/<?= $user['photo']; ?>" alt="Profile Photo" width="80" height="80" class="rounded-circle border">
        <br>
        Dashboard
    </h4>
    <hr class="bg-light">

    <a href="#">🏠 Home</a>
    <a href="my_resume.php">📄 My Resume</a>

    <!-- Dropdown for Find Jobs -->
    <div class="dropdown">
        <a class="dropdown-toggle" href="#" id="jobsDropdown" data-bs-toggle="collapse" data-bs-target="#findJobsMenu" aria-expanded="false">
            💼 Find Jobs
        </a>
        <div class="collapse" id="findJobsMenu">
            <a href="applyjobs.php" class="ps-4 d-block">➡️ Apply Jobs</a>
            <a href="view_jobs.php" class="ps-4 d-block">👀 View Jobs</a>
        </div>
    </div>

    <a href="logout.php">🚪 Logout</a>
</div>


    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h3 class="mb-4">Welcome, <?= $user['name']; ?> 👋</h3>

            <div class="card shadow-sm p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center">
                        <img src="uploads/<?= $user['photo']; ?>" alt="User Photo" class="profile-img mb-3">
                    </div>
                    <div class="col-md-9">
                        <h5><b>Name:</b> <?= $user['name']; ?></h5>
                        <p><b>Email:</b> <?= $user['email']; ?></p>
                        <p><b>Phone:</b> <?= $user['phone']; ?></p>
                        <p><b>Gender:</b> <?= $user['gender']; ?></p>
                        <p><b>Country:</b> <?= $user['country']; ?></p>
                        <p><b>State:</b> <?= $user['state']; ?></p>
                        <p><b>Language:</b> <?= $user['language']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>