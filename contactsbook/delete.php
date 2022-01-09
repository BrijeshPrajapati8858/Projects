<?php

ob_start();
session_start();

require_once 'includes/db.php';
require_once 'includes/config.php';
if(empty($_SESSION['user'])){
    header('location:' .SITEURL. 'login.php');
    exit();

}

if(!empty($_GET['id']) && is_numeric($_GET['id'])) 
{
    $userId = $_SESSION['user']['id'];
    $contactId = $_GET['id'];

    $conn = db_connect();
    $cid = mysqli_real_escape_string($conn, $contactId);
    $deleteSql = "DELETE FROM `contacts` WHERE `id` ={$cid} AND `owner_id`= {$userId} ";
    if(mysqli_query($conn, $deleteSql)){
        db_close($conn);
        $_SESSION['success'] = "Contact has been deleted successfully!";
        header('location:' .SITEURL);

    }
    
     
}else{
    echo "Invalid contact ID.";
    exit();

}
?>