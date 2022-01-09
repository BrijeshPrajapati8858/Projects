<?php
function db_connect(){
    $host = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "contactsbook";

    $conn = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die ("DB connection Eroors:".mysqli_connect_errors());

    return $conn;


}
function db_close($conn){
  mysqli_close($conn);
}


?> 