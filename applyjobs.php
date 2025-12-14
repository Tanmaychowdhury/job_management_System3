<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['user_name'];

$sql = "SELECT * FROM jobs";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="dashboard.php" class="text-decoration-none fw-bold text-primary">← Back</a>
            <h3 class="text-primary m-0">Available Jobs</h3>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Job Type</th>
                            <th>Salary</th>
                            <th>Experience</th>
                            <th>Skills</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= ($row['job_title']); ?></td>
                                <td><?= ($row['company_name']); ?></td>
                                <td><?= ($row['location']); ?></td>
                                <td><?= ($row['job_type']); ?></td>
                                <td><?= ($row['salary']); ?></td>
                                <td><?= ($row['experience']); ?></td>
                                <td><?= ($row['skills']); ?></td>
                                <td>
                                    <img src="uploads/<?= ($row['job_image']); ?>" width="60" height="60" class="rounded border">
                                </td>
                                <td>
                                    <a href="apply.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-success text-white">Apply Now</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
