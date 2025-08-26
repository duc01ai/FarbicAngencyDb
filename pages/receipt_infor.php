<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar_sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/receipt_info.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container-scroller">
        <?php include '../base/navbar.php'; ?>
        <div class="page-body-wraper">
            <?php include '../base/sidebar.php'; ?>
            <div class="main-content-wrap">
                <div class="content">
                    <div class="info-form">
                        <span class="main-label" style="font-size: 30px;font-weight:500;">Purchase material information</span>
                        <div class="sup-info">
                            <?php //query data
                                if (isset($_GET['date'])) {
                                    // echo $_GET['date'];
                                    // echo $_GET['scode'];
                                    $supplyDate = $_GET['date'];
                                    $sup_code = $_GET['scode'];
                                    include('../php/db_conn.php');
                                    $resultBolt = mysqli_query($conn, "SELECT * FROM `bolt` WHERE `date` LIKE '".$supplyDate."%'");
                                    $resultTotalCate = mysqli_query($conn, "SELECT COUNT(cate_code) AS total FROM `bolt` WHERE `date` LIKE '".$supplyDate."%'");
                                    $resultSuplpier = mysqli_query($conn, "SELECT * FROM supplier WHERE sup_code=".$sup_code);
                                    $resultSphone = mysqli_query($conn, "SELECT * FROM sphone WHERE sup_code=".$sup_code);
                                    $dataSupplier = mysqli_fetch_array($resultSuplpier);
                                    $dataTotalCate = mysqli_fetch_array($resultTotalCate);
                                    // $total = $dataTotalCate['total'];
                                    // print_r($dataBolt);
                                    // print_r($dataSupplier);
                                    // print_r($resultBolt);
                                }
                            ?>
                            <div class="supplier-name col">
                                <span>Name: </span> 
                                <span class="data"><?php echo $dataSupplier['name'];?></span>
                            </div>
                            <div class="supplier-phone col">
                                <span>Phone number: </span> <br>
                                <span class="data">
                                    <?php 
                                        while ($rowP = mysqli_fetch_array($resultSphone)) {
                                            echo $rowP['sup_phone']."<br>";
                                        }
                                    ?> <br>
                                </span>
                            </div>
                            <div class="supply">
                                <span>Total category is added quantity:
                                    <span class="data">
                                        <?php
                                            echo $dataTotalCate['total'];
                                        ?>
                                    </span>
                                </span>
                                <span>Total bolt:</span>
                            </div>
                            <br> <br>
                            <table class="supply-info">
                                <thead>
                                    <tr>
                                        <th>Date create</th>
                                        <th>Length</th>
                                        <th>Cate_code</th>
                                        <th>Order_code(if any)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>

                                    </tr> -->
                                    <?php
                                    while ($rowBolt = mysqli_fetch_array($resultBolt)) {
                                        if ($rowBolt['order_code'] == '')
                                        {
                                            $oc = 'null';
                                        } else {
                                            $oc = $rowBolt['order_code'];
                                        }

                                        echo "<tr><th>".$rowBolt['date'].
                                        "</th><th>".$rowBolt['length'].
                                        "</th><th>".$rowBolt['cate_code'].
                                        "</th><th>".$oc.
                                        "</th></tr>";
                                    }?>
                                </tbody>
                            </table>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>