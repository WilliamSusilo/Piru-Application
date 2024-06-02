<?php 

require "functions.php";

// starting session
session_start();

// checking session
if (!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

// check if the submit button has been pressed
if (isset($_POST["submit"])){

  // checking for available rooms and it's time
  $inputDate = $_POST["date"];
  $borrowingListAll = query("SELECT date, time, room FROM borrowings WHERE date = '$inputDate'");

  if (add($_POST, $_SESSION["username"]) > 0) {
        echo "
        <script>
            alert('Data added successfully');
            document.location.href = 'roomlist.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data failed to add');
            document.location.href = 'index.php';
        </script>
        ";
    }
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

      <!-- Booking Section -->
      <div class="booking-section">
        <!-- Booking Form -->
        <section class="main-booking form" data-aos="zoom-in-up" data-aos-duration="1000">
          <div class="img-bookroom form">
            <img src="./assets/Icon/icon-2.png" alt="Image" />
          </div>
          <div class="form-container-room">
            <p class="instruction">Fill in the following form data correctly and carefully</p>
            <form class="bookroom" action="" method="post">
              <div class="form-bookroom">
                <div class="form-left">
                  <div class="form-field">
                    <label for="borrow">Borrowing Date<span class="required">*</span></label>
                    <input type="date" id="borrow" name="date" required />
                  </div>
                  <div class="form-field">
                    <label for="time">Time<span class="required">*</span></label>
                    <input type="time" id="time" name="time" required />
                  </div>
                  <div class="form-field">
                    <label for="room">Room<span class="required">*</span></label>
                    <select name="room" id="room">
                      <option value="none">None</option>
                      <option value="1.1">1.1</option>
                      <option value="1.2">1.2</option>
                      <option value="1.3">1.3</option>
                      <option value="1.4">1.4</option>
                      <option value="1.5">1.5</option>
                      <option value="1.6">1.6</option>
                      <option value="1.7">1.7</option>
                      <option value="1.8">1.8</option>
                      <option value="1.9">1.9</option>
                      <option value="1.10">1.10</option>
                      <option value="1.10">1.11</option>
                      <option value="1.10">1.12</option>
                      <option value="2.1">2.1</option>
                      <option value="2.2">2.2</option>
                      <option value="2.3">2.3</option>
                      <option value="2.4">2.4</option>
                      <option value="2.5">2.5</option>
                      <option value="2.6">2.6</option>
                      <option value="2.7">2.7</option>
                      <option value="2.8">2.8</option>
                      <option value="2.9">2.9</option>
                      <option value="2.10">2.10</option>
                      <option value="2.a">2.A</option>
                      <option value="2.b">2.B</option>
                      <option value="2.c">2.C</option>
                      <option value="2.d">2.D</option>
                      <option value="b1">B1</option>
                      <option value="b2">B2</option>
                      <option value="b3">B3</option>
                      <option value="b4">B4</option>
                      <option value="b5">B5</option>
                      <option value="b6">B6</option>
                      <option value="b7">B7</option>
                      <option value="b8">B8</option>
                      <option value="d1">D1</option>
                      <option value="d2">D2</option>
                      <option value="d3">D3</option>
                      <option value="d4">D4</option>
                      <option value="audit2">Auditorium Lt. 2</option>
                      <option value="audit4">Auditorium Lt. 4</option>
                    </select>
                  </div>
                  <div class="form-field">
                    <label for="name">PIC Name<span class="required">*</span></label>
                    <input type="text" id="name" name="name" required />
                  </div>
                  <!-- <div class="form-field">
                    <label for="phone">Whatsapp Number<span class="required">*</span></label>
                    <input type="text" id="phone" name="phone" required />
                  </div> -->
                </div>

                <div class="form-right">
                  <!-- <div class="form-field">
                    <label for="organization">UKM/HIMA<span class="required">*</span></label>
                    <select name="organization" id="organization">
                      <option value="none">None</option>
                      <option value="esport">UKM E-Sport</option>
                      <option value="badmin">UKM Badmin</option>
                      <option value="basket">UKM Basket</option>
                      <option value="futsal">UKM Futsal</option>
                      <option value="bimover">UKM BIMOVER</option>
                      <option value="bosos">UKM BOSOS</option>
                      <option value="fobi">UKM FOBI</option>
                      <option value="dance">UKM Dance</option>
                      <option value="band">UKM BAND</option>
                      <option value="psgg">UKM PSGG</option>
                      <option value="rohis">UKM Rohis Al-Ashri</option>
                      <option value="maleakhi">UKM PD Maleakhi</option>
                      <option value="kmk">UKM KMK</option>
                      <option value="da">UKM D-A</option>
                      <option value="litbang">UKM Litbang</option>
                      <option value="ims">UKM IMS</option>
                      <option value="fgi">UKM FGI</option>
                      <option value="kaf">UKM KAF</option>
                      <option value="himabi">HIMA HIMABI</option>
                      <option value="himamen">HIMA CMA</option>
                      <option value="asta">HIMA ASTA</option>
                      <option value="ic">HIMA IC</option>
                      <option value="imaji">HIMA IMAJI</option>
                      <option value="gdsc">GDSC</option>
                      <option value="bpm">BPM</option>
                    </select>
                  </div> -->
                  <div class="form-field">
                    <label for="activity">Activity Name<span class="required">*</span></label>
                    <input type="text" id="activity" name="activity" required />
                  </div>
                  <div class="form-field">
                    <label for="participants">Total of Participants<span class="required">*</span></label>
                    <input type="number" id="participants" name="participants" required />
                  </div>
                  <div class="form-field">
                    <label for="equipments">Equipments</label>
                    <textarea name="equipments" id="equipments"></textarea>
                  </div>
                </div>
              </div>
              <!-- Submit Button -->
              <div class="submit-container">
                <button class="btn-submit btn" id="btn-submit" type="submit" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </section>
      </div>

      <!-- Javascript -->
      <script src="js/script.js"></script>
    </body>
  </html>
</html>
