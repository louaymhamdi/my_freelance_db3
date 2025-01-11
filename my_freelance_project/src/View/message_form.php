<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Envoyer un  Offre </title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php require __DIR__ . '/partials/navbar.php'; ?>

<h1>Envoyer un Offre </h1>

<div class="form-p">
<form method="POST" action="index.php?controller=message&action=send">
    <?php if (!empty($_GET['project_id'])): ?>
        <input type="hidden" name="project_id" value="<?= htmlspecialchars($_GET['project_id']) ?>">
    <?php endif; ?>
    
        <label for="message_content">Message :</label><br>
        <textarea name="message_content" id="message_content" rows="5" cols="40" required></textarea>
        <br></br>
        <button class= "button-23"type="submit">Enovyer</button>

    </div>
</form>

</div>
</body>

<div class="footer">
        <p>&copy; 2023 - Votre Plateforme Freelance</p>
    </div>
</html>
