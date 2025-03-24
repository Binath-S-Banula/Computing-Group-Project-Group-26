<?php
include_once __DIR__ . '/../assets/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $degree_id = $_POST['degree'];
    $batch = $_POST['batch'];
    $file = $_FILES['file'];

    // Get Degree Name
    $degree_query = mysqli_query($conn, "SELECT name FROM degrees WHERE id=$degree_id");
    $degree_row = mysqli_fetch_assoc($degree_query);
    $degree_name = str_replace(' ', '_', $degree_row['name']); // Replace spaces with underscores

    // File Rename
    $new_filename = $degree_name . "_" . $batch . ".xlsx";
    $destination = "timetables/" . $new_filename;
    
    if (move_uploaded_file($file['tmp_name'], "../" . $destination)) {
        // Insert into DB
        mysqli_query($conn, "INSERT INTO timetables (degree, batch, file_path) VALUES ('$degree_name', '$batch', '$destination')");
        echo "Timetable uploaded successfully!";
    } else {
        echo "Upload failed!";
    }
}
?>

<h2>Upload Timetable</h2>
<form method="POST" enctype="multipart/form-data">
    <label>Select Degree:</label>
    <select name="degree" required>
        <option value="">Select Degree</option>
        <?php
        $degrees = mysqli_query($conn, "SELECT * FROM degrees");
        while ($row = mysqli_fetch_assoc($degrees)) {
            echo "<option value='{$row['id']}'>{$row['name']}</option>";
        }
        ?>
    </select>

    <label>Select Batch:</label>
    <select name="batch" required>
        <option value="">Select Batch</option>
        <?php
        $batches = mysqli_query($conn, "SELECT * FROM batches");
        while ($row = mysqli_fetch_assoc($batches)) {
            echo "<option value='{$row['name']}'>{$row['name']}</option>";
        }
        ?>
    </select>

    <label>Upload File:</label>
    <input type="file" name="file" accept=".xlsx" required>

    <button type="submit">Upload</button>
</form>
