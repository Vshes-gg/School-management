<?php
require('connection.php');

if (isset($_POST['submit'])) {
    $class = $_POST['class'];
    $subject = strtolower($_POST['subject']);
    $a_name = mysqli_real_escape_string($conn, $_POST['a_name']);
    $a_date = $_POST['a_date'];
    $a_desc = mysqli_real_escape_string($conn, $_POST['a_desc']);

    // File upload handling
    $fileName = $_FILES['a_file']['name'];
    $fileTempName = $_FILES['a_file']['tmp_name'];
    $fileError = $_FILES['a_file']['error'];
    $uploadDir = 'upload/';

    // Ensure directory exists and is writable
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);  // Create the directory if not exists
    }

    // Move the uploaded file
    move_uploaded_file($fileTempName, $uploadDir . $fileName);

    // SQL query
    $query = "INSERT INTO $subject (asname, asclass, asdate, asfile, asdesc) VALUES ('$a_name', '$class', '$a_date', '$fileName', '$a_desc')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data entered successfully');
              </script>";
    } else {
        error_log("Error: " . mysqli_error($conn));
        echo "Data insertion failed. Please try again.";
    }
}

// Closing connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Upload</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="assignmentstyle.css">
</head>
<body>
<form method="post" enctype="multipart/form-data">
    <div class="admin-container">
        <header>
            <h1>Assignment Upload</h1>
        </header>

        <section>
            <div class="section-header">Select Class</div>
            <select id="classSelect" name="class">
                <option value="11A">11A</option>
                <option value="11B">11B</option>
                <option value="11C">11C</option>
                <option value="11D">11D</option>
                <option value="Allof11">All from 11</option>
                <option value="12A">12A</option>
                <option value="12B">12B</option>
                <option value="12C">12C</option>
                <option value="12D">12D</option>
                <option value="Allof12">All from 12</option>
            </select>
        </section>

        <section class="form-container">
            <div class="section-header">Post Assignment</div>
            <label for="subjectSelect">Choose Subject:</label>
            <select id="subjectSelect" name="subject">
                <option value="Physics">Physics</option>
                <option value="Chemistry">Chemistry</option>
                <option value="Maths">Maths</option>
                <option value="English">English</option>
                <option value="Nepali">Nepali</option>
                <option value="Computer">Computer</option>
                <option value="Biology">Biology</option>
            </select>

            <label for="assignmentName">Assignment Name</label>
            <input type="text" id="assignmentName" placeholder="Enter Assignment Name" name="a_name" required>

            <label for="submissionDate">Submission Date</label>
            <input type="date" id="submissionDate" name="a_date" required>

            <label for="assignmentFile">Upload Assignment File (PDF, Image, etc.)</label>
            <input type="file" id="assignmentFile" accept=".pdf, .jpg, .jpeg, .png" name="a_file" required><p>

            <label for="assignmentDescription">Assignment Description</label>
            <textarea id="assignmentDescription" placeholder="Enter Assignment Description" name="a_desc"></textarea>

            <button type="submit" name="submit">Post Assignment</button>
            <a href="assignmentview.php"><button type="button" name="view">View Assignments</button></a>
    </div>
</form>
</body>
</html>