<?php 
    $hname = 'localhost';
    $uname = 'root';
    $pss = '';
    $db = 'hbwebsite';

    $conn = mysqli_connect($hname, $uname, $pss, $db);

    if(!$conn){
        die('Could not connect: '. mysqli_connect_error());
    }

    function filteration($data){
        foreach($data as $key => $value){
            $data[$key] = trim($value);
            $data[$key] = stripslashes($value);
            $data[$key] = htmlspecialchars($value);
            $data[$key] = strip_tags($value);
        }

        return $data;
    }

    function select($sql,$value,$datatypes){
        $conn = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($conn,$sql)) {
            mysqli_stmt_bind_param($stmt,$datatypes,...$value);
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;
            }
            else{
                die("Query cannot be prepared.");
            }
        }
        else{
            die("Query cannot be executed.");
        }
    }
