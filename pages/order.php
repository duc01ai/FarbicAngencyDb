<?php include '../php/db_conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar_sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/products.css">
    <link rel="stylesheet" href="../css/order.css">
    <title>Order</title>
</head>
<body>
    <!--DANH SACH DON HANG MINH MUA CUA SUPPLIER-->
    <div class="container-scroller">
        <?php include '../base/navbar.php'; ?>
        <div class="page-body-wraper">
            <?php include '../base/sidebar.php'; ?>
            <div class="content">
                <div class="page">    
                    <h2 class="heading">Order</h2>
                    <hr class="top">
                <div class="main-strip">
                    <h6>Order No</h6>
                    <h6>Cus Name</h6>
                    <h6>Date</h6>
                    <h6>Status</h6>
                </div>
                <?php 
                $sqlcus ="SELECT `order`.`order_code`, `customer`.`fname`,`customer`.`lname`, `order`.`date`, `order`.`status`
                FROM `order` INNER JOIN `customer` WHERE `order`.`cus_code`= `customer`.`cus_code` ORDER BY `order`.`order_code` ASC; ";
                $querybolt = mysqli_query($conn, $sqlcus);
                while($row = mysqli_fetch_array($querybolt)){
                    
                ?>
                <hr class="bottom">
                <a href="checkout.php?id=<?php echo $row['order_code']?>">
                <div class="shipping">
                    <p><?php echo $row['order_code']?></p>
                    <p><?php echo $row['fname']?> <?php echo $row['lname']?></p>
                    <p><?php echo $row['date']?></p>
                    <p><?php echo $row['status']?></p>
                </div></a>
                <br>
                <?php }?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>