<?php
include_once __DIR__ . '/../assets/db_connect.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $faculty_id = $_POST['faculty_id'];
    mysqli_query($conn, "INSERT INTO degrees (name, faculty_id) VALUES ('$name', $faculty_id)");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM degrees WHERE id=$id");
}
?>

<h2>Manage Degrees</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Degree Name" required>
    <select name="faculty_id">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM faculties");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['id']}'>{$row['name']}</option>";
        }
        ?>
    </select>
    <button type="submit" name="add">Add Degree</button>
</form>

<table>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM degrees");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['name']}</td><td><a href='?delete={$row['id']}'>Delete</a></td></tr>";
    }
    ?>
</table>
