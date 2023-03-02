<?php 
  $hname = 'localhost';
  $uname = 'root';
  $pss = '';
  $db = 'hbwebsite';

  $conn = mysqli_connect($hname, $uname, $pss, $db);

  if($conn){
    //   echo "connection is ok";
  }
  else{
        echo "connection is not ok";
  }
?>