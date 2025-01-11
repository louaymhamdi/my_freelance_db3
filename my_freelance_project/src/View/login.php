<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    <!-- Bootstrap CSS (Bootstrap 5) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Optional: Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Alpine.js (CDN) -->
    <script src="https://unpkg.com/alpinejs" defer></script>
    
    <!-- Your Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require __DIR__ . '/partials/navbar.php'; ?>
    
    <div class="container mt-5">
        <h1 class="mb-4">Login</h1>
        
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <form class="needs-validation" x-data="{ username: '', password: '' }" method="POST" novalidate>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="username" 
                    name="username" 
                    x-model="username" 
                    required 
                    placeholder="Enter your username"
                >
                <div class="invalid-feedback">
                    Please enter your username.
                </div>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password" 
                    x-model="password" 
                    required 
                    placeholder="Enter your password"
                >
                <div class="invalid-feedback">
                    Please enter your password.
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
    
    <!-- Bootstrap JS (Bootstrap 5) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Optional: Bootstrap Validation Script -->
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
