<?php
session_start();
include "db.php";

$sql = "SELECT * FROM jobs";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4 bg-light">

    <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
  <a href="dashboard.php" class="mb-0 text-primary">← Back</a>
  <h4 class="mb-0 text-primary">Add New Job</h4>
</div>

        <table class="table table-bordered table-hover bg-white shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Job Title</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Job Type</th>
                    <th>Salary</th>
                    <th>Experience</th>
                    <th>Qualification</th>
                    <th>skills</th>
                    <th>description</th>
                    <th>Deadline</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row['job_title']; ?></td>
                        <td><?= $row['company_name']; ?></td>
                        <td><?= $row['location']; ?></td>
                        <td><?= $row['job_type']; ?></td>
                        <td><?= $row['salary']; ?></td>
                        <td><?= $row['experience']; ?></td>
                        <td><?= $row['qualification']; ?></td>
                        <td><?= $row['skills']; ?></td>
                        <td><?= $row['description']; ?></td>
                        <td><?= $row['deadline']; ?></td>
                        <td>

                            <img src="../uploads/<?= $row['job_image']; ?>" width="60" height="60" class="rounded">

                        </td>
                        <td class="d-flex gap-2">
                            <a href="admin_edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="admin_delete.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>