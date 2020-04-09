<?php
session_start();
require_once "../Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('กรุณาเข้าสู่ระบบ');</script>";
    header("Refresh:0 , url=../index.html");
    exit();
}

$delete_num = $_GET['id'];
$sql_delete = "DELETE FROM todos WHERE id='$delete_num'";
$query_delete = mysqli_query($conn, $sql_delete);
$row = mysqli_fetch_assoc($query_delete, MYSQLI_ASSOC);
if (!$row) {
    echo "ลบสำเร็จ .....";
    header("Refresh: 1 , url=todo.php");
    exit();
} else {
    echo "ลบไม่สำเร็จ .....";
    header("Refresh: 1 , url=todo.php");
    exit();
}
