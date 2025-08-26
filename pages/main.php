<?php 
    session_start();
    // if (isset($_SESSION['id'])) {

// huy session
// session_start(); 
// session_unset();
// session_destroy();         
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar_sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container-scroller">
        <?php include '../base/navbar.php'; ?>
        <div class="page-body-wraper">
            <?php include '../base/sidebar.php'; ?>
            <div class="main-content-wrap">
                <div class="test">
                    <img src="../image/dashboard.png"style="margin-left: 150px">
                </div>
            </div>
        </div>
    </div>
</body>
</html>