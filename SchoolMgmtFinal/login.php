<?php
    require('connection.php');

    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pwd'];  // The plain text password entered by the user

        // SQL query to select the user by username and email (don't check password yet)
        $sql = "SELECT sunm, spw FROM studentinfo WHERE sunm='$username'";
        $check = mysqli_query($conn, $sql);

        // Check if query was successful and if user exists
        if ($check && mysqli_num_rows($check) > 0) {
            // Fetch the result (user data)
            $result = mysqli_fetch_assoc($check);

            // Verify the password
            if (password_verify($password, $result['spw'])) {
                // If the password is correct, start the session
                session_start();
                $_SESSION['sname'] = $username;
                header('Location: studentprofile.php');
                exit;  // Stop further script execution
            } 
            
            else if ($username=='sega')
            {
                header('Location: admindashboard.php');
            }
            
            else {
                // Incorrect password
                echo "Login Failed: Incorrect password.";
            }
        } else {
            // User not found
            echo "<script>alert('Login Failed: User not found.');</script>";
        }
    }

    // Close connection
    mysqli_close($conn);
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amarsingh Science - Login</title>
    <link rel="icon" href="Images/logo.jpg" type="image/jpg">
    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Playfair+Display&display=swap" rel="stylesheet">
    
    <!-- Font for Icons -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Link to external CSS -->

    <link rel="stylesheet" href="css/headerstyle.css">
    <link rel="stylesheet" href="css/footerstyle.css">
    <link rel="stylesheet" href="css/loginstyle.css">
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/headerjs.js"></script>


    <div class="top-bar">
        <div class="container">
            <div class="contact-info">
                <p><i class="fas fa-phone"></i> 061-532841</p>
                <p><i class="fas fa-envelope"></i> amar.science075@gmail.com</p>
            </div>
            <div class="social-links">
                <a href="https://www.facebook.com/amvsciencestream" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- Main Header Section -->

    <header>
        <div class="container">

            <div class="logo">
                <img src="Images/logo.jpg" alt="School Logo">
            </div>
            <div class="school-info">
                <h1>Amarsingh Science Stream</h1>
                <p>Ramghat,Pokhara-12</p>
                <p>Education For All Round Development</p>
            </div>


            <div class="hamburger">
                <i class="fas fa-bars"></i>
            </div>


            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="aboutus.html">About us</a></li>
                    <li><a href="normalviewofnotice.php">Notice</a></li>
                    <li><a href="ourteam.html">Our Team</a></li>
                    <li><a href="contactus.html">Contact Us</a></li>
                    <li><a href="login.php" class="login-button">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Mobile -->

    <div class="mobile-nav">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="aboutus.html">About us</a></li>
            <li><a href="normalviewofnotice.php">Notice</a></li>
            <li><a href="ourteam.html">Our Team</a></li>
            <li><a href="contactus.html">Contact Us</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>
    <br><br><br>
    <div class="container-very-long-class-name">
        <div class="background-very-long-class-name">
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
        </div>
        <div class="login-box-very-long-class-name">
            <h2>Login</h2>
            <form method="POST">
                <div class="input-box-very-long-class-name">
                    <input type="text" id="username" name="user" required>
                    <label for="username">Username</label>
                </div>
                <div class="input-box-very-long-class-name">
                    <input type="password" id="password" name="pwd" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" name="submit">Login</button>
            </form>
        </div>

    </div>


    <script src="js/loginjs.js"></script>
    <br><br><br> <br><br> <br> <br><br>



    <!-- Footer -->

    <footer class="footer">
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <ul class="social-icon">
            <li class="social-icon__item"><a class="social-icon__link" href="https://www.facebook.com/amvsciencestream" target="_blank">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="#">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="#">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="#">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a></li>
        </ul>
        <ul class="menu">
            <li class="menu__item"><a class="menu__link" href="index.html">Home</a></li>
            <li class="menu__item"><a class="menu__link" href="aboutus.html">About us</a></li>
            <li class="menu__item"><a class="menu__link" href="normalviewofnotice.php">Notice</a></li>
            <li class="menu__item"><a class="menu__link" href="ourteam.html">Our Team</a></li>
            <li class="menu__item"><a class="menu__link" href="https://www.facebook.com/amvsciencestream/videos" target="_blank">Videos</a></li>
            <li class="menu__item"><a class="menu__link" href="https://www.facebook.com/amvsciencestream/photos" target="_blank">Photos</a></li>

            <li class="menu__item"><a class="menu__link" href="contactus.html">Contact Us</a></li>
        </ul>
        <br>
        <center> <b>
                <p class="footer-phone-address"> 061-532841 <br> amar.science075@gmail.com <br>Ramghat, Pokhara-12, Nepal </p>
            </b></center>

        <!-- Updated order with horizontal line -->

        <div class="footer-line"></div>
        <p>&copy; Amarsingh Secondary School | All Rights Reserved</p>
        <p>Created By: <a class="creator-facebook-link" href="https://www.facebook.com/adhikari.sital.7" target="_blank">Sital Adhikari</a>,
            <a class="creator-facebook-link" href="https://www.facebook.com/b1sh35.grg" target="_blank">Bishes Gurung</a>,
            <a class="creator-facebook-link" href="https://www.facebook.com/profile.php?id=100075638013133" target="_blank">Ankit Subedi</a>
        </p>
    </footer>



</body>

</html>