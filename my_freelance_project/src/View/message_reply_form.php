<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Répondre au Message</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php require __DIR__ . '/partials/navbar.php'; ?>

    <h1> Répondre au Message</h1>

    <?php
    
    ?>
<div class="form-p">
<form method="POST" action="index.php?controller=message&action=replySubmit">
        <input type="hidden" name="project_id" value="<?= htmlspecialchars($parentMessage['project_id']) ?>">
        
        <input type="hidden" name="parent_id" value="<?= htmlspecialchars($parentMessage['message_id']) ?>">

        <div>
            <label>Réponse:</label><br>
            <textarea name="message_content" rows="5" cols="40" required></textarea>
        </div>
        <br>
        <button class="button-23" type="submit">Envoyer une réponse </button>
    </form>

    <p>
        <a href="index.php?controller=message&action=viewMessages&project_id=<?= htmlspecialchars($parentMessage['project_id']) ?>">
               Annuler        </a>
    </p>
</div>
</body>

<div class="footer">
        <p>&copy; 2023 - Votre Plateforme Freelance</p>
    </div>
</html>
