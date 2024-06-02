<?php 

require "functions.php";

// starting session
session_start();

// checking session
if (!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

$username = $_SESSION["username"];

$borrowingList = query("SELECT * FROM borrowings WHERE username = '$username'");

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

      <!-- Roomlist Section -->
      <div class="roomlist-section">
        <div class="cover-roomlist" data-aos="zoom-in-down" data-aos-duration="1000">
          <div class="container-roomlist">
            <!-- Header -->
            <section class="content-list">
              <header class="roomlist">
                <h1>Room Borrowing List</h1>
                <p>Your room borrowing history is always stored in the app</p>
              </header>
            </section>

            <!-- Filters for Determining The Output -->
            <section class="filters">
              <div class="selected-time">
                <div class="selected-month">
                  <label for="month">Month : </label>
                  <select id="month" name="month">
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                    <option value="april">April</option>
                    <option value="may">May</option>
                    <option value="june">June</option>
                    <option value="july">July</option>
                    <option value="august">August</option>
                    <option value="september">September</option>
                    <option value="october">October</option>
                    <option value="november">November</option>
                    <option value="december">December</option>
                  </select>
                </div>
                <div class="selected-year">
                  <label for="year">Year : </label>
                  <select id="year" name="year">
                    <option value="2024">2024</option>
                    <option value="2024">2025</option>
                    <option value="2024">2026</option>
                    <option value="2024">2027</option>
                    <option value="2024">2028</option>
                    <option value="2024">2029</option>
                    <option value="2024">2030</option>
                  </select>
                </div>
              </div>

              <button class="btn" id="show-roomlist-btn">Show</button>
            </section>

            <!-- New Section -->
            <section class="lists">
              <div class="list new">
                <h2>New</h2>
                <div class="item">
                  <div class="roomlist-item" id="item-container-1">
                    <p>D.4</p>
                    <p>18/05/2024</p>
                  </div>
                  <button id="cancel" class="cancel">Cancel</button>
                </div>

                <div class="item">
                  <div class="roomlist-item" id="item-container">
                    <p>D.4</p>
                    <p>25/05/2024</p>
                  </div>
                  <button id="cancel" class="cancel">Cancel</button>
                </div>
              </div>

              <!-- Ongoing Section -->
              <div class="list ongoing">
                <h2>Ongoing</h2>
                <div class="item">
                  <div class="roomlist-item" id="item-container">
                    <p>D.4</p>
                    <p>09/05/2024</p>
                  </div>
                </div>
              </div>

              <!-- Done Section -->
              <div class="list done">
                <h2>Done</h2>
                <div class="item">
                  <div class="roomlist-item" id="item-container">
                    <p>D.4</p>
                    <p>15/04/2024</p>
                  </div>
                  <p class="canceled-text">CANCELED</p>
                </div>
                <div class="item">
                  <div class="roomlist-item" id="item-container">
                    <p>Audit Lt.4</p>
                    <p>10/04/2024</p>
                  </div>
                  <span class="status success">✔</span>
                </div>
                <div class="item">
                  <div class="roomlist-item" id="item-container">
                    <p>Audit Lt.4</p>
                    <p>01/04/2024</p>
                  </div>
                  <span class="status fail">✘</span>
                </div>
              </div>
            </section>
          </div>
        </div>

        <!-- Footer -->
        <section class="footer-section">
          <!-- <hr class="divider" /> -->
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

      <!-- Javascript -->
      <script src="js/script.js"></script>
    </body>
  </html>
</html>
