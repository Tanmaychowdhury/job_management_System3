<?php
session_start();

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

    <div class="sidebar">
        <h4 class="text-center">
            <img src="../uploads/cartton1.avif" alt="Profile Photo" width="120" height="120" class="rounded-circle border">
            <br>
            Dashboard
        </h4>
        <hr class="bg-light">
        <a href="#">🏠 Home</a>
        <a href="addjobs.php"> 📄 Add Jobs</a>
        <a href="view_job.php">📋 All Jobs</a>




        <div class="dropdown">
            <a class="dropdown-toggle" href="#" id="jobsDropdown" data-bs-toggle="collapse" data-bs-target="#findJobsMenu" aria-expanded="false">
                💼 Applicants
            </a>
            <div class="collapse" id="findJobsMenu">
                <a href="admin_view_aplicants.php" class="ps-4 d-block">➡️ View Applicants</a>

            </div>
        </div>


        <a href="logout.php">🚪 Logout</a>
    </div>



    <div class="main-content">
        <div class="container">



        </div>
    </div>

</body>

</html>