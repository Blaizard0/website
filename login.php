<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style_login.css">
    <title>Logowanie</title>
</head>

<body>
    <?php
    require_once __DIR__ . "/header.php";
    ?>  
    <div id="login">
        <div class="login-container">
            <form id="loginForm">
                <label for="username">Użytkownik:</label>
                <input type="text" id="username" name="username" required><br>

                <label for="password">Hasło:</label>
                <input type="password" id="password" name="password" required><br>

                <button type="button" id="button_login" onclick="submitForm('loginForm','scripts/login.php', 'Zalogowano', 'index.php')">Login</button><br><br>
                <a href="register.php">Nie masz konta? Zarejestrój</a>
            </form>
        </div>

        <div id="messageContainer" class="hidden"></div>
    </div>
    <?php
    require_once __DIR__ . "/footer.php";
    ?>
</body>

</html>
