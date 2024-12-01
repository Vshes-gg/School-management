<?php
require ('connection.php');
$sql = "SELECT * FROM studentinfo";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Student Records</title>
    <link rel="stylesheet" href="assignmentstyle.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        button {
            padding: 5px 10px;
            background: #ff4d4d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #d63030;
        }
    </style>
</head>
<body>
<div class="profile-container">
        <center><h2>Student Records</h2></center>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Class</th>
                <th>Roll No</th>
                <th>Subject</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['sid'] ?></td>
                    <td><?= $row['sname'] ?></td>
                    <td><?= $row['class'] ?></td>
                    <td><?= $row['rollno'] ?></td>
                    <td><?= $row['sub'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td>
                        <form action="delete.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $row['sid'] ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>