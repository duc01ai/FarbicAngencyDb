<?php
    include('../php/db_conn.php');
    $idSupplier = $_POST['supplier'];
    $inputDate = $_POST['inputDate'];
    $inputTime = $_POST['inputTime'];
    $advancedCheck = $_POST['advancedCheck'];
    // print_r($_POST);
    
    function sqlString ($inputDate,$inputTime,$advancedCheck,$idSupplier) {
        $sql = "SELECT sup_code, `date`, COUNT(`date`) AS total FROM bolt WHERE sup_code = ".$idSupplier;
        if ($advancedCheck == 'true') {
            $sql = $sql." AND `date` LIKE '".$inputDate." ".$inputTime."%'";
            echo $advancedCheck;
        }
        $sql = $sql." GROUP BY date, sup_code;";
        return $sql;
    }
    
    
    $sql = sqlString($inputDate,$inputTime,$advancedCheck,$idSupplier);
    session_start();
    $_SESSION['fulldata'] = $sql;
    print_r($_SESSION['fulldata']);
    // print_r(mysqli_num_rows($_SESSION['fulldata']).' '.$_SESSION['search']);
    // print_r($_SESSION['fulldata']);


    header("Location: ../pages/test_search_receipt.php?search=true");


?>