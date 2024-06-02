<?php 

// starting session
session_start();

// checking session
if (!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="x-icon" href="assets/Logo/Logo-3-RB.PNG" />
    <title>Piru Application</title>

    <!-- Symbol -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!-- Box Icon -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!-- Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/js/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <!-- Sidebar Section -->
    <div class="sidebar">
      <div class="logo_details">
        <i class="bx bxl-audible icon"></i>
        <div class="logo_name">Piru Application</div>
        <i class="bx bx-menu" id="btn-sidebar-menu"></i>
      </div>
      <a class="button-keluar">SHOW / HIDE</a>
      <ul class="nav-list side">
        <li>
          <a href="index.php">
            <i class="bx bx-grid-alt"></i>
            <span class="link_name">Room</span>
          </a>
          <span class="tooltip">Room</span>
        </li>
        <li>
          <a href="account.php">
            <i class="bx bx-user"></i>
            <span class="link_name">Account</span>
          </a>
          <span class="tooltip">Account</span>
        </li>
        <li>
          <a href="contact.php">
            <i class="bx bx-chat"></i>
            <span class="link_name">Contact</span>
          </a>
          <span class="tooltip">Contact</span>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class="bx bx-log-out" id="log_out"></i>
            <span class="link_name">Log Out</span>
          </a>
          <span class="tooltip">Log Out</span>
        </li>
      </ul>
    </div>

    <!-- Room Section  -->
    <div class="room-section">
      <!-- Header -->
      <section class="content-room" data-aos="zoom-in" data-aos-duration="1000">
        <div class="room-content">
          <div class="header">
            <h1 class="h1-room">Book your Room Now!</h1>
            <p>Borrowing a room is now much easier with Piru Application!</p>
          </div>
          <img src="assets/Icon/icon-1.png" alt="Icon" class="icon-1" />
        </div>
      </section>

      <!-- Action Content -->
      <section class="main-room" data-aos="zoom-in" data-aos-duration="1000">
        <div class="room-container">
          <div class="room-box booking">
            <h3>Book The Room</h3>
            <img src="assets/Home/bg-bookroom.png" class="room-img" alt="" />
            <p>Borrow The Room you Need According to your Requirements</p>
          </div>

          <div class="room-box listroom">
            <h3>Room Borrowing List</h3>
            <img src="assets/Home/bg-roomlist-2.png" class="room-img" alt="" />
            <p>Check The Result History of your Previous Room Loans</p>
          </div>
        </div>
      </section>

      <!-- Footer -->
      <section class="footer-section">
        <div class="question">
          <div class="question-left">
            <h2>Any</h2>
            <h1>Question?</h1>
          </div>
          <div class="question-right">
            <div class="question-input">
              <p>Feel Free to Contact Us for Further Discussion!</p>
            </div>
          </div>
        </div>
        <div class="footer sidebar-open">
          <div class="footer-content">
            <div class="links">
              <h2>Piru Application</h2>
              <div class="social-links">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
              </div>
            </div>

            <div class="links">
              <p>Information</p>
              <li>Jakarta Utara, Indonesia</li>
              <li>piruapp@gmail.com</li>
            </div>

            <div class="links">
              <p>Navigation</p>
              <a href="room.html" class="link">Room</a>
              <a href="account.html" class="link">Account</a>
              <a href="contact.html" class="link">Contact</a>
              <a href="index.html" class="log_out">Log Out</a>
            </div>
          </div>
        </div>
        <hr class="footer-divider" />
        <p class="copyright">&copy; 2024 Piru Application - IW</p>
      </section>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>
