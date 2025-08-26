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
    <link rel="stylesheet" href="../css/customer.css">
    <title>Customer</title>
</head>
<body>
    <!--DANH SACH NHAN VIEN -->
    <div class="container-scroller">
        <?php include '../base/navbar.php'; ?>
        <div class="page-body-wraper">
            <?php include '../base/sidebar.php'; ?>
            <div class="content">
                <div class="page">    
                    <h2 class="heading">Customer</h2>
                    <hr class="top">
                <div class="main-strip">
                    <h6>Cus No</h6>
                    <h6>First Name</h6>
                    <h6>Last Name</h6>
                    <h6>Arrears</h6>
                    <h6>Status</h6>
                    <h6>Address</h6>
                </div>
                <?php 
                $sqlemp ="SELECT * FROM `customer` ";
                $queryemp = mysqli_query($conn, $sqlemp);
                while($row = mysqli_fetch_array($queryemp)){
                ?>
                <hr class="bottom">
                <div class="shipping">
                    <p><?php echo $row['cus_code']?></p>
                    <p><?php echo $row['fname']?></p>
                    <p><?php echo $row['lname']?></p>
                    <p><?php echo $row['arrears']?></p>
                    <p><?php echo $row['status']?></p>
                    <p><?php echo $row['address']?></p>
                </div>
                <br><?php }?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>