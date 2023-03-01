<!doctype html>
<html lang="en">

<head> <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Hello, world!</title>
    <?php include 'links.php'; ?>
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
                            <th> # </th>
                            <th>Room Type  </th>
                            <th>Price  </th>
                            <th>Quantity</th>
                            <th> Status</th>
                            <th>Action  </th>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>