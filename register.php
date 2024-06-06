<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style_login.css">
    <title>Rejestracja</title>
</head>

<body>
    <?php
    require_once __DIR__ . "/header.php";
    ?> 
    <div id="login">
        <div class="login-container">
            <form id="registrationForm">
                <label for="username">Użytkownik:</label>
                <input type="text" id="username" name="username" required>
                <div class="tooltip" id="usernameTooltip"></div><br>
                
                <label for="password1">Hasło:</label>
                <input type="password" id="password1" name="password1" required>
                <div class="tooltip" id="password1Tooltip">Введіть пароль</div><br>
        
                <label for="password2">Powór Hasło:</label>
                <input type="password" id="password2" name="password2" required>
                <div class="tooltip" id="password2Tooltip"></div><br>
        
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
                <div class="tooltip" id="emailTooltip"></div><br>
        
                <button type="button" id="button_login" onclick="rejestracjaForm(event)">Register</button>
            </form>
        </div>
        
        <div id="messageContainer" class="hidden"></div>
    </div>
    <?php
    require_once __DIR__ . "/footer.php";
    ?>
</body>
</html>
