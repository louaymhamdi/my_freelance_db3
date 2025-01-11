<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project List</title>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php require __DIR__ . '/partials/navbar.php'; ?>

    <h1>Open Projects</h1>
    <div class="button-23">
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'recruiter'): ?>
            <a href="index.php?controller=project&action=create">Créer un nouveau projet</a>
        <?php endif; ?>
    </div>
    <br></br>

    <?php foreach ($projects as $project): ?>
        <div class="project" >
            <h2><?= htmlspecialchars($project['title']) ?></h2>
            <p><strong>Recruiter:</strong> <?= htmlspecialchars($project['recruiter_name']) ?></p>
            <p><strong>Budget:</strong> <?= htmlspecialchars($project['budget']) ?></p>
            <p><strong>Deadline:</strong> <?= htmlspecialchars($project['deadline']) ?></p>
            <p><?= nl2br(htmlspecialchars($project['description'])) ?></p>
            
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'freelancer'): ?>
                <a href="index.php?controller=message&action=send&project_id=<?= $project['project_id'] ?>">
                    Envoyer un Offre
                </a>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</body>

<div class="footer">
        <p>&copy; 2023 - Votre Plateforme Freelance</p>
    </div>
</html>
