<?php
include "db_conn.php";
session_start();
if ((isset($_POST['userName'])) && (isset($_POST['password']))) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }

    $username = validate($_POST['userName']);
    $password = validate($_POST['password']);

    if(empty($username)) {
        header("Location: ../index.php?error=Username is required");
        exit();
    } elseif (empty($password)) {
        header("Location: ../index.php?error=Password is required");
        exit();
    } else {
        // valid 
        $sql = "SELECT * FROM account WHERE USERNAME = '$username' AND PASSWORD = '$password' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ( ($row['USERNAME'] === $username) && ($row['PASSWORD'] === $password) ) {
                $_SESSION['ID'] = $row['id'];
                $_SESSION['USERNAME'] = $row['user_name'];
                $_SESSION['PASSWORD'] = $row['password'];
                $_SESSION['ACCOUNT_NAME'] = $row['AdminName'];
                echo($_SESSION['id']);
                header("Location: ../pages/main.php");
                exit();
            }
            // print_r($row);
        } else {
            header("Location: ../index.php?error=Incorect username or password");
            exit();
        }
        
    }
} else {
    header("Location: ../index.php");
    exit();
}

?>