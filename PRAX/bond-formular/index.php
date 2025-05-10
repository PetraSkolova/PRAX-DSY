<?php
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {

    if (
        isset($_POST['userName']) &&
        isset($_POST['email']) &&
        isset($_POST['password']) &&
        isset($_POST['repeat']) &&
        isset($_POST['gender'])
    ) {
        $userName = htmlspecialchars(trim($_POST['userName']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = trim($_POST['password']);
        $repeat = trim($_POST['repeat']);
        $gender = htmlspecialchars($_POST['gender']);

        $errors = [];

        if (empty($userName)) {
            $errors[] = "Užívateľské meno nesmie byť prázdne.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Zadaný email nie je platný.";
        }

        if (strlen($password) < 6) {
            $errors[] = "Heslo musí mať aspoň 6 znakov.";
        }

        if ($password !== $repeat) {
            $errors[] = "Zadané heslá sa nezhodujú.";
        }

        if (empty($gender)) {
            $errors[] = "Pohlavie musí byť vybrané.";
        }

        if (empty($errors)) {
            echo "<h2>Registrácia prebehla úspešne!</h2>";
            echo "<p><strong>Užívateľské meno:</strong> $userName</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Pohlavie:</strong> $gender</p>";
        } else {
            echo "<h2>Chyba vo formulári:</h2>";
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            echo '<p><a href="index.html">Späť na formulár</a></p>';
        }
    } else {
        echo "<h2>Niektoré povinné polia chýbajú.</h2>";
        echo '<p><a href="form.html">Späť na formulár</a></p>';
    }

} else {
    echo "<h2>Formulár nebol odoslaný cez POST metódu.</h2>";
    echo '<p><a href="form.html">Späť na formulár</a></p>';
}
?>