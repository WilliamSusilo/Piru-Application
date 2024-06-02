<?php 

require "functions.php";

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

      <!-- RoomDesc Section -->
      <div class="roomdesc-section">
        <div class="cover-roomdesc" data-aos="zoom-in-up" data-aos-duration="1000">
          <div class="container-roomdesc">
            <!-- Header -->
            <section class="content-desc">
              <header>
                <h1>Room Borrowing List</h1>
                <p>Your room borrowing history is always stored in the app</p>
              </header>
            </section>

            <!-- Main Content -->
            <section class="content">
              <div class="title">
                <h2>Preparing your Coding Test & Interview</h2>
                <p class="subtitle">By HIMA IC</p>

                <span class="status not-approved">Not Approved</span>

                <!-- Pakai Ini Sesuai Kebutuhan -->

                <!-- <span class="status canceled">Canceled</span>
                <span class="status approved">Not Approved</span>
                <span class="status done">Done</span> -->
              </div>
              <hr class="divider" />
              <form class="roomdesc">
                <div class="form-group">
                  <label for="pic-name">PIC Name</label>
                  <input type="text" id="pic-name" name="pic-name" disabled />
                </div>
                <div class="form-group">
                  <label for="room">Room</label>
                  <input type="text" id="room" name="room" disabled />
                </div>
                <div class="form-group">
                  <label for="borrowing-date">Borrowing Date</label>
                  <input type="date" id="borrowing-date" name="borrowing-date" disabled />
                </div>
                <div class="form-group">
                  <label for="borrowing-time">Time</label>
                  <input type="time" id="borrowing-time" name="borrowing-time" disabled />
                </div>
                <div class="form-group">
                  <label for="notes">Notes</label>
                  <textarea id="notes" name="notes" disabled></textarea>
                </div>
                <div class="form-group signed">
                  <p class="signed">Signed <span class="lock">🔒</span></p>
                  <div class="label-details">
                    <div class="label-person">Pembina</div>
                    <div class="approve person-1 status not-seen">Not Seen Yet</div>
                  </div>
                  <div class="label-details">
                    <div class="label-person">Pak Ricky</div>
                    <div class="approve person-2 status approved">Approved</div>
                  </div>
                  <div class="label-details">
                    <div class="label-person">Pak Budi</div>
                    <div class="approve person-3 status not-approved">Disapproved</div>
                  </div>
                  <div class="label-details">
                    <div class="label-person">Pak Wiwin</div>
                    <div class="approve person-4 status not-seen">Not Seen Yet</div>
                  </div>
                </div>
              </form>
            </section>

            <!-- Back Button -->
            <button class="btn" id="back-button-roomdesc">Back</button>
          </div>
          <div class="img-roomdesc">
            <img src="./assets/Icon/icon-6.png" alt="Image" />
          </div>
        </div>
      </div>

      <!-- Javascript -->
      <script src="js/script.js"></script>
    </body>
  </html>
</html>
