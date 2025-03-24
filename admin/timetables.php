<?php
include_once __DIR__ . '/../assets/db_connect.php';

$result = mysqli_query($conn, "SELECT * FROM timetables");
?>

<h2>Manage Timetables</h2>
<a href="upload_timetable.php">Upload New Timetable</a>

<table>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['degree'] ?></td>
            <td><?= $row['batch'] ?></td>
            <td><a href="edit_timetable.php?id=<?= $row['id'] ?>">Edit</a></td>
            <td><a href="../<?= $row['file_path'] ?>" download>Download</a></td>
            <td><a href="delete_timetable.php?id=<?= $row['id'] ?>">Delete</a></td>
        </tr>
    <?php endwhile; ?>
</table>
