<?php include '../php/db_conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    
<meta charset="UTF-8"><link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar_sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/supplier_form.css">
    <link rel="stylesheet" href="../css/navbar_sidebar.css">
    <link rel="stylesheet" href="../css/products.css">
    <link rel="stylesheet" href="../css/prd_detail.css">
    <link rel="stylesheet" href="../css/supplier_detail.css">
</head>
<body>
    <div class="container-scroller">
        <?php include '../base/navbar.php'; ?>
        <div class="page-body-wraper">
            <?php include '../base/sidebar.php'; ?>
            <div class="content">
            <?php 
                $id=$_GET['id'];
                $sqlsupplier="SELECT * FROM `supplier` INNER JOIN `sphone` 
                WHERE `supplier`.`sup_code`=$id AND `supplier`.`sup_code`=`sphone`.`sup_code`;";
                $querysuplier = mysqli_query($conn, $sqlsupplier);
                while($row = mysqli_fetch_array($querysuplier)){
            ?>
                <div class="page">
                <h1 class="header" >SUPPLIER</h1>
                <p class="address"><b>Supplier NO: </b><?php echo $row['sup_code']?></p>
                    <div class="shipping-info-head">
                        <h6>Name: </h6>
                        <p><?php echo $row['name']?> </p>
                        <h6>Address: </h6>
                        <p><?php echo $row['address']?></p>
                        
                    </div>
                    <div class="shipping-info">
                        <h6>Bank Account: </h6>
                        <p><?php echo $row['bankacount']?> </p>
                        <h6>Tax Code: </h6>
                        <p><?php echo $row['taxcode']?></p>
                    </div>
                    <div class="shipping-info">
                        <h6>Phone: </h6>
                        <p><?php echo $row['sup_phone']?> </p>
                    </div>
                    <?php } ?>
                    <hr class="top">
                    <div class="main-strip">
                        <h6>CATEGORY</h6>
                        <h6>COLOR</h6>
                        <h6>QUANTITY</h6>
                        <h6>DATE</h6>
                        <h6>CURRENT PRICE</h6>
                    </div>
                <hr class="bottom">
                <?php $id=$_GET['id'];
                $sqlcus ="SELECT `category`.`name`,`category`.`color`,`category`.`quantity`,`bolt`.`date`, `currentprice`.`cate_price` 
                            FROM `category` 
                            INNER JOIN `supplier` 
                            INNER JOIN `currentprice` INNER JOIN `bolt` 
                WHERE `supplier`.`sup_code`=`category`.`sup_code` AND `category`.`cate_code`=`bolt`.`cate_code` 
                AND `category`.`cate_code`=`currentprice`.`cate_code` AND`supplier`.`sup_code`=$id;";
                $querybolt = mysqli_query($conn, $sqlcus);
                while($row = mysqli_fetch_array($querybolt)){
                    ?>
                <div class="shipping">
                    <p><?php echo $row['name']?></p>
                    <p><?php echo $row['color']?></p>
                    <p><?php echo $row['quantity']?></p>
                    <p><?php echo $row['date']?></p>
                    <p><?php echo $row['cate_price']?></p>
                </div>
                <?php } ?>
            </div>
        </div><br>
        <br>
    </div>
</body>
</html>