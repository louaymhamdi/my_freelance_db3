<!-- project_create.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Project</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php require __DIR__ . '/partials/navbar.php'; ?>

    <h1>Créer un nouveau projet</h1>
    <div class="form-p">
    <form method="POST" action="index.php?controller=project&action=create">
        <div>
            <label>Titre:</label><br>
            <input type="text" name="title" required>
        </div>
        <br>
        <div>
            <label>Description:</label><br>
            <textarea name="description" rows="5" cols="40" required></textarea>
        </div>
        <br>
        <div>
            <label>Budget:</label><br>
            <input type="number" name="budget" step="0.01" min="0">
        </div>
        <br>
        <div>
            <label>Deadline (YYYY-MM-DD):</label><br>
            <input type="date" name="deadline">
        </div>
        <br>
        <button type="submit">Créer un projet</button>
    </form>
</div>
</body>

<div class="footer">
        <p>&copy; 2023 - Votre Plateforme Freelance</p>
    </div>
</html>
