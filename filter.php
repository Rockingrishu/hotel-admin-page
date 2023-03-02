<!doctype html>
<html lang="en">

<head> <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Admin Page</title>
    <?php include 'links.php'; ?>
</head>

<body class="bg-light">
    <?php include 'header.php'; ?>

    <div class="container-fluid py-5" id="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-8 p-4 overflow-hidden bg-white">
                <div class="container">
                    <h1 class="text-center mb-4">Database Filters</h1>
                    <form action="filter.php" method="POST">
                        <div class="form-group">
                            <label for="room-number">Room Number:</label>
                            <input type="text" class="form-control" id="room-number" placeholder="Enter room number" name="roomNumber">
                        </div>
                        <div class="form-group">
                            <label for="room-type">Room Type:</label>
                            <select class="form-control" name="roomType">
                                <option>select</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start-date">Start Date:</label>
                            <input type="date" class="form-control" name="startTime">
                        </div>
                        <div class="form-group">
                            <label for="end-date">End Date:</label>
                            <input type="date" class="form-control" name="endTime">
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary" name="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="container-fluid" id="main-content">
            <div class="row">
                <div class="col-lg-10 ms-auto p-4 overflow-hidden ">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Room Type</th>
                                    <th scope="col">Room Number</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Check-in Date</th>
                                    <th scope="col">Check-out Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("db_config.php");

                                if (isset($_POST['submit'])) {

                                    $roomNumber = $_POST['roomNumber'];
                                    $roomType = $_POST['roomType'];
                                    $startTime = $_POST['startTime'];
                                    $fdate = strtotime($startTime);
                                    $fdate = date('Y-m-d H:i:s', $fdate);

                                    $endTime = $_POST['endTime'];
                                    $tdate = strtotime($endTime);
                                    $tdate = date('Y-m-d H:i:s', $tdate);

                                    $query = "SELECT * FROM `bookinginfo` WHERE roomNumber = '$roomNumber' OR roomType = '$roomType' OR startTime >= '$fdate' AND endTime <= '$tdate'";
                                    $data = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($data) > 0) {
                                        while ($row = mysqli_fetch_assoc($data)) {
                                            echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['roomType'] . "</td>
                <td>" . $row['roomNumber'] . "</td>
                <td>" . $row['price'] . "</td>
                <td>" . $row['startTime'] . "</td>
                <td>" . $row['endTime'] . "</td>
            </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No data found</td></tr>";
                                    }
                                }
                                ?>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>