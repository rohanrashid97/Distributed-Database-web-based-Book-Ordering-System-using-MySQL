<?php
    $conn1 = new mysqli('localhost','root','','booksforyou_dhaka') or die('Connection Failed'.mysqli_error($conn1));
    $conn2 = new mysqli('localhost','root','','booksforyou_chattagram') or die('Connection Failed'.mysqli_error($conn2));
    $conn3 = new mysqli('localhost','root','','booksforyou_rajshahi') or die('Connection Failed'.mysqli_error($conn3));
?>