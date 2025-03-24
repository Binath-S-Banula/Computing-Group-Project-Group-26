<?php
/* include '../Database/db_connect.php'; */
include_once __DIR__ . '/../assets/db_connect.php';

// Fetch Faculties & Degrees
$faculties = mysqli_query($conn, "SELECT * FROM faculties");

// Fetch Batches & Timetable Count
$batch_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM batches"))['count'];
$timetable_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM timetables"))['count'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="../css/common_styles.css">
    <link rel="stylesheet" href="admindb.css">

</head>

<body>

    <?php include '../assets/navbar.php'; ?>

    <div class="dashboard-container">
        <!-- Dashboard Header -->
        <div class="d-flex align-items-center justify-content-between dashboard-header">
            <h2><i class="fa-tachometer-alt fas me-2"></i> Admin Dashboard</h2>
            <a href="faculties.php" class="text-decoration-none action-button">
                <i class="fa-plus fas me-2"></i> Add Faculty
            </a>
        </div>

        <!-- Statistics Section -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="text-center stats-card">
                    <div class="stat-icon">
                        <i class="fa-users fas"></i>
                    </div>
                    <div class="stat-value"><?= $batch_count ?></div>
                    <div class="stat-label">Total Batches</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center stats-card">
                    <div class="stat-icon">
                        <i class="fa-calendar-alt fas"></i>
                    </div>
                    <div class="stat-value"><?= $timetable_count ?></div>
                    <div class="stat-label">Total Timetables</div>
                </div>
            </div>
        </div>

        <!-- Faculties & Degrees Section -->
        <div class="row">
            <div class="col-12">
                <h4 class="mb-3">Faculties & Degrees</h4>
                <?php while ($faculty = mysqli_fetch_assoc($faculties)) : ?>
                <div class="faculty-card">
                    <div class="faculty-header">
                        <span><i class="fa-university fas me-2"></i><?= $faculty['name'] ?></span>
                        <span class="badge bg-light text-dark">Faculty</span>
                    </div>
                    <div class="faculty-body">
                        <?php
                        $faculty_id = $faculty['id'];
                        $degrees = mysqli_query($conn, "SELECT * FROM degrees WHERE faculty_id=$faculty_id");
                        $degree_count = mysqli_num_rows($degrees);
                        
                        if ($degree_count > 0) {
                            while ($degree = mysqli_fetch_assoc($degrees)) {
                                echo "<div class='degree-item'><i class='fa-graduation-cap fas me-2'></i>{$degree['name']}</div>";
                            }
                        } else {
                            echo "<div class='alert alert-light'>No degrees added yet.</div>";
                        }
                        ?>
                        <a href="degrees.php?faculty=<?= $faculty_id ?>"
                            class="text-decoration-none add-degree-btn mt-3">
                            <i class="fa-plus fas me-2"></i> Add Degree
                        </a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>

        <!-- Other Actions Section -->
        <div class="action-section">
            <h4><i class="fa-cogs fas me-2"></i>Other Actions</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <a href="batches.php" class="text-decoration-none">
                        <div class="action-card">
                            <div class="action-icon">
                                <i class="fa-users fas"></i>
                            </div>
                            <h5>Manage Batches</h5>
                            <p class="text-muted">Create, edit, and delete student batches</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="timetables.php" class="text-decoration-none">
                        <div class="action-card">
                            <div class="action-icon">
                                <i class="fa-calendar-alt fas"></i>
                            </div>
                            <h5>Manage Timetables</h5>
                            <p class="text-muted">Create and manage class schedules</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php include '../assets/footer.php'; ?>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>