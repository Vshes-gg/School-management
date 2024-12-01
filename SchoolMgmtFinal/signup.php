<?php
require ('connection.php');

if (isset($_POST['submit'])) {
    // Sanitize and validate user input
    $stdname = mysqli_real_escape_string($conn, $_POST['stdname']);
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = $_POST['pwd']; // Password will be hashed
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $rollno = (int)$_POST['rollno']; // Ensure roll number is an integer
    $subject = strtolower(mysqli_real_escape_string($conn, $_POST['subject']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Validate email
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $gender= mysqli_real_escape_string($conn, $_POST['gender']);
    $phone=$_POST['phone'];

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Create the SQL query
    $sql = "INSERT INTO studentinfo (sname, sunm, spw, class, rollno, sub, email, adrs, gender, phone) 
            VALUES ('$stdname', '$username', '$hashedPassword', '$class', $rollno, '$subject', '$email', '$address', '$gender', '$phone')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data Inserted Successfully')</script>";
    } else {
        echo "Data insertion failed: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>