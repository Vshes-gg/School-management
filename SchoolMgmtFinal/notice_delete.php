<?php
include('noticeconnection.php'); // Include your database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from the database
    $sql = "DELETE FROM notices WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: noticeforadmin.php'); // Redirect back to admin panel
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
