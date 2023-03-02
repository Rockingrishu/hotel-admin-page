<!doctype html>
<html lang="en">

<head> <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Admin Page</title>
    <?php include 'links.php'; ?>
    <script src="room_validation.js"></script>
    <?php include 'db_config.php'; ?>

</head>

<body class="bg-light">


    <?php include 'header.php'; ?>


    <div class="container-fluid" id="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-8 p-4 overflow-hidden">
                <?php

                $id = $_GET['id'];
                $current_datetime = date("Y-m-d H:i:s");

                $query = "SELECT *, TIMEDIFF('$current_datetime', startTime) AS booking_time_diff FROM bookinginfo WHERE id = {$id}";
                $data = mysqli_query($conn, $query);
                $result = mysqli_fetch_assoc($data);

                $booking_time_diff = $result['booking_time_diff'];

                if ($booking_time_diff > '48:00:00') {
                    $refund_amount = $result['price'];
                    $refund_msg = "Full Refund";
                } else if ($booking_time_diff > '24:00:00') {
                    $refund_amount = $result['price'] * 0.5;
                    $refund_msg = "50% Refund";
                } else {
                    $refund_amount = 0;
                    $refund_msg = "No Refund";
                }

                $query = "DELETE FROM bookinginfo WHERE id = {$id}";
                $data = mysqli_query($conn, $query);

                if ($data) { ?>
                    <div class="refund-amount card p-3">
                        <h2>Refund: <?php echo $refund_msg; ?></h2>
                        <p>Amount to be refunded: <?php echo $refund_amount; ?></p>
                    </div>
                <?php } else {
                    echo "Error cancelling booking: " . mysqli_error($conn);
                }


                ?>


            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>