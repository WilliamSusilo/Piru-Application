<?php 

session_start();

if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require "functions.php";

$id = $_GET["id"];

if ( hapus($id) > 0 ) {
    echo "
        <script>
            alert('Data Successfully Deleted');
            document.location.href = 'roomlist.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('Data failed to delete');
            document.location.href = 'roomlist.php';
        </script>
        ";
}

?>