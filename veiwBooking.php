<!doctype html>
<html lang="en">

<head> <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Hello, world!</title>
    <?php include 'links.php'; ?>
    <?php include 'db_config.php'; ?>
    <script src="room_validation.js"></script>
</head>

<body class="bg-light">


    <?php include 'header.php'; ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <div class="container my-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Total Rooms</h5>
                                    <p class="card-text">
                                        <?php
                                        $query = 'SELECT SUM(quantity) AS total_quantity FROM roomdata';
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_assoc($result);

                                        $query = 'SELECT SUM(roomsBooked) AS total_booked FROM roomdata';
                                        $result = mysqli_query($conn, $query);
                                        $row2 = mysqli_fetch_assoc($result);

                                        $available_rooms = $row['total_quantity'] - $row2['total_booked'];
                                        echo $available_rooms;
                                        ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Total Income</h5>
                                    <p class="card-text">
                                        <?php
                                        $query = 'SELECT SUM(price) AS total_income FROM bookinginfo';
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['total_income'];

                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Total Customers</h5>
                                    <p class="card-text">
                                        <?php
                                        $query = 'SELECT COUNT(*) as total_customers FROM bookinginfo';
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['total_customers'];

                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
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
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = 'SELECT * FROM `bookinginfo`';
                            $data = mysqli_query($conn, $query);

                            if (mysqli_num_rows($data) > 0) {
                                while ($row = mysqli_fetch_assoc($data)) {
                                    echo "<tr >
                                            <td>" . $row['id'] . "</td>
                                            <td>" . $row['name'] . "</td>
                                            <td>" . $row['email'] . "</td>
                                            <td>" . $row['roomType'] . "</td>
                                            <td>" . $row['roomNumber'] . "</td>
                                            <td>" . $row['price'] . "</td>
                                            <td>" . $row['startTime'] . "</td>
                                            <td>" . $row['endTime'] . "</td>
                                            <td><a href=\"editInfo.php?id=" . $row['id'] . "\">Edit</a></td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No data found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-top: 1rem;
        }

        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #343a40;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>