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
    <link rel="stylesheet" href="../css/navbar_sidebar.css">
    <link rel="stylesheet" href="../css/products.css">
    <link rel="stylesheet" href="../css/prd_detail.css">
    <link rel="stylesheet" href="../css/checkout.css">
    <link rel="stylesheet" href="../css/properties_form.css">
    <title>Properties</title>
</head>
<body>
<?php
if(isset($_REQUEST['btnsubmit'])) {
	$tensp = $_REQUEST['name'];
	$diachi = $_REQUEST['address'];
	$bank = (int)$_REQUEST['bankaccount'];
	$tax= (int)$_REQUEST['taxcode'];
    $em= $_REQUEST['emp'];
    $sdt = $_REQUEST['phone'];

    $sql = "INSERT INTO `supplier`( `name`, `bankacount`, `address`, `taxcode`, `em_code`) 
            VALUES ('$tensp','$bank','$diachi','$tax','$em' )";
            if(mysqli_query($conn, $sql)){
            } else{
            }

    $sqlSupplier = mysqli_query($conn, "SELECT * FROM `supplier` WHERE `taxcode` = ".$tax);
    $supCode = mysqli_fetch_array($sqlSupplier)['sup_code'];
    print_r($supCode);


    $sqlInsertPhone = "INSERT INTO `sphone`(`sup_code`, `sup_phone`)
                        VALUES (".$supCode.",".$sdt.")";
    
    mysqli_query($conn,$sqlInsertPhone);
header("Location: suppliers.php");
}
?>
   <div class="container-scroller">
        <?php include '../base/navbar.php'; ?>
        <div class="page-body-wraper">
            <?php include '../base/sidebar.php'; ?>
            <div class="main-content-wrap">
                <form class="categories_properties">
                    <div class="main-label item">Add a Supplier <!--(Xoa,Xem,Sua)--></div>
                    <div class="form-add-cate" style="padding-left: 20px">              
                        <!-- ID hide when in mode Add-->
                        <div class="product-id item" style="display: none;">
                            <h3>Id:</h3>
                            <input type="text" class="input-id" placeholder="C45902" name="">
                        </div>
                        <!-- NAME -->
                        <div class="product-name item">
                            <h3>Name:</h3>
                            <input type="text" class="" placeholder="Text your category name" name="name">
                        </div>
                        <!-- ADDRESS -->
                        <div class="product-current-price item">
                            <h3 style="font-weight: 500;">Address:</h3>
                            <input type="text" name="address" id="inPutPrice" class="" placeholder="Enter category price" style="width: 165px;">
                          
                        </div>
                         <!-- BANK -->
                         <div class="product-current-price item">
                            <h3 style="font-weight: 500;">Bank Account:</h3>
                            <input type="text" name="bankaccount" id="inPutPrice" class="" placeholder="Enter category price" style="width: 165px;">
         
                        </div>
                         <!-- TAX -->
                         <div class="product-current-price item">
                            <h3 style="font-weight: 500;">Tax Code:</h3>
                            <input type="text" name="taxcode" id="inPutPrice" class="" placeholder="Enter category price" style="width: 165px;">
                        </div>
                        <!-- Phone -->
                        <div class="product-current-price item">
                            <h3 style="font-weight: 500;">Phone Number:</h3>
                            <input type="text" name="phone" id="inPutPhone" class="" placeholder="Enter phone number" style="width: 165px;">
                        </div>
                        <!-- EMPLOYEE -->
                        <div class="product-supplier item">
                            <h3>Chọn nhân viên:</h3>
                            <select name="emp" id="selectSupplier" class="select-supplier" >
                                <option value="default" disabled hidden selected >Select a employee</option>
                                <?php
                                 $sqlsup ="SELECT `em_code`, `fname` FROM `employee`;";
                                 $querysup = mysqli_query($conn, $sqlsup);
                                while($row = mysqli_fetch_array($querysup)){
                                ?>    
                                    <option value="<?php echo $row['em_code']?>"><?php echo $row['fname']?></option>
                                 <?php     
                                }?>
                            </select>
                        </div>
                        
                        <!-- SUBMIT BUTTON -->
                        <button class="Btn" name="btnsubmit" >
                            <span class="btnIcon">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="text">Confirm</span> 
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/properties_form.js"></script>

</body>
</html>