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
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden ">
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
                                $counter = 1; // initialize the counter variable
                                while ($row = mysqli_fetch_assoc($data)) {
                                    echo "<tr id='row-$counter'>
                                            <td>" . $counter . "</td>
                                            <td>" . $row['name'] . "</td>
                                            <td>" . $row['email'] . "</td>
                                            <td>" . $row['roomType'] . "</td>
                                            <td>" . $row['roomNumber'] . "</td>
                                            <td>" . $row['price'] . "</td>
                                            <td>" . $row['startTime'] . "</td>
                                            <td>" . $row['endTime'] . "</td>
                                            <td><button class=\"btn btn-primary\" onclick=\"editRow($counter)\">Edit</button></td>
                                          </tr>";
                                    $counter++; // increment the counter variable
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

    <!-- Add this code to the end of the HTML body -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Booking Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="edit.php" method="POST">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="mb-3">
                            <label for="edit-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit-name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="edit-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit-email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="edit-roomType" class="form-label">Room Type</label>
                            <input type="text" class="form-control" id="edit-roomType" name="roomType">
                        </div>
                        <div class="mb-3">
                            <label for="edit-roomNumber" class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="edit-roomNumber" name="roomNumber">
                        </div>
                        <div class="mb-3">
                            <label for="edit-price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="edit-price" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="edit-startTime" class="form-label">Check-in Date</label>
                            <input type="datetime-local" class="form-control" id="edit-startTime" name="startTime">
                        </div>
                        <div class="mb-3">
                            <label for="edit-endTime" class="form-label">Check-out Date</label>
                            <input type="datetime-local" class="form-control" id="edit-endTime" name="endTime">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
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