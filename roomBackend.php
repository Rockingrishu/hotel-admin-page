
<?php
// Create database connection
    require('db_config.php');

    if(isset($_POST['add_room'])){
        $frm_data = filteration($_POST);

        print_r($frm_data);
        $q1 = "INSERT INTO `rooms`(`roomType`, `price`, `quantity`, `action`, `status`) VALUES ('?,?,?,?,?')";
        $values = [$frm_data['room_type'],$frm_data['price'],$frm_data['quantity'],$frm_data['action'],$frm_data['status']];

    }

?>