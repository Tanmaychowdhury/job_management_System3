<?php 
session_start();
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM jobs WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Job</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <form action="admin_upgrade.php" method="POST" enctype="multipart/form-data" class="p-4 bg-white rounded shadow-sm">
      
      <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="dashboard.php" class="text-primary text-decoration-none">← Back</a>
        <h4 class="mb-0 text-primary">Edit Job</h4>
      </div>

      <input type="hidden" name="id" value="<?= $row['id']; ?>">

      <div class="mb-3">
        <label>Job Title</label>
        <input type="text" name="job_title" class="form-control" value="<?= $row['job_title']; ?>" required>
      </div>

      <div class="mb-3">
        <label>Company Name</label>
        <input type="text" name="company_name" class="form-control" value="<?= $row['company_name']; ?>" required>
      </div>

      <div class="mb-3">
        <label>Location</label>
        <input type="text" name="location" class="form-control" value="<?= $row['location']; ?>" required>
      </div>

      <div class="mb-3">
        <label>Job Type</label>
        <select name="job_type" class="form-select" required>
          <option value="Full-time" <?= ($row['job_type'] == 'Full-time') ? 'selected' : ''; ?>>Full-time</option>
          <option value="Part-time" <?= ($row['job_type'] == 'Part-time') ? 'selected' : ''; ?>>Part-time</option>
          <option value="Internship" <?= ($row['job_type'] == 'Internship') ? 'selected' : ''; ?>>Internship</option>
          <option value="Remote" <?= ($row['job_type'] == 'Remote') ? 'selected' : ''; ?>>Remote</option>
        </select>
      </div>

      <div class="mb-3">
        <label>Salary Range</label>
        <input type="text" name="salary" class="form-control" value="<?= $row['salary']; ?>">
      </div>

      <div class="mb-3">
        <label>Experience Required</label>
        <input type="text" name="experience" class="form-control" value="<?= $row['experience']; ?>">
      </div>

      <div class="mb-3">
        <label>Qualification</label>
        <input type="text" name="qualification" class="form-control" value="<?= $row['qualification']; ?>">
      </div>

      <div class="mb-3">
        <label>Skills Required</label>
        <textarea name="skills" class="form-control" rows="2"><?= $row['skills']; ?></textarea>
      </div>

      <div class="mb-3">
        <label>Job Description</label>
        <textarea name="description" class="form-control" rows="3" required><?= $row['description']; ?></textarea>
      </div>

      <div class="mb-3">
        <label>Application Deadline</label>
        <input type="date" name="deadline" class="form-control" value="<?= $row['deadline']; ?>" required>
      </div>

      <div class="mb-3">
        <label>Company Logo (optional)</label>
        <input type="file" name="job_image" class="form-control">
        
          <p class="mt-2 mb-1 text-muted">Current Image:</p>
          <img src="../uploads/<?= $row['job_image']; ?>" alt="Company Logo" style="width:100px; border-radius:5px;">
       
      </div>

      <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-select">
          <option value="active" <?= ($row['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
          <option value="inactive" <?= ($row['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary w-100">Update Job</button>

    </form>
  </div>

</body>
</html>
