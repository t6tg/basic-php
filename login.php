<?php
if (trim($_POST['username']) == null || trim($_POST['password']) == null) {
    echo "<script>alert('กรุณากรอกข้อมูล');</script>";
    header("Refresh:0 , url=index.html");
} else {
    require_once "./Database/Database.php";
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $sql = "SELECT username,password FROM students WHERE username='" . $username . "' and password='" . $password . "'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if (!$result) {
        echo "<script>alert('ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง');</script>";
        header("Refresh:0 , url=logout.php");
    } else {
        session_start();
        $_SESSION['username'] = $result['username'];
        header("Location:main/");
        session_write_close();
    }
}
mysqli_close($conn);
