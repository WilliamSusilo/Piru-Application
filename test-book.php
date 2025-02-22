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
    <link rel="stylesheet" href="css/style.css?v=<?= filemtime('css/style.css'); ?>">
  </head>
  <html>
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
          <li class="theme">
            <a href="">
              <i class="bx bxs-moon" id="theme"></i>
              <span class="link_name">Theme</span>
            </a>
            <span class="tooltip">Theme</span>
          </li>
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

      <!-- Booking Section -->
      <div class="booking-section">
        <!-- Booking Form -->
        <section class="main-testbook">
          <div class="img-testbook">
            <img src="./assets/Icon/icon-3.png" alt="Image" />
          </div>
          <div class="form-container-room">
            <p class="instruction">Enter the date you want to borrow the room!</p>
            <form class="bookroom" action="bookroom.php" method="get">
              <div class="form-bookroom">
                <div class="form-field">
                  <label for="borrow" class="test-book">Borrowing Date</label>
                  <input type="date" id="borrow" name="date" required />
                </div>
                <div class="btn-fillform">
                  <button type="submit" class="btn" id="btn-fillform" name="submit">Submit</button>
                </div>
              </div>
            </form>
            <!-- Check Room Button -->
            <!-- <div class="btn-fillform">
              <button class="btn" id="btn-fillform">Next</button>
            </div> -->
          </div>
        </section>
      </div>

      <!-- Javascript -->
      <script>
        document.addEventListener("DOMContentLoaded", function () {
        var theme = document.getElementById("theme");

        if (localStorage.getItem("theme") === "dark") {
          document.body.classList.add("dark-theme");
          theme.classList.remove("bxs-moon");
          theme.classList.add("bxs-sun");
        }

        theme.onclick = function () {
          document.body.classList.toggle("dark-theme");
          if (document.body.classList.contains("dark-theme")) {
            theme.classList.remove("bxs-moon");
            theme.classList.add("bxs-sun");
            localStorage.setItem("theme", "dark");
          } else {
            theme.classList.remove("bxs-sun");
            theme.classList.add("bxs-moon");
            localStorage.setItem("theme", "light");
          }
        };
      });
      </script>
      <script src="js/script.js"></script>
    </body>
  </html>
</html>
