<?php 
    session_start();
    if (!isset($_GET['search'])) {
        $_SESSION['fulldata'] = "SELECT sup_code, `date`, COUNT(`date`) AS total FROM bolt GROUP BY sup_code, `date`";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar_sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/receipt.css">
    <!-- <link rel="stylesheet" href="../js/search_option.js"> -->
    <title>Dashboard</title>
</head>
<body>
    <div class="container-scroller">
        <?php include '../base/navbar.php';
        ?>
        <div class="page-body-wraper">
            <?php include '../base/sidebar.php'; ?>
            <div class="content">
                <div class="search-field1">
                    <form action="../php/search_receipt.php" method="post" class="form-search-box">
                        <!-- <input type="text" class="search-box" name="inputSup" id="inputSupplierName" placeholder="Nhap ten nha cung cap"> -->
                        <!-- <input type="date" id="inputDate" class="search-box" name="inputDate"> -->
                        <span style="padding-right: 5px;">Supplier:</span>
                            <?php
                            include('../php/db_conn.php');
                            // query supplier --------------------
                            $sqlsupplier = "SELECT * FROM supplier;";
                            $result = mysqli_query($conn, $sqlsupplier);
                            $data = array();
                            // gán data vào mảng data
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $data[] = $row;
                                }
                            }
                            // print_r($data);
                            ?>
                        <select name="supplier" id="querySupplier" >
                            <?php
                                // Duyệt qua mảng và thêm các option vào thẻ select
                                foreach ($data as $item) {
                                    echo "<option value='" . $item['sup_code'] . "'>" . $item['name'] . "</option>";
                                }
                            ?>
                        </select>
                        <button type="submit" class="search-icon" style="margin-left: 5px;" id="searchButton" name="false">
                            <i class="bi bi-search"></i>
                        </button>
                        <div class="advanced-search" id="advancedSearch">
                            <i class="bi bi-caret-down"></i>
                            <i class="bi bi-caret-down-fill" hidden></i>
                            <input type="text" name="advancedCheck" id="advancedCheck" hidden>
                        </div>
                        <div class="test-select" id="advancedSearchForm" style="opacity: 0;">
                            <!-- <span>Date:</span>
                            <input type="date" id="inputDate" name="inputDate"> <br> -->
                            <span>Date:</span>
                            <input type="date" id="inputDate" class="search-box" name="inputDate">
                            <span>Time:</span>
                            <input type="time" id="inputTime" name="inputTime"> <br>
                            
                        </div>
                    </form>
                </div>
                <div class="result_receipt">
                    <div class="heading" style="font-size: 28px; font-weight:450;">Receipt</div>
                    <hr class="top">
                    <div class="col-name">
                        <h6>Date</h6>
                        <h6>Purchase Amount</h6>
                        <h6>Supplier Code</h6>
                    </div>
                    <!-- <hr class="top"> -->
                    <?php
                        // print_r($_SESSION['fulldata']);
                        $result = mysqli_query($conn,$_SESSION['fulldata']);
                        // print_r($result);
                        if ($result) {
                            while ( $row = mysqli_fetch_array($result) ) {
                                // print_r($result);
                        
                    ?>
                    <hr class="bottom">
                    <a href="../pages/receipt_infor.php?date=<?php echo $row['date']?>&scode=<?php echo $row['sup_code']?>">
                        <div class="shipping">
                            <p><?php echo $row['date']?></p>
                            <p><?php echo $row['total']?></p>
                            <p><?php echo $row['sup_code']?></p>
                        </div>
                    </a>
                    <?php
                            }
                        };
                    ?>

                </div>
            </div>
        </div>
    </div>



    <script src="../js/search_option.js"></script>
</body>
</html>