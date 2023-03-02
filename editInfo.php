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

    <?php include 'header.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM bookinginfo WHERE id = {$id}";
    $data = mysqli_query($conn, $query);

    $total = mysqli_num_rows($data);
    $result = mysqli_fetch_assoc($data);

    ?>

    <div class="container-fluid" id="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-8 p-4 overflow-hidden">
                <h2 class="mb-4 text-center display-4 fw-bold">Modify Data</h2>
                <form id="bookingForm" action="#" method="POST">
                    <div class="form-group row mb-3 justify-content-center">
                        <label for="name" class="col-sm-3 col-form-label text-end">Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" required value="<?php echo $result['name']; ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-3 justify-content-center">
                        <label for="email" class="col-sm-3 col-form-label text-end">Email address:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" name="email" required value="<?php echo $result['email']; ?>">
                        </div>
                    </div>

                    <div class="form-group row mb-3 justify-content-center">
                        <label for="roomType" class="col-sm-3 col-form-label text-end">Room type:</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="roomType" name="roomType" required>
                                <option value="">--Select a room type--</option>
                                <option value="A" <?php
                                                    if ($result['roomType'] == 'A') {
                                                        echo "selected";
                                                    }
                                                    ?>>A</option>
                                <option value="B" <?php
                                                    if ($result['roomType'] == 'B') {
                                                        echo "selected";
                                                    }
                                                    ?>>B</option>
                                <option value="C" <?php
                                                    if ($result['roomType'] == 'C') {
                                                        echo "selected";
                                                    }
                                                    ?>>C</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3 justify-content-center">
                        <label for="roomNumber" class="col-sm-3 col-form-label text-end">Room number:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="roomNumber" name="roomNumber" required min="1" value="<?php echo $result['roomNumber']; ?>">
                        </div>
                    </div>

                    <div class="form-group row mb-3 justify-content-center">
                        <label for="price" class="col-sm-3 col-form-label text-end">Price:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="price" name="price" required min="1" value="<?php echo $result['price']; ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-3 justify-content-center">
                        <label for="startTime" class="col-sm-3 col-form-label text-end">Start time:</label>
                        <div class="col-sm-6">
                            <input type="datetime-local" class="form-control" id="startTime" name="startTime" required value="<?php echo $result['startTime']; ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-4 justify-content-center">
                        <label for="endTime" class="col-sm-3 col-form-label text-end">End time:</label>
                        <div class="col-sm-6">
                            <input type="datetime-local" class="form-control" id="endTime" name="endTime" required value="<?php echo $result['endTime']; ?>">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" name="register">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $roomType = $_POST['roomType'];
    $roomNumber = $_POST['roomNumber'];
    $price = $_POST['price'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];

    $query = "UPDATE bookinginfo SET name='$name', email='$email', roomType='$roomType', roomNumber='$roomNumber', price='$price', startTime='$startTime', endTime='$endTime' WHERE id=$id";


    // $query = "UPDATE `bookinginfo` SET `id`='[value-1]',`name`='[value-2]',`email`='[value-3]',`roomType`='[value-4]',`roomNumber`='[value-5]',`price`='[value-6]',`startTime`='[value-7]',`endTime`='[value-8]' WHERE 1"

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('Record Updated.');</script>";
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }
}


?>