<?php 
include "db_conn.php";
    $status= $_POST['status'];
    echo $status;

    $id=$_GET['id'];
    echo $_GET['id'];

    $sql = "UPDATE `order` SET `status`=  '$status' WHERE `order`.`order_code`=$id";
    
    if(mysqli_query($conn, $sql)){
        echo "Cập nhật nhật dữ liệu thành công\n";
    } else{
        echo "Lỗi\n";
    }
    header("Location: ../pages/checkout.php?id=$id");
?>