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
    <link rel="stylesheet" href="../css/categories.css">
    <title>Category</title>
    <link rel="stylesheet" href="../css/button.css">
</head>
<body>
    <!--DANH SACH NHAN VIEN -->
    <div class="container-scroller">
        <?php include '../base/navbar.php'; ?>
        <div class="page-body-wraper">
            <?php include '../base/sidebar.php'; ?>
            <div class="content">
                <div class="page">    
                    <h2 class="heading">Category</h2>
                    <hr class="top">
                <div class="main-strip">
                    <h6>Category No</h6>
                    <h6>Name</h6>
                    <h6>Color</h6>
                    <h6>Supplier</h6>
                </div>
                <?php 
                     $sqlbolt="SELECT `category`.`cate_code`,`category`.`name`,`category`.`color`,`supplier`.`name` as sub_name 
                     FROM `category` INNER JOIN `supplier` WHERE `category`.`sup_code`=`supplier`.`sup_code`;";
                     $querybolt = mysqli_query($conn, $sqlbolt);
                     while($row = mysqli_fetch_array($querybolt)){
                ?>
                <hr class="bottom">       
                <a href="#">
                    <!-- <style>
                        .shipping { 
                        background-color: ;
                     };
                    </style> -->
                    <div class="shipping" style="background-color: <?php echo $row['color']?>;">
                        <p><?php echo $row['cate_code']?></p>
                        <p><?php echo $row['name']?></p>
                        <p><?php echo $row['color']?></p>
                        <p><?php echo $row['sub_name']?></p>
                    </div>
                </a>
                <?php }?> 
                <a href="properties_form.php" >
                    <button class="Btn" name="btnsubmit">
                        <span class="btnIcon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">Add</span>
                    </button>
                </a>
                
            </div>
        </div>
    </div>
</body>
</html>