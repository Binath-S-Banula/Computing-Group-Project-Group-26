<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();

include_once __DIR__ . '/../assets/db_connect.php';
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request.");
}

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
$filePath = isset($_POST['file_path']) ? realpath(__DIR__ . '/../' . $_POST['file_path']) : '';

if (!$id || !$filePath || !file_exists($filePath)) {
    die("File not found.");
}

// Load the spreadsheet
try {
    $spreadsheet = IOFactory::load($filePath);
    $worksheet = $spreadsheet->getActiveSheet();
} catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
    die("Error loading spreadsheet: " . $e->getMessage());
}

// Get submitted data
$data = $_POST['data'] ?? [];

foreach ($data as $rowIndex => $row) {
    foreach ($row as $colIndex => $cellValue) {
        // Convert column index (1-based) to Excel-style letters (A, B, C...)
        $colLetter = Coordinate::stringFromColumnIndex($colIndex + 1);
        $excelCell = $colLetter . ($rowIndex + 1);

        // Convert newlines back to <br> for Excel formatting
        $formattedValue = str_replace("\n", "<br>", $cellValue);

        // Set cell value
        $worksheet->setCellValue($excelCell, $formattedValue);
    }
}

// Save changes
try {
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save($filePath);
    echo "Timetable updated successfully! <a href='edit_timetable.php?id=$id'>Go Back</a>";
} catch (\PhpOffice\PhpSpreadsheet\Writer\Exception $e) {
    die("Error saving spreadsheet: " . $e->getMessage());
}

ob_end_flush();
?>
