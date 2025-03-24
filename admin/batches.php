<?php
include_once __DIR__ . '/../assets/db_connect.php';

// Add a batch
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    mysqli_query($conn, "INSERT INTO batches (name) VALUES ('$name')");
}

// Delete a batch
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM batches WHERE id=$id");
}
?>

<h2>Manage Batches</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Batch Name (e.g., 2024.1)" required>
    <button type="submit" name="add">Add Batch</button>
</form>

<table>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM batches");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['name']}</td><td><a href='?delete={$row['id']}'>Delete</a></td></tr>";
    }
    ?>
</table>
