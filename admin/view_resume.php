<?php
session_start();
include "db.php";

if(isset($_GET['file'])){
    $file = $_GET['file'];
    $file_path = "../uploads/" . $file;

    if(file_exists($file_path)){
        echo'<iframe src ="'.$file_path.'" style= "width:100%;height:90%;"></iframe>';
    }else{
        echo"pdf not found";
    }
}
