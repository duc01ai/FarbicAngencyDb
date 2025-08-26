<?php include '../php/db_conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar_sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/products.css">
    <link rel="stylesheet" href="../css/prd_detail.css">
    <link rel="stylesheet" href="../css/supplier.css">
    <title>SUPPLIER</title>
</head>
<body>
    <!--DANH SACH CATEGORY SUPPLIER-->
    <div class="container-scroller">
        <?php include '../base/navbar.php'; ?>
        <div class="page-body-wraper">
            <?php include '../base/sidebar.php'; ?>
            <div class="content">
                <div class="page">    
                    <h2 class="heading">Supplier</h2>
                    <hr class="top">
                <div class="main-strip">
                    <h6>Supplier No</h6>
                    <h6>Name</h6>
                    <h6>Address</h6>
                </div>
                <?php 
                    $sqlsup ="SELECT * FROM  `supplier`";
                    $querysup = mysqli_query($conn, $sqlsup);
                    while($row = mysqli_fetch_array($querysup)){
                ?>
                <hr class="bottom">
                <a href="supplier-detail.php?id=<?php echo $row['sup_code']?>">
                <div class="shipping">
                    <p><?php echo $row['sup_code']?></p>
                    <p><?php echo $row['name']?></p>
                    <p><?php echo $row['address']?></p>
                </div>
                </a>
                <?php }?> 
                <a href="supplier_form.php" >
                    <button class="Btn" name="btnsubmit">
                        <span class="btnIcon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">Create</span>
                    </button>
                </a>
                </div> 
            </div>
            <br>
        </div>
    </div>
</body>
</html>