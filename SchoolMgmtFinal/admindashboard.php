<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Profile - Amar Singh Secondary School</title>
  <style>
    /* Reset styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f9;
      color: #333;
    }

    /* Header styling */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: linear-gradient(45deg, #004d99, #0073e6);
      color: #fff;
      padding: 15px 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .header-left {
      font-size: 16px;
    }

    .header-right {
      font-size: 18px;
      font-weight: bold;
    }

    /* Main Content Styling */
    .main-content {
      text-align: center;
      padding: 30px 20px;
    }

    .main-content h1 {
      color: #004d99;
      font-size: 32px;
      margin-bottom: 10px;
      animation: fadeInDown 1s;
    }

    .main-content p {
      font-size: 18px;
      color: #666;
      margin-bottom: 30px;
      animation: fadeIn 1.5s;
    }

    /* Admin Control Buttons */
    .admin-controls {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .control-button {
      background: linear-gradient(45deg, #004d99, #00aaff);
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 15px 20px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: transform 0.3s, background 0.3s;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      width: 200px;
    }

    .control-button:hover {
      background: #0073e6;
      transform: scale(1.1);
    }

    /* Animation Effects */
    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Footer */
    footer {
      text-align: center;
      padding: 10px;
      background-color: #004d99;
      color: #fff;
      font-size: 14px;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .control-button {
        font-size: 14px;
        width: 150px;
      }
    }

  </style>
</head>
<body>
  <!-- Header -->
  <header>
    <div class="header-left">📞 +977-123-456789</div>
    <div class="header-right">Amar Singh Secondary School</div>
  </header>

  <!-- Main Content -->
  <div class="main-content">
    <h1>Welcome, Admin</h1>
    <p>Science Stream | Pokhara-12, Ramghat</p>
    <div class="admin-controls">
      <button class="control-button" onclick="navigateTo('assignment-upload.php')">Assignment Page</button>
      <button class="control-button" onclick="navigateTo('signup-form.html')">Sign-Up Form</button>
      <button class="control-button" onclick="navigateTo('studentrecord.php')">Student List</button>
      <button class="control-button" onclick="navigateTo('noticeforadmin.php')">Notice Upload</button>
      <button class="control-button" onclick="navigateTo('logout.php')">Logout</button>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    © 2024 Amar Singh Secondary School. All Rights Reserved.
  </footer>

  <!-- JavaScript -->
  <script>
    // Function to navigate to the respective pages
    function navigateTo(page) {
      // Adding a fade-out animation before navigation
      document.body.style.animation = "fadeOut 0.5s";
      setTimeout(() => {
        window.location.href = page;
      }, 500);
    }

    // Adding a fade-in effect on page load
    document.body.style.animation = "fadeIn 1s";
  </script>
</body>
</html>