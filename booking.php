<!doctype html>
<html lang="en">

<head> <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Hello, world!</title>
    <?php include 'links.php'; ?>
    <script src="room_validation.js"></script>

</head>

<body class="bg-light">


    <?php include 'header.php'; ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden ">
                <style>
                    h2 {
                        font-family: "Poppins", sans-serif;
                    }
                </style>
                <h2>Book a Room</h2>
                <form id="bookingForm">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="roomNumber">Room number:</label>
                        <input type="number" class="form-control" id="roomNumber" name="roomNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="startTime">Start time:</label>
                        <input type="datetime-local" class="form-control" id="startTime" name="startTime" required>
                    </div>
                    <div class="form-group">
                        <label for="endTime">End time:</label>
                        <input type="datetime-local" class="form-control" id="endTime" name="endTime" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" id="price" name="price" readonly>
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-primary">Book Room</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>