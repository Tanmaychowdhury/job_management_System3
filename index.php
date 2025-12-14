<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4 bg-light">

    <div class="container">
        <h3 class="mb-4 text-center text-primary">Job Application Form</h3>

        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">full name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="enter full name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">phone</label>
                <input type="phone" class="form-control" id="phone" name="phone" placeholder="enter your phone number" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" placeholder="date of birth" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">gender</label>
                <select name="gender" class="form-control">

                    <option value="male">male</option>
                    <option value="female">female</option>
                    <option value="other">other</option>
                </select>
            </div>



            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <select class="form-control" name="country" id="country" required>
                    <option value="">→ Select Country ←</option>
                    <option value="india">India</option>
                    <option value="australia">Australia</option>
                    <option value="england">England</option>
                    <option value="united_states">United States</option>
                    <option value="bangladesh">Bangladesh</option>
                </select>
            </div>

            
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <select class="form-control" name="state" id="state" required>
                    <option value="">→ Select State ←</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="education" class="form-label">education</label>
                <select name="education" class="form-control">

                    <option value="Highest Qualification">Highest Qualification</option>
                    <option value="">University / Board</option>
                    <option value="other">Passing Year</option>
                    <option value="other">Percentage / Grade</option>

                </select>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">photo</label>
                <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="resume" class="form-label">upload resume</label>
                <input type="file" class="form-control" id="resume" name="resume" accept=".pdf,.doc,.docx">
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">Languages Known</label>
                <select class="form-control" id="language" name="language">
                    <option value="english">English</option>
                    <option value="hindi">Hindi</option>
                    <option value="bengali">Bengali</option>
                    <option value="urdu">Urdu</option>
                </select>

            </div>

            <div class="row mb-3">
                
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                

                <div class="row mb-3">
                    
                        <label class="form-label">conform Password</label>
                        <input type="password" name="conform_password" class="form-control" required>
                        <br>
                </div>
                   
                    <br><br>


                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                        <a href="login.php" class="btn btn-secondary">Log In</a>
                    </div>






        </form>
    </div>



    <script>
        
        const states = {
            india: ["West Bengal", "Maharashtra", "Delhi", "Karnataka"],
            australia: ["Perth", "Sydney", "New South Wales", "Victoria"],
            england: ["London", "Manchester", "Birmingham"],
            united_states: ["California", "Texas", "New York", "Florida"],
            bangladesh: ["Dhaka", "Chittagong", "Khulna", "Rajshahi"]
        };

        const countrySelect = document.getElementById('country');
        const stateSelect = document.getElementById('state');

      
        countrySelect.addEventListener('change', function() {
            const selectedCountry = this.value;

            
            stateSelect.innerHTML = '<option value="">→ Select State ←</option>';

            
            if (selectedCountry && states[selectedCountry]) {
               
                states[selectedCountry].forEach(state => {
                    const option = document.createElement('option');
                    option.textContent = state;
                    option.value = state.toLowerCase().replace(/\s+/g, '_');
                    stateSelect.appendChild(option);
                });
            }
        });
    </script>

</body>

</html>