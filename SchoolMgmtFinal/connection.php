<?php
    $hostname="localhost";
    $username="root";
    $password="";
    $dbname="schoolmanagement";
    //Creating a new connection
    $conn=new mysqli($hostname,$username,$password,$dbname);

    //Check connection if there was an error
    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }

    $sql="USE schoolmanagement";
    $result=mysqli_query($conn,$sql);
    //Closing connection
?>
