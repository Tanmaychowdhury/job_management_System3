<?php
session_start();
include "db.php";

$sql = "SELECT 
    applications.id AS app_id,
    users.name AS user_name,
    users.email,
    users.photo,
    users.resume,
    jobs.job_title,
    jobs.company_name,
    applications.applied_at
FROM applications
JOIN users ON applications.user_id = users.id
JOIN jobs ON applications.job_id = jobs.id
ORDER BY applications.applied_at DESC";


$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Applicants</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
  <div class="container mt-5 bg-white p-4 rounded shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="text-primary">View Applicants</h2>
      <a href="dashboard.php" class="btn btn-primary btn-sm">← Back</a>
    </div>

    ```
    <table class="table table-striped table-hover text-center align-middle">
      <thead class="table-primary">
        <tr>
          <th scope="col">SL No.</th>
          <th scope="col">User Name</th>
          <th scope="col">Photo</th>
          <th scope="col">view resume</th>
          <th scope="col">Job Title</th>
          <th scope="col">Company Name</th>
          <th scope="col">Applied At</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?= $i++ ?></td>
            <td><?= $row['user_name']; ?></td>
            <td>
              <img src="../uploads/<?= $row['photo']; ?>" width="60" height="60" style="border-radius:50%;">
            </td>
            <td>
              <a href="view_resume.php?file=<?= urlencode($row['resume']); ?>" class="btn btn-outline-primary btn-sm" target="_blank">
                View Resume
              </a>
            </td>
            <td><?= $row['job_title']; ?></td>
            <td><?= $row['company_name']; ?></td>
            <td><?= $row['applied_at']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>


  </div>
</body>

</html>