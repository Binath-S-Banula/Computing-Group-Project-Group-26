<?php
include_once __DIR__ . '/../assets/db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT file_path FROM timetables WHERE id=$id");
    $file = mysqli_fetch_assoc($result)['file_path'];

    if (unlink("../" . $file)) {
        mysqli_query($conn, "DELETE FROM timetables WHERE id=$id");
    }
}

header("Location: timetables.php");
exit;
?>
