<?php
include_once __DIR__ . '/../assets/db_connect.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    mysqli_query($conn, "INSERT INTO faculties (name) VALUES ('$name')");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM faculties WHERE id=$id");
}
?>
<h2>Manage Faculties</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Faculty Name" required>
    <button type="submit" name="add">Add Faculty</button>
</form>

<table>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM faculties");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['name']}</td><td><a href='?delete={$row['id']}'>Delete</a></td></tr>";
    }
    ?>
</table>
