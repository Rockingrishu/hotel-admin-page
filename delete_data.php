<?php

include 'db_config.php';

$id = $_GET['id'];
$query = "DELETE FROM `roomdata` WHERE id = {$id}";
$data = mysqli_query($conn, $query);
$query2=" alter table `roomdata` auto_increment = 1";
$data2 = mysqli_query($conn, $query2);

if ($data) {
    echo "Date added.";

} else {
    echo "<script>alert('Record Not Deleted')</script>";
}

?>
