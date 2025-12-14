<?php 
session_start();
include "db.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id =$_POST['id'];
    $old = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from jobs WHERE id = '$id'"));
    $job_title = $_POST['job_title'];
    $company_name = $_POST['company_name'];
    $location = $_POST['location'];
    $job_type = $_POST['job_type'];
    $salary = $_POST['salary'];
    $experience = $_POST['experience'];
    $qualification = $_POST['qualification'];
    $skills = $_POST['skills'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];


    $job_image = $_FILES['job_image']['name'];
    $job_tmp = $_FILES['job_image']['tmp_name'];
    $ext = strtolower(pathinfo($job_image, PATHINFO_EXTENSION));
    $allowed = ['png', 'jpeg', 'jpg'];

    if (in_array($ext, $allowed)) {
        $folder = "../uploads/";
        $job_path = $folder . basename($job_image);
        move_uploaded_file($job_tmp, $job_path);
    } else {
        $job_image = $old['job_image'];
    }
    $sql = "UPDATE jobs SET 
          job_title = '$job_title',
          company_name = '$company_name',
          location = '$location',
          job_type = '$job_type',
          salary = '$salary',
          experience = '$experience',
          qualification = '$qualification',
          skills = '$skills',
          description = '$description',
          deadline = '$deadline',
          job_image = '$job_image',
          status = '$status'
        WHERE id = '$id'";

      if (mysqli_query($conn, $sql)) {
        echo "<script>
        alert('✅ Job updated successfully!');
        window.location.href='view_job.php';
        </script>";
    } else {
        echo "❌ Error updating job!";
    } 
    
    
    }







?>