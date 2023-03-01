<!doctype html>
<html lang="en">

<head> <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Hello, world!</title>
    <?php include 'links.php'; ?>
    <script src="room_validation.js"></script>
    <?php include 'db_config.php'; ?>

</head>

<body class="bg-light">


    <?php include 'header.php'; ?>

    <div class="container-fluid" id="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-8 p-4 overflow-hidden">
                <h2 class="mb-4 text-center display-4 fw-bold">Book a Room</h2>
                <form id="bookingForm" action="#" method="POST">
                    <div class="form-group row mb-3 justify-content-center">
                        <label for="name" class="col-sm-3 col-form-label text-end">Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3 justify-content-center">
                        <label for="email" class="col-sm-3 col-form-label text-end">Email address:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3 justify-content-center">
                        <label for="roomNumber" class="col-sm-3 col-form-label text-end">Room number:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="roomNumber" name="roomNumber" required min="1">
                        </div>
                    </div>
                    <div class="form-group row mb-3 justify-content-center">
                        <label for="roomType" class="col-sm-3 col-form-label text-end">Room type:</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="roomType" name="roomType" required>
                                <option value="">--Select a room type--</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3 justify-content-center">
                        <label for="price" class="col-sm-3 col-form-label text-end">Price:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="price" name="price" required min="1">
                        </div>
                    </div>
                    <div class="form-group row mb-3 justify-content-center">
                        <label for="startTime" class="col-sm-3 col-form-label text-end">Start time:</label>
                        <div class="col-sm-6">
                            <input type="datetime-local" class="form-control" id="startTime" name="startTime" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4 justify-content-center">
                        <label for="endTime" class="col-sm-3 col-form-label text-end">End time:</label>
                        <div class="col-sm-6">
                            <input type="datetime-local" class="form-control" id="endTime" name="endTime" required>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Book Room</button>
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

    $query = "INSERT INTO bookinginfo VALUES ('$name','$email','$roomType','$roomNumber','$price','$startTime','$endTime')";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('data inserted');</script>";
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }
}


?>

<script>
    function calculatePrice() {
        var roomType = document.getElementById("roomType").value;
        var priceField = document.getElementById("price");
        var price;

        switch (roomType) {
            case "A":
                price = 100;
                break;
            case "B":
                price = 80;
                break;
            case "C":
                price = 50;
                break;
            default:
                price = 0;
        }

        priceField.value = price;
    }

    document.getElementById("bookingForm").addEventListener("submit", function(event) {
        var name = document.getElementById("name").value.trim();
        var email = document.getElementById("email").value.trim();
        var roomNumber = document.getElementById("roomNumber").value.trim();
        var startTime = document.getElementById("startTime").value.trim();
        var endTime = document.getElementById("endTime").value.trim();

        var nameInput = document.getElementById("name");
        if (!/^[a-zA-Z\s]*$/g.test(name)) {
            event.preventDefault();
            alert("Please enter letters and spaces only in the name field.");
            nameInput.value = "";
            return false;
        }

        if (name === "" || email === "" || roomNumber === "" || startTime === "" || endTime === "") {
            event.preventDefault();
            alert("Please fill all required fields.");
            return false;
        }

        var startDateTime = new Date(startTime).getTime();
        var endDateTime = new Date(endTime).getTime();

        if (startDateTime >= endDateTime) {
            event.preventDefault();
            alert("End time must be later than start time.");
            return false;
        }

        if (isNaN(roomNumber) || !Number.isInteger(+roomNumber)) {
            event.preventDefault();
            alert("Room number must be a valid integer.");
            return false;
        }

        return true;
    });
</script>