
<?php
// Create database connection
    require('db_config.php');

    if (isset($_POST['register'])) {

        $roomType = $_POST['roomType'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $roomsBooked = $_POST['roomsBooked'];

    
        $query = "INSERT INTO roomdata VALUES ('','$roomType','$price','$quantity','$roomsBooked')";
    
        $data = mysqli_query($conn, $query);
    
        if ($data) {
            echo "<script>alert('data inserted');</script>";
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }

?>