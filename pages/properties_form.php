<?php include '../php/db_conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar_sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/properties_form.css">
    <link rel="stylesheet" href="../css/button.css">
    <title>Properties</title>
</head>
<body>
<?php
if(isset($_REQUEST['btnsubmit'])) {
	$ten = $_REQUEST['name'];
	$mau = $_REQUEST['color'];
    $gia = $_REQUEST['price'];
    $ncc = $_REQUEST['sup'];

    $sql = "INSERT INTO `category`( `name`, `color`,  `sup_code`) 
          VALUES ('$ten','$mau','$ncc')";
          if(mysqli_query($conn, $sql)){
          } else{
          }
          header("Location: categories.php");
}
?>
    <div class="container-scroller">
        <?php include '../base/navbar.php'; ?>
        <div class="page-body-wraper">
            <?php include '../base/sidebar.php'; ?>
            <div class="main-content-wrap">
                <form class="categories_properties">
                    <div class="main-label item">Add a category <!--(Xoa,Xem,Sua)--></div>
                    <div class="form-add-cate" style="padding-left: 20px">              
                        <!-- ID hide when in mode Add-->
                        <div class="product-id item" style="display: none;">
                            <h3>Id:</h3>
                            <input type="text" class="input-id" placeholder="C45902" name="">
                        </div>
                        <!-- NAME -->
                        <div class="product-name item" styles="width: 90px;">
                            <h3>Name:</h3>
                            <input type="text" class="" placeholder="Text your category name" name="name">
                        </div>
                        <!-- COLOR -->
                        <div class="product-color item">
                            <h3>Color:</h3>
                            <input type="color" class="input-color" id="colorPicker" name="color">
                            <h3 id="colorCode" >Your color code: </h3>
                            <h3 id="selectedColor" style="padding-left: 3px; color: #7c858b" >please choose your color</h3>
                        </div>
                        <!-- PRICE -->
                        <div class="product-current-price item">
                            <h3 style="font-weight: 500;">Price:</h3>
                            <input type="text" name="price" id="inPutPrice" class="" placeholder="Enter category price" style="width: 165px;">
                            <h3>đ</h3>
                        </div>
                        <!-- SUPPLIER -->
                        <div class="product-supplier item">
                            <h3>Chọn nhà cung cấp:</h3>
                            <select name="sup" id="selectSupplier" class="select-supplier" >
                                <option value="default" disabled hidden selected >Select a supplier</option>
                                <?php
                                    $sqlsup ="SELECT `supplier`.`sup_code`, `supplier`.`name` FROM `supplier`;";
                                    $querysup = mysqli_query($conn, $sqlsup);
                                    while($row = mysqli_fetch_array($querysup)){
                                ?>    
                                    <option value="<?php echo $row['sup_code']?>"><?php echo $row['name']?></option>
                                 <?php     
                                }?>
                            </select>
                        </div>
                        
                        <!-- SUBMIT BUTTON -->
                        <button class="Btn" name="btnsubmit" >
                            <span class="btnIcon">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="text">Create</span> 
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/properties_form.js"></script>

</body>
</html>