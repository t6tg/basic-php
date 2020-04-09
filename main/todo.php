<?php
session_start();
require_once "../Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('กรุณาเข้าสู่ระบบ');</script>";
    header("Refresh:0 , url=../index.html");
}

$name = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM todos ORDER BY id DESC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
    <title>To do app</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <a href="./index.php">
            <- กลับสู่หน้าหลัก</a> <h3>เพิ่ม Todo</h3>
                <?php if (!$_GET['id']) { ?>
                    <form action="./add.php" method="post">
                        <div class="form-group">
                            <input name="text_todo" type="text" class="form-control" aria-describedby="helpId" placeholder="จะทำอะไรบอกเราหน่อยสิ๊~~~"><br>
                            <button type="submit" name="submit" style="float:right" class="btn btn-success">เพิ่มข้อมูล</button>
                        </div>
                    </form>
                <?php } else { ?>
                    <form action="./edit.php" method="post">
                        <div class="form-group">
                            <input name="text_todo" value="<?php echo $_GET['message']; ?>" type="text" class="form-control" aria-describedby="helpId" placeholder="จะทำอะไรบอกเราหน่อยสิ๊~~~"><br>
                            <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id" />
                            <button type="submit" name="submit" style="float:right" class="btn btn-success">แก้ไขข้อมูล</button>
                        </div>
                    </form>
                <?php } ?>
                <h3>Todos</h3>
                <?php while ($row = mysqli_fetch_array($query)) { ?>
                    <ul class="list-group" style="padding: 10px">
                        <li class="list-group-item"><?php echo $row['todo'] ?><br><span style="font-size: 12px ; color : #999"><?php echo $row['time_stamp'] ?></span>
                            <a name="id" href="delete.php?id=<?php echo $row['id'] ?>" style="float:right" class="btn btn-danger" role="button">
                                Delete
                            </a>
                            <a name="edit" href="todo.php?id=<?php echo $row['id'] ?>&message=<?php echo $row['todo']; ?>" style="float:right" class="btn btn-warning" role="button">
                                Edit
                            </a>
                        </li>
                    </ul>
                <?php } ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>