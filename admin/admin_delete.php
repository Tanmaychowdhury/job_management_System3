<?php 
session_start();
include "db.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$sql = "DELETE FROM jobs WHERE id = '$id'";

if(mysqli_query($conn,$sql)){
    echo"<script>alert('✅job item delete sucsessfully!');
    window.location.href = 'view_job.php';
    </script>";
}else{
    echo"❌delete unsucsessfull!";
}

?>