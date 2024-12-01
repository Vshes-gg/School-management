<?php
include('noticeconnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Ensure the uploads directory exists
    $uploadDirectory = 'uploads/';
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    $filePath = '';
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $fileName = basename($_FILES['file']['name']);
        $filePath = $uploadDirectory . $fileName;

        // Check if file upload was successful
        if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
            echo "File uploaded successfully!";
        } else {
            echo "File upload failed.";
        }
    }

    // Save file path to the database
    $sql = "INSERT INTO notices (title, description, file_path) VALUES ('$title', '$description', '$filePath')";
    if ($conn->query($sql) === TRUE) {
        header('Location: noticeforadmin.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
