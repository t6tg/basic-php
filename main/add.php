<?php
session_start();
require_once "../Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('กรุณาเข้าสู่ระบบ');</script>";
    header("Refresh:0 , url=../index.html");
}
if ($_POST['text_todo'] != null) {
    $sql = "INSERT INTO todos (todo) VALUES ('" . trim($_POST['text_todo']) . "')";
    if ($conn->query($sql)) {
        echo "<script>alert('บันทึกสำเร็จ');</script>";
        header("Refresh:0 , url=todo.php");
    } else {
        echo "<script>alert('บันทึกไม่สำเร็จ');</script>";
        header("Refresh:0 , url=todo.php");
    }
} else {
    echo "<script>alert('กรุณากรอกข้อมูล');</script>";
    header("Refresh:0 , url=todo.php");
}
