<?php 

// starting session
session_start();

// checking session
if (isset($_SESSION["login"])){
  header("Location: index.php");
  exit;
}

// configure with functions.php
require "functions.php";

// checking is SignIn button has been clicked
if ( isset($_POST["signin"]) ) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  // search for username in db
  $user = mysqli_query($db, "SELECT * FROM accounts WHERE username = '$username'");

  // checking username
  if ( mysqli_num_rows($user) === 1 ) {

    $row = mysqli_fetch_assoc($user);

    // checking password
    if( $password === $row['password'] ){

      // set the login session to true to indicate that the user has successfully logged in
      $_SESSION["login"] = true;

      $_SESSION["username"] = $username;

      header("Location: index.php");
      exit;
    }
  }
  $error = true;
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <!-- Box Icon -->
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- SnowFall -->
    <script src="js/snowfall.min.js"></script>
  </head>
  <body>
    <div class="signin">
      <div class="container-signin">
        <!-- Left Section -->
        <div class="toggle">
          <div class="toggle-left">
            <div class="toggle-panel">
              <h2>Welcome Back!</h2>
              <img
                src="assets/Logo/Logo-1-RB.png"
                alt="Logo"
                class="logo-img"
              />

              <!-- Welcome Text -->
              <button data-modal-target="#modal" class="modal-button">
                CLICK HERE!
              </button>
              <div class="modal" id="modal">
                <div class="modal-header">
                  <div class="title">Keep Up The Good Work Today!</div>
                  <button data-close-button class="close-button">
                    &times;
                  </button>
                </div>
                <div class="modal-body">
                  We hope this application can help improve the effectiveness of
                  your activities in borrowing a room. <br />
                  <br />
                  <b>~ Warm regards from Piru Application Developer ~</b>
                </div>
              </div>
              <div id="overlay"></div>
            </div>
          </div>
        </div>

        <!-- Right Section -->
        <div class="form-container-signin">
          <!-- Signin Form -->
          <form action="" method="post">
            <h1 class="signin-h1">Sign In</h1>
            <div class="div_form">
              <div class="input-content">
                <input type="text" id="username" placeholder="" class="input-details" />
                <label for="username" class="form_label">Username</label>
              </div>
              <div class="input-content">
                <input type="password" id="password" placeholder="" class="input-details" />
                <label for="password" class="form_label">Password</label>
              </div>
              <?php if( isset($error) ) : ?>
                <p style="color: red; font-style: italic;">incorrect username or password</p>
              <?php endif ?>
            </div>

            <!-- Sign In Button -->
            <button id="signIn" type="submit" name="signin" class="btn">Sign In</button>
          </form>
        </div>
      </div>
    </div>

    <div class="loading-page">
      <img src="./assets/Logo/Logo-1-RB.png" alt="Piru App" id="svg" />

      <div class="name-container">
        <div class="logo-name">
          Borrowing a Room is Now Much Easier with Piru Application
        </div>
      </div>
    </div>

    <!-- Javascript -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"
      integrity="sha512-gmwBmiTVER57N3jYS3LinA9eb8aHrJua5iQD7yqYCKa5x6Jjc7VDVaEA0je0Lu0bP9j7tEjV3+1qUm6loO99Kw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="js/script.js"></script>
  </body>
</html>
