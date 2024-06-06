<!DOCTYPE html>
<?php session_start();
require_once __DIR__ . "/scripts/config.php"; ?>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style_settings.css">
    <title>settings</title>
</head>

<body>
    <?php
    require_once __DIR__ . "/header.php";
    ?> 
    <div id="login">
            <div class="manu-option">
                <div class="leftMenuS">
                    <div class="button" onclick="toggleSelect('login')">Zmiana logina</div>
                    <div class="button" onclick="toggleSelect('password')">Zmiana password</div>
                    <div class="button" onclick="toggleSelect('email')">Zmiana Email</div>
                </div>
            </div>
        <div class="login1-container">
            <form id="loginForm1">
                <label for="newusername">Nowe username:</label>
                <input type="text" id="newusername" name="newusername" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>

                <button type="button" id="button_login1" class="button_login" onclick="submitForm('loginForm1', 'scripts/settings_job.php', 'Udano')">Login</button>
                <div class="delete">
                    <a href="scripts/delete.php" >Usunąć konto</a>
                </div>
            </form>
        </div>
        <div class="password-container hidden">
            <form id="loginForm2">
                <label for="oldpassword">Stary Password:</label>
                <input type="password" id="oldpassword" name="oldpassword" required><br>
                <label for="newpassword">Nowe Password:</label>
                <input type="password" id="newpassword" name="newpassword" required><br>

                <button type="button" id="button_login2" class="button_login" onclick="submitForm('loginForm2', 'scripts/settings_job.php', 'Udano')">Login</button>
                <div class="delete">
                    <a href="scripts/delete.php" >Usunąć konto</a>
                </div>
            </form>
        </div>
        <div class="email-container hidden">
            <form id="loginForm3">
                <label for="password">Password:</label>
                <input type="password" id="password3" name="password3" required><br>

                <label for="email">Nowy email:</label>
                <input type="text" id="email" name="email" required><br>

                <button type="button" id="button_login3" class="button_login" onclick="submitForm('loginForm1', 'scripts/settings_job.php', 'Udano')">Login</button><br>
                <div class="delete">
                    <a href="scripts/delete.php" >Usunąć konto</a>
                </div>        
            </form>
        </div>
        <div id="messageContainer" class="hidden"></div>
    </div>
    <?php
    require_once __DIR__ . "/footer.php";
    ?>
</body>
</html>