<?php
session_start();
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_title = $_POST['job_title'];
    $company_name = $_POST['company_name'];
    $location = $_POST['location'];
    $job_type = $_POST['job_type'];
    $salary = $_POST['salary'];
    $experience = $_POST['experience'];
    $qualification = $_POST['qualification'];
    $skills = $_POST['skills'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];


    $job_image = $_FILES['job_image']['name'];
    $job_tmp = $_FILES['job_image']['tmp_name'];
    $ext = strtolower(pathinfo($job_image, PATHINFO_EXTENSION));
    $allowed = ['png', 'jpeg', 'jpg'];

    if (in_array($ext, $allowed)) {
        $folder = "../uploads/";
        $job_path = $folder . basename($job_image);
        move_uploaded_file($job_tmp, $job_path);
    } else {
        $job_image = "";
    }

    $sql = "INSERT INTO jobs(job_title, company_name, location, job_type, salary, experience, qualification, skills, description, deadline, job_image, status)
      VALUES('$job_title','$company_name','$location','$job_type','$salary','$experience','$qualification','$skills','$description','$deadline','$job_image','$status')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
        alert('✅ Job added successfully!');
        
    </script>";
    } else {
        echo "<script>
        alert('❌ Error while adding job!');
    </script>";
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ekhane jei jobs form tah banabo seta user dekhte pabe user pennel a</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>

<body>


    <form action="" method="POST" enctype="multipart/form-data" class="p-3 bg-light rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="dashboard.php" class="mb-0 text-primary">← Back</a>
            <h4 class="mb-0 text-primary">Add New Job</h4>
        </div>

        <div class="mb-3">
            <label>Job Title</label>
            <input type="text" name="job_title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Company Name</label>
            <input type="text" name="company_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Job Type</label>
            <select name="job_type" class="form-select">
                <option>Full-time</option>
                <option>Part-time</option>
                <option>Internship</option>
                <option>Remote</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Salary Range</label>
            <input type="text" name="salary" class="form-control" placeholder="e.g. ₹15000 - ₹25000">
        </div>

        <div class="mb-3">
            <label>Experience Required</label>
            <input type="text" name="experience" class="form-control" placeholder="e.g. 0–2 years">
        </div>

        <div class="mb-3">
            <label>Qualification</label>
            <input type="text" name="qualification" class="form-control" placeholder="e.g. B.Tech / Graduate">
        </div>

        <div class="mb-3">
            <label>Skills Required</label>
            <textarea name="skills" class="form-control" rows="2" placeholder="HTML, CSS, PHP"></textarea>
        </div>

        <div class="mb-3">
            <label>Job Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label>Application Deadline</label>
            <input type="date" name="deadline" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Company Logo (optional)</label>
            <input type="file" name="job_image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option>Active</option>
                <option>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">Post Job</button>
    </form>


</body>

</html>