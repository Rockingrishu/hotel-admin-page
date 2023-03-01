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
                                    <th class="text-white"> Status</th>
                                    <th class="text-white">Action </th>
                                </tr>
                            </thead>
                            <tbody id="room-data">

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
                    <form id="add_room_form" autocomplete="off">
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
                                <label for="action" class="col-form-label">Action:</label>
                                <input type="text" class="form-control" id="action" name="action" required pattern="[A-Za-z ]+">
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
                            <button type="submit" class="btn btn-primary" id="add-room-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let add_room_form = document.getElementById('add_room_form');

        add_room_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_rooms();
        });

        function add_rooms() {
            let data = new FormData();

            data.append('add_room', '');
            data.append('roomType', add_room_form.elements['room-type'].value);
            data.append('price', add_room_form.elements['price'].value);
            data.append('quantity', add_room_form.elements['quantity'].value);
            data.append('action', add_room_form.elements['action'].value);
            data.append('status', add_room_form.elements['status'].value);

            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'roomBackend.php', true);

            xhr.onload = function() {
               var myModal=document.getElementById('add-room');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if(this.responseText ==1){
                    alert("Room Added Successfully");
                    add_room_form.reset();
                }else{
                    alert("Server Down");
                }
            }

            xhr.send(data);

        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>