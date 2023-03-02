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
            <div class="col-lg-10 ms-auto p-4 overflow-hidden ">
                <h3 class="mb-4">
                    ROOMS
                </h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                                <i class="bi bi-plus-square"></i>Add
                            </button>
                        </div>

                        <div class="table-responsive-lg" style="height:450; overflow-y:scroll;"></div>
                        <table class="table table-hover border">
                            <thead>
                                <tr class="bg-dark">
                                    <th class="text-white"> # </th>
                                    <th class="text-white">Room Type </th>
                                    <th class="text-white">Price </th>
                                    <th class="text-white">Quantity</th>
                                    <th class="text-white">Rooms Booked</th>
                                    <th class="text-white">Status</th>
                                </tr>
                            </thead>
                            <tbody id="room-data">
                                <?php
                                $query = 'SELECT * FROM roomdata';
                                $data = mysqli_query($conn, $query);

                                if (mysqli_num_rows($data) > 0) {
                                    $counter = 1; // initialize the counter variable
                                    while ($row = mysqli_fetch_assoc($data)) {
                                        echo "<tr id='row-$counter'>
                                            <td>" . $counter . "</td>
                                            <td>" . $row['roomType'] . "</td>
                                            <td>" . $row['Price'] . "</td>
                                            <td>" . $row['quantity'] . "</td>
                                            <td>" . $row['roomsBooked'] . "</td>
                                            <td>" . $row['status'] . "</td>
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
    </div>

    <div class="modal fade" id="add-room" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_room_form" autocomplete="off" action="#" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="room-type" class="col-form-label">Room Type:</label>
                                <input type="text" class="form-control" id="room-type" name="roomType" required pattern="[A-Za-z ]+">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="price" class="col-form-label">Price:</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="quantity" class="col-form-label">Quantity:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="action" class="col-form-label">Rooms Booked:</label>
                                <input type="text" class="form-control" id="action" name="action" required pattern="[0-9]+">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="col-form-label">Status:</label>
                                <select class="form-select" aria-label="Default select example" id="status" name="status" required>
                                    <option selected disabled>Choose...</option>
                                    <option value="available">Available</option>
                                    <option value="unavailable">Unavailable</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="add-room-btn" name="register">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'roomBackend.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>