<?php
session_start();
include "db.php";


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = intval($_SESSION['user_id']);


$sql = "SELECT resume FROM users WHERE id = $user_id LIMIT 1";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

if (empty($user['resume'])) {
    echo "<h3 style='color:red; text-align:center; margin-top:100px;'>resume not uploaded</h3>";
    exit;
}

$resume = $user['resume'];

?>
<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="utf-8">
    <title>My Resume</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="dashboard.php" class="text-decoration-none fw-bold text-primary">← Back</a>
            <h3 class="text-primary m-0">My Resume</h3>
        </div>
        <div class="card shadow-sm p-4">
            <div class="d-flex justify-content-center">
                <iframe
                    src="uploads/<?= ($resume); ?>"
                    width="60%"
                    height="500"
                    class="border rounded shadow-sm">
                </iframe>
            </div>

            <div class="text-center mt-3">
                <a href="uploads/<?= ($resume); ?>" download class="btn btn-primary">
                    Download Resume
                </a>
            </div>




        </div>
    </div>

</body>

</html>