<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


$user_id = $_SESSION['user_id'];

// Apply বোতাম থেকে job id আসবে
if (isset($_GET['id'])) {
    $job_id = $_GET['id'];


    $applied_at = date('Y-m-d H:i:s');

    $sql = "INSERT INTO applications (user_id, job_id, applied_at) 
            VALUES ('$user_id', '$job_id', '$applied_at')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Job applied successfully!'); window.location='applyjobs.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid job.";
}
