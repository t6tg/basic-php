<?php
session_start();
if ($_SESSION['username'] == null) {
    echo "<script>alert('กรุณาเข้าสู่ระบบ');</script>";
    header("Refresh:0 , url=../index.html");
    exit();
}
if ($_POST['password'] != null || $_POST['cf-password'] != null  || $_POST['origin-password'] != null) {
    if ($_POST['password'] != $_POST['cf-password']) {
        echo "<script>alert('รหัสผ่านยืนยันไม่ตรงกัน');</script>";
        header("Refresh:0 , url=./index.php");
        exit();
    }
    require_once "../Database/Database.php";
    $password = md5($_POST['password']);
    $username = $_SESSION['username'];
    $sql_same_password = "SELECT password FROM students WHERE username='" . $username . "'";
    $query_same_password = mysqli_query($conn, $sql_same_password);
    $result_same_password = mysqli_fetch_array($query_same_password, MYSQLI_ASSOC);
    if (md5($_POST['origin-password']) != $result_same_password['password']) {
        echo "<script>alert('รหัสผ่านเดิมผิดพลาด');</script>";
        header("Refresh:0 , url=./index.php");
        exit();
    }
    if ($password == $result_same_password['password']) {
        echo "<script>alert('กรุณาเปลี่ยนรหัสผ่านใหม่ เนื่องจากรหัสผ่านซ้ำ');</script>";
        header("Refresh:0 , url=./index.php");
        exit();
    } else {
        $sql_update  = "UPDATE students SET password='" . $password . "' WHERE username='" . $username . "'";
        if (mysqli_query($conn, $sql_update)) {
            echo "<script>alert('เปลี่ยนรหัสผ่านเสร็จสิ้น');</script>";
            header("Refresh:0 , url=./index.php");
            exit();
        }
    }
} else {
    echo "<script>alert('กรุณากรอกรหัสผ่าน');</script>";
    header("Refresh:0 , url=./index.php");
    exit();
}
