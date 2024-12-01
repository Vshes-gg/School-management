<?php
include('noticeconnection.php'); // Include your database connection

// Check if the form is submitted
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Update file if uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $fileName = basename($_FILES['file']['name']);
        $filePath = 'uploads/' . $fileName;
        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
        $sql = "UPDATE notices SET title='$title', description='$description', file_path='$filePath' WHERE id='$id'";
    } else {
        $sql = "UPDATE notices SET title='$title', description='$description' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: noticeforadmin.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Check if ID is passed via URL and fetch the notice
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM notices WHERE id=$id");
    $row = $result->fetch_assoc();
} else {
    header('Location: noticeforadmin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Notice</title>
    <link rel="stylesheet" href="css/editnoticecss.css">
</head>
<body>
    <h2>Edit Notice</h2> <br>
    <form action="notice_edit.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div>
            <label>Title</label>
            <input type="text" name="title" value="<?php echo $row['title']; ?>">
        </div>
        <div>
            <label>Description</label>
            <textarea name="description"><?php echo $row['description']; ?></textarea>
        </div>
        <div>
            <label>Upload New File</label>
            <input type="file" name="file">
        </div>
        <button type="submit" name="update">Update Notice</button>
    </form>
</body>
</html>
