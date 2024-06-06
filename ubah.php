<?php 

require "functions.php";

$adminsign = $_GET["adminsign"];
$id = $_GET["id"];
$approval = $_GET["approval"];

mysqli_query($db, "UPDATE borrowings SET $adminsign = $approval WHERE BorrowID = $id;");

echo "
<script>
    alert('Approval Setted');
    document.location.href = 'index.php';
</script>
";

?>
