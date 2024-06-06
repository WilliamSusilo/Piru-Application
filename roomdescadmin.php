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
$account = query("SELECT * FROM accounts WHERE username = '$username'")[0];

if ($account["role"] != "admin"){
  header("Location: index.php");
  exit;
}

$id = $_GET["id"];

$borrowingList = query("SELECT * FROM borrowings WHERE BorrowID = '$id'")[0];

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
                <h2><?= $borrowingList["activity"] ?></h2>
                <p class="subtitle">By <span style="text-transform: uppercase;"><?= $borrowingList["username"] ?></span></p>

                <?php 
                
                $signed = [$borrowingList["spembina"], $borrowingList["sricky"], $borrowingList["sbudi"], $borrowingList["swiwin"]];
                $approved = 0;
                for ($i=0; $i<4; $i++){
                  if ($signed[$i] == true) {
                    $approved++;
                  }
                }

                ?>

                <?php if ( $approved == 4 ) : ?>

                <span class="status approved">Approved</span>

                <?php elseif (in_array("0", $signed, true)) : ?>

                <span class="status canceled">Dissapproved</span>

                <?php else: ?>

                <span class="status not-approved">Not Approved</span>

                <?php endif; ?>



                <!-- Pakai Ini Sesuai Kebutuhan -->

                <!-- <span class="status canceled">Canceled</span>
                <span class="status not-approved">Not Approved</span>
                <span class="status done">Done</span> -->
              </div>
              <hr class="divider" />
              <form class="roomdesc">
                <div class="form-group">
                  <label for="pic-name">PIC Name</label>
                  <input type="text" id="pic-name" name="pic-name" value="<?= $borrowingList['name']; ?>" disabled />
                </div>
                <div class="form-group">
                  <label for="room">Room</label>
                  <input type="text" id="room" name="room" value="<?= $borrowingList['room']; ?>" disabled />
                </div>
                <div class="form-group">
                  <label for="borrowing-date">Borrowing Date</label>
                  <input type="date" id="borrowing-date" name="borrowing-date" value="<?= $borrowingList['date']; ?>" disabled />
                </div>
                <div class="form-group">
                  <label for="borrowing-time">Time</label>
                  <input type="time" id="borrowing-time" name="borrowing-time" value="<?= $borrowingList['time']; ?>" disabled />
                </div>
                <div class="form-group">
                  <label for="notes">Notes</label>
                  <textarea id="notes" name="notes" disabled><?= htmlspecialchars($borrowingList['equipments']); ?></textarea>
                </div>

                <div class="form-group signed">
                  <p class="signed">Signed <span class="lock">🔒</span></p>

                  <?php $signs = array("Pembina", "Pak Ricky", "Pak Budi", "Pak Wiwin"); ?>
                  <?php $signsdb = array("spembina", "sricky", "sbudi", "swiwin"); ?>
                  <?php $admins = array("pembina", "ricky", "budi", "wiwin"); ?>
                  <?php $adminsdb = array("ricky", "wiwin", "budi", "joko", "imam", "sylvia", "hanif", "abdul"); ?>

                  <?php for ($i=0; $i<4; $i++) : ?>

                  <div class="label-details">
                    <div class="label-person"><?= $signs[$i]; ?></div>
                    <?php if ($borrowingList[$signsdb[$i]] == null && ( $_SESSION["username"] == $admins[$i] || str_contains($_SESSION["password"], $admins[$i]) ) ) : ?>

                        <!-- Is it okay to use GET method? since it's just admins who can access this url -->
                        <div class="approval person-1">
                            <a id="approve" href="ubah.php?adminsign=<?= $signsdb[$i]; ?>&id=<?= $borrowingList['BorrowID']; ?>&approval=true" class="yes">YES</a>
                            <a id="reject" href="ubah.php?adminsign=<?= $signsdb[$i]; ?>&id=<?= $borrowingList['BorrowID']; ?>&approval=false" class="no">NO</a>
                        </div>

                    <?php elseif (($borrowingList[$signsdb[$i]] == true)) : ?>

                        <div class="approval person-2 status approved-text">Approved</div>

                    <?php elseif (($borrowingList[$signsdb[$i]] == NULL)) : ?>

                        <div class="approval person-4 status not-seen-other">Not Seen Yet</div>

                    <?php else : ?>

                        <div class="approval person-3 status not-approved-text">Disapproved</div>

                    <?php endif; ?>
                  </div>

                  <?php endfor; ?>

                  <!-- <div class="label-details">
                    <div class="label-person">Pembina</div>
                    <div class="approval person-1">
                      <button id="approve" class="yes">YES</button>
                      <button id="reject" class="no">NO</button>
                    </div>
                  </div>

                  <div class="label-details">
                    <div class="label-person">Pak Ricky</div>
                    <div class="approval person-2 status approved-text">Approved</div>
                  </div>

                  <div class="label-details">
                    <div class="label-person">Pak Budi</div>
                    <div class="approval person-3 status not-approved-text">Disapproved</div>
                  </div>

                  <div class="label-details">
                    <div class="label-person">Pak Wiwin</div>
                    <div class="approval person-4 status not-seen-other">Not Seen Yet</div>
                  </div> -->

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