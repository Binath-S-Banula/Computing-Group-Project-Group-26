<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();

include_once __DIR__ . '/../assets/db_connect.php';
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid request.");
}

$id = (int) $_GET['id'];

// Fetch timetable details
$result = mysqli_query($conn, "SELECT * FROM timetables WHERE id = $id");

if (!$result || mysqli_num_rows($result) == 0) {
    die("Timetable entry not found.");
}

$row = mysqli_fetch_assoc($result);
$filePath = realpath(__DIR__ . '/../' . $row['file_path']);

if (!$filePath || !file_exists($filePath)) {
    die("File not found: " . htmlspecialchars($row['file_path']));
}

if (!is_readable($filePath)) {
    die("File is not readable: " . htmlspecialchars($filePath));
}

// Try loading the Excel file
try {
    $spreadsheet = IOFactory::load($filePath);
    $worksheet = $spreadsheet->getActiveSheet();
    $data = $worksheet->toArray();
} catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
    die("Error reading spreadsheet: " . $e->getMessage());
}

// Get merged cells from worksheet
$mergedCells = $worksheet->getMergeCells();
$mergedMap = [];

// Map merged cells
foreach ($mergedCells as $mergedRange) {
    [$startCell, $endCell] = explode(':', $mergedRange);
    [$startCol, $startRow] = Coordinate::coordinateFromString($startCell);
    [$endCol, $endRow] = Coordinate::coordinateFromString($endCell);

    $startColIndex = Coordinate::columnIndexFromString($startCol);
    $endColIndex = Coordinate::columnIndexFromString($endCol);

    for ($r = $startRow; $r <= $endRow; $r++) {
        for ($c = $startColIndex; $c <= $endColIndex; $c++) {
            $mergedMap["$r-$c"] = [
                'master' => ($r === $startRow && $c === $startColIndex),
                'rowspan' => ($endRow - $startRow + 1),
                'colspan' => ($endColIndex - $startColIndex + 1),
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Timetable</title>
    <style>
        textarea { width: 100px; height: 40px; }
        table { border-collapse: collapse; }
        td, th { border: 1px solid black; padding: 5px; text-align: center; }
    </style>
</head>
<body>
    <h2>Edit Timetable: <?= htmlspecialchars($row['degree']) ?> - <?= htmlspecialchars($row['batch']) ?></h2>
    <form action="save_timetable.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="file_path" value="<?= $row['file_path'] ?>">

        <table>
            <?php foreach ($data as $rowIndex => $row): ?>
                <tr>
                    <?php foreach ($row as $colIndex => $cell): ?>
                        <?php
                        $rowNumber = $rowIndex + 1;
                        $colNumber = $colIndex + 1;

                        if (isset($mergedMap["$rowNumber-$colNumber"])) {
                            $mergeInfo = $mergedMap["$rowNumber-$colNumber"];

                            if (!$mergeInfo['master']) {
                                continue; // Skip non-master merged cells
                            }

                            $rowSpan = $mergeInfo['rowspan'];
                            $colSpan = $mergeInfo['colspan'];
                        } else {
                            $rowSpan = 1;
                            $colSpan = 1;
                        }

                        // Ensure cell is not null
                        $cellValue = $cell !== null ? str_replace('<br>', "\n", $cell) : '';
                        ?>
                        <td rowspan="<?= $rowSpan ?>" colspan="<?= $colSpan ?>">
                            <textarea name="data[<?= $rowIndex ?>][<?= $colIndex ?>]"><?= htmlspecialchars($cellValue) ?></textarea>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>

        <button type="submit">Save Changes</button>
    </form>
</body>
</html>

<?php ob_end_flush(); ?>
