<?php
    require ('connection.php');
    session_start();
    $sname=$_SESSION['sname'];

    $sql="SELECT * FROM studentinfo WHERE sunm='$sname'";
    $check= mysqli_query($conn,$sql);

    if($result = mysqli_fetch_assoc($check)){
        $class=$result['class'];
        $email=$result['email'];
        $adrs=$result['adrs'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="studentprofile.css">
</head>
<body>
    <?php
        
    ?>
    <div class="profile-container">
        <header>
            <h1>Student Profile</h1>
        </header>
        <br>
        <section class="student-info">
            <div>
                <h2>
                    <?php
                        echo "Welcome, ".$sname;
                    ?>
                </h2>
                <p><strong>Grade:</strong>
                    <?php
                            echo $class;
                    ?>
                </p>
                <p><strong>Email:</strong>
                    <?php
                            echo $email;                        
                    ?>
                </p>
                <p><strong>Address:</strong>
                    <?php
                            echo $adrs;
                    ?>
                </p>
            </div>
        </section>
    <form method="GET">
        <section class="form-container">
            <div class="section-header">Select subject</div>
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
    </form><br>
        <section>
            <div class="section-header">Assignments</div>
            <table>
                <thead>
                    <th>Assignment</th>
                    <th>File Name</th>
                    <th>Due Date</th>
                    <th>Download files</th>
                <thead>
                <tbody id="assignmentTableBody">
<?php
    require('connection.php');
    if(isset($_POST['select'])){
        //Selecting and subject
        $subject = $_GET['subject'];

        //Creating query for selecting assignemtns 
        $sql="SELECT * FROM $subject WHERE asclass='$class'";
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

        <section>
            <div class="section-header">Report Card</div>
            <table>
                <tr>
                    <th>Subject</th>
                    <th>Grade</th>
                </tr>
                <tr>
                    <td>Math</td>
                    <td>A+</td>
                </tr>
                <tr>
                    <td>English</td>
                    <td>B</td>
                </tr>
                <tr>
                    <td>Nepali</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Science</td>
                    <td>A-</td>
                </tr>
            </table>
        </section>

        <section class="progress-container">
            <div class="section-header">Student Progress</div>
            <canvas id="progressChart"></canvas>
        </section>

        <section class="statistics">
            <div class="stat-card">
                <h3>Assignments</h3>
                <p>5 Completed</p>
            </div>
            <div class="stat-card">
                <h3>Grade Average</h3>
                <p>90%</p>
            </div>
            <div class="stat-card">
                <h3>Attendance</h3>
                <p>95%</p>
            </div>
        </section>

        <section class="biodata">
            <h3>Full Biodata</h3>
            <p><strong>Date of Birth:</strong> 10th March 2006</p>
            <p><strong>Address:</strong> 123 Main Street, Cityville</p>
            <p><strong>Phone Number:</strong> +1234567890</p>
            <p><strong>Emergency Contact:</strong> +0987654321</p>
            <p><strong>Parents:</strong> John Doe Sr. & Jane Doe</p>
            <p><strong>Hobbies:</strong> Reading, Swimming, Painting</p>
        </section>

        <a href="logout.php"><button class="logout-btn">Logout</button></a>
    </div>

    <script>

        // Student Progress Line Chart using Chart.js
        const ctx = document.getElementById('progressChart').getContext('2d');
        const progressChart = new Chart(ctx, {
            type: 'line', // Change to 'line' for line chart
            data: {
                labels: ['Math', 'English', 'History', 'Science'],
                datasets: [{
                    label: 'Scores (%)',
                    data: [95, 80, 85, 90],
                    fill: false,
                    borderColor: '#006064',
                    tension: 0.1,
                    pointRadius: 5,
                    pointBackgroundColor: '#006064'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

        // Logout function
        function logout() {
            alert("You have successfully logged out!");
            // Redirect to login page or clear session here
            // window.location.href = 'login.html';
        }
    </script>
</body>
</html>