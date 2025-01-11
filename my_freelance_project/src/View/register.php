<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    
    <!-- Bootstrap CSS (Bootstrap 5) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!--  Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Alpine.js (CDN) -->
    <script src="https://unpkg.com/alpinejs" defer></script>
    
    <!--  Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require __DIR__ . '/partials/navbar.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Register</h1>
        
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <form class="needs-validation" x-data="{ username: '', password: '', role: '' }" method="POST" novalidate>
            <!-- Username Field -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="username" 
                    name="username" 
                    x-model="username" 
                    required 
                    placeholder=" Username"
                >
                <div class="invalid-feedback">
                     Username.
                </div>
            </div>
            
            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password" 
                    x-model="password" 
                    required 
                    placeholder=" Password"
                >
                <div class="invalid-feedback">
                    Please enter your password.
                </div>
            </div>
            
            <!-- Role Selection Field -->
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select 
                    class="form-select" 
                    id="role" 
                    name="role" 
                    x-model="role"
                    required
                >
                    <option value="" disabled selected> Choisissez votre role</option>
                    <option value="recruiter">Recruiter</option>
                    <option value="freelancer">Freelancer</option>
                </select>
                <div class="invalid-feedback">
                    Please select a role.
                </div>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>
    </div>
    
    <!-- Bootstrap JS (Bootstrap 5) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Bootstrap Validation Script -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'
        
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
        
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
        
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

<div class="footer">
        <p>&copy; 2023 - Votre Plateforme Freelance</p>
    </div>
</html>
