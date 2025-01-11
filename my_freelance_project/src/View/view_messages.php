<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Project Messages</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php require __DIR__ . '/partials/navbar.php'; ?>

    <h1>Messages pour votre projet "<?= htmlspecialchars($project['title'] ?? 'Unknown') ?>"</h1>

    <?php if (!empty($messages)): ?>
        <?php foreach ($messages as $msg): ?>
            <div style="border:1px solid #ccc; padding:8px; margin:8px 0;">
                <p><strong>Depuis:</strong> <?= htmlspecialchars($msg['sender_name']) ?></p>
                <p><strong>Envoyé à:</strong> <?= htmlspecialchars($msg['sent_at']) ?></p>
                <p><?= nl2br(htmlspecialchars($msg['message_content'])) ?></p>
                <a href="index.php?controller=project&action=hireFreelancer
    &project_id=<?= $msg['project_id'] ?>
    &freelancer_id=<?= $msg['sender_id'] ?>">
    Embauchez 
</a>


                <?php if (!empty($msg['parent_id'])): ?>
                    <p><em>(Ceci est une réponse au message #<?= htmlspecialchars($msg['parent_id']) ?>)</em></p>
                <?php else: ?>
                    <p><em>(Ceci est un message de niveau supérieur)</em></p>
                <?php endif; ?>

                <a href="index.php?controller=message&action=replyForm&message_id=<?= $msg['message_id'] ?>">
                    Répondre
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Pas encore de messages pour ce projet.</p>
    <?php endif; ?>

    <p><a href="index.php?controller=project&action=myProjects">Retour à Mes projets</a></p>
</body>

<div class="footer">
        <p>&copy; 2023 - Votre Plateforme Freelance</p>
    </div>
</html>
