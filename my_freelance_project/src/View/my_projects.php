<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mes Projets</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php require __DIR__ . '/partials/navbar.php'; ?>

    <h1>Mes Projets</h1>
    <div class="project" >

    <?php if (!empty($projects)): ?>
        <ul>
            <?php foreach ($projects as $project): ?>
                <li>
                    <strong><?= htmlspecialchars($project['title']) ?></strong> 
                    (Status: <?= htmlspecialchars($project['status']) ?>)

                    <a href="index.php?controller=message&action=viewMessages&project_id=<?= $project['project_id'] ?>">
                    Afficher les messages
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Vous n'avez pas encore posté de projets.</p>
    <?php endif; ?>


    <p><a href="index.php"> Home</a></p>
</body>
</html>
