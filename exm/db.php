<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "exm";

    $conn = mysqli_connect($servername,$username,$password,$db);

    if(!$conn){
        die ("connection faild". mysqli_connect_error());
    }
    
?>