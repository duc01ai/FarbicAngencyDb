<?php
include "db_conn.php";
// session_start();
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
        // -----------------------------------valid---------------------- 
        $sql = "SELECT * FROM account WHERE USERNAME = '$username' AND PASSWORD = '$password' ";
        
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
        if ( ($row['USERNAME'] === $username) && ($row['PASSWORD'] === $password) ) {
            session_start();
            // echo('12313123');
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['USERNAME'] = $row['USERNAME'];
            $_SESSION['PASSWORD'] = $row['PASSWORD'];
            $_SESSION['ACCOUNT_NAME'] = $row['ACCOUNT_NAME'];
            // echo($_SESSION['ID']);
            header("Location: ../pages/main.php");
            exit();
        }
        else {
            header("Location: ../index.php?error=Incorect username or password");
            exit();
        }
        
        
        
        // $sql = "SELECT * FROM account WHERE USERNAME = ? AND PASSWORD = ? ";
        // $stmt = mysqli_prepare($conn, $sql);
        // print('hiiiii');
        // // print_r ($stmt);

        // if($stmt) {
        //     mysqli_stmt_bind_param($stmt, "ss", $usernamestmt, $passwordstmt);

        //     // gắn giá trị
        //     $usernamestmt = $username;
        //     $passwordstmt = $password;

        //     print_r($stmt);
        //     print('sau khi gan gia tri');
        //     // thực thi
        //     mysqli_stmt_execute($stmt);

        //     // Nhận kết quả
        //     $result = mysqli_stmt_get_result($stmt);

        //     print_r($result);

        //     $row = mysqli_fetch_assoc($result);
        //     print('row: ');
        //     print_r($row);

        //     if ($row) {
        //         // Kiểm tra thông tin đăng nhập
        //         if ($row['USERNAME'] === $username && $row['PASSWORD'] === $password) {
        //             print_r($row['USERNAME']);
        //             // Đăng nhập thành công, lưu thông tin vào session và chuyển hướng
        //             $_SESSION['ID'] = $row['ID'];
        //             $_SESSION['USERNAME'] = $row['USERNAME'];
        //             $_SESSION['ACCOUNT_NAME'] = $row['ACCOUNT_NAME'];
        //             print('haaaaaaaaaaaaa');
        //             header("Location: ../pages/main.php");
        //             exit();
        //         } 
        //     } 
        //     else {
        //         // Thông tin đăng nhập không đúng
        //         header("Location: ../index.php?error=Incorrect username or password");
        //         print('heeeeeeeeeeeee');
        //         exit();
        //     };
        }



        
        
}
else {
    header("Location: ../index.php");
    exit();
}

?>