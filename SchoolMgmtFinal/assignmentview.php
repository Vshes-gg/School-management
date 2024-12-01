<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment View</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="assignmentstyle.css">
</head>
<body>
<form method="post">
    <div class="admin-container">
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
                <option value="Math">Math</option>
                <option value="English">English</option>
                <option value="Nepali">Nepali</option>
                <option value="Computer">Computer</option>
                <option value="Biology">Biology</option>
            </select>
            <button type="submit" name="select">Select</button>
    </section>
</div>
<section>
    <div class="admin-container">
            <div class="section-header">Assignments Posted</div>
            <table class="assignment-table">
                <thead>
                <tr>
                    <th>Assignment Name</th>
                    <th>File</th>
                    <th>Upload Date</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody id="assignmentTableBody">
<?php
    require('connection.php');

   if(isset($_POST['select'])){

        //Selecting class and subject
        $asclass = $_POST['class'];
        $subject = strtolower($_POST['subject']);

        session_start();
        $_SESSION['subject'] = $subject;

        //Creating query for selecting assignemtns 
        $sql="SELECT * FROM $subject WHERE asclass='$asclass'";
        $query=mysqli_query($conn,$sql);

        //Displaying Assignments
        if (mysqli_num_rows($query)>0) {
            while($result=mysqli_fetch_assoc($query)){
                ?>

                <tr>
                    <td><?php echo $result['asname'] ?></td>
                    <td><?php echo $result['asfile'] ?></td>
                    <td><?php echo $result['asdate'] ?></td>
                    <td><?php echo $result['asdesc'] ?></td>
                </tr>

            <?php 
            }
        }
   }

?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>