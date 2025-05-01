<?php
$name = $email = $subject = $message = "";
$nameErr = $emailErr = $subjectErr = $messageErr = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    // Meno
    if (empty(trim($_POST["userName"]))) {
        $nameErr = "Meno je povinné.";
        $isValid = false;
    } else {
        $name = htmlspecialchars(trim($_POST["userName"]));
    }

    // Email
    if (empty(trim($_POST["mail"]))) {
        $emailErr = "Email je povinný.";
        $isValid = false;
    } elseif (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Neplatný formát e-mailu.";
        $isValid = false;
    } else {
        $email = htmlspecialchars(trim($_POST["mail"]));
    }

    // Predmet
    if (empty(trim($_POST["subject"]))) {
        $subjectErr = "Predmet je povinný.";
        $isValid = false;
    } else {
        $subject = htmlspecialchars(trim($_POST["subject"]));
    }

    // Správa
    if (empty(trim($_POST["message"]))) {
        $messageErr = "Správa je povinná.";
        $isValid = false;
    } else {
        $message = htmlspecialchars(trim($_POST["message"]));
    }

    if ($isValid) {
        $success = "Ďakujeme, formulár bol úspešne odoslaný.";
    }
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    <div id="container">
        <h1>Feedback Form</h1>

        <?php if ($success): ?>
            <p class="success"><?= $success ?></p>
        <?php endif; ?>

        <form method="post" action="form.php">
            <div id="data">
                <div id="name">
                    <label for="userName">Name:</label><br>
                    <input type="text" id="userName" name="userName" class="inputs <?= $nameErr ? 'input-error' : '' ?>" placeholder="Enter Name" value="<?= $name ?>">
                    <div class="error"><?= $nameErr ?></div>
                </div>
                <div id="email">
                    <label for="mail">Email:</label><br>
                    <input type="email" id="mail" name="mail" class="inputs <?= $emailErr ? 'input-error' : '' ?>" placeholder="Enter email" value="<?= $email ?>">
                    <div class="error"><?= $emailErr ?></div>
                </div>
                <div id="title">
                    <label for="subject">Subject:</label><br>
                    <input type="text" id="subject" name="subject" class="inputs <?= $subjectErr ? 'input-error' : '' ?>" placeholder="Enter subject" value="<?= $subject ?>">
                    <div class="error"><?= $subjectErr ?></div>
                </div>
                <div id="text">
                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message" class="inputs <?= $messageErr ? 'input-error' : '' ?>" placeholder="Enter message" rows="7"><?= $message ?></textarea>
                    <div class="error"><?= $messageErr ?></div>
                </div>
            </div>

            <button type="submit">
                Submit <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </button>
        </form>
    </div>
</body>
</html>