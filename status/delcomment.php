<?php
require_once '../db.class.php';

if(isset($_GET['id']) & !empty($_GET['id'])){
    $connect = new db();
    $id = $_GET['id'];

    $delsql="DELETE FROM `comments` WHERE id=$id";
    if(mysqli_query($connect->connect(), $delsql)){
        header("Location: /admin.php");
    }
}else{
    header('location: /admin.php');
}