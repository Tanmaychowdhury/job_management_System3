<?php
session_start();
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $language = $_POST['language'];

    $password = $_POST['password'];
    $conform_password = $_POST['conform_password'];

    if ($password !== $conform_password) {
        echo "password do not match";
        exit;
    }

    if(!preg_match("/^[0-9]{10}$/", $phone)){
        echo"pleaseb enter valid phone number";
        exit;
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);


    $photo_name = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $folder = "uploads/";
    $photo_path = $folder . basename($photo_name);

    move_uploaded_file($photo_tmp, $photo_path);

    $resume_name = $_FILES['resume']['name'];
    $resume_tmp = $_FILES['resume']['tmp_name'];
    $folder = "uploads/";
    $resume_path = $folder  .  basename($resume_name);

    move_uploaded_file($resume_tmp, $resume_path);

    if (empty($photo_name) || empty($resume_name)){
        echo"please upload both files";
        exit;
    }
    


    $sql = "INSERT INTO users(name,email,phone,dob,gender,country,state,language,password,photo,resume)
      VALUES('$name','$email','$phone','$dob','$gender','$country','$state','$language','$password_hash','$photo_name','$resume_name')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['user_name'] = $name;
        header("Location: thankyou.php");
    } else {
        echo "error";
    }
}
