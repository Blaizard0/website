function submitForm(formId, url, tekst = "udano", urlHeader = null) {
    var form = document.getElementById(formId);
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();;
    xhr.open('POST', url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                showMessageLogin(xhr.responseText, xhr.responseText.includes(tekst));
                if (urlHeader != null && xhr.responseText.includes(tekst)) {
                    setTimeout(function () {
                        window.location.href = urlHeader;
                    }, 500);
                }
            } else {
                showMessageLogin('An error occurred during the request.', false);
            }
        }
    };
    xhr.send(formData);
}

function rejestracjaForm(event) {
    var username = document.getElementById("username").value;
    var password1 = document.getElementById("password1").value;
    var password2 = document.getElementById("password2").value;
    var email = document.getElementById("email").value;
    var emailspraw = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var usernameSpraw = /^[a-zA-Z0-9._-]+$/;
    var isValid = true;
    var usernameError = document.getElementById('usernameTooltip');
    var password1Error = document.getElementById('password1Tooltip');
    var password2Error = document.getElementById('password2Tooltip');
    var emailError = document.getElementById('emailTooltip');

    usernameError.style.display = 'none';
    password1Error.style.display = 'none';
    password2Error.style.display = 'none';
    emailError.style.display = 'none';

    if (username.length < 2) {
        usernameError.style.display = 'block';
        usernameError.innerHTML = 'Zakrutkie imię';
        isValid = false;
    }
    if (username.length > 30) {
        usernameError.style.display = 'block';
        usernameError.innerHTML = 'Zadługie imię';
        isValid = false;
    }
    if (!usernameSpraw.test(username)) {
        usernameError.style.display = 'block';
        usernameError.innerHTML = 'Nie używaj polskich znaków';
        isValid = false;
        console.log("Username: ", username);
        console.log("Regex test: ", usernameSpraw.test(username));

    }
    if (email.trim() === "") {
        emailError.style.display = 'block';
        emailError.innerHTML = 'Wprowadż e-mail';
        isValid = false;
    } else if (!emailspraw.test(email)) {
        emailError.style.display = 'block';
        emailError.innerHTML = 'Wprowadż poprawnie email';
        isValid = false;
    }
    if (password1.length < 8) {
        password1Error.style.display = 'block';
        password1Error.innerHTML = 'Zakrutkie Hasło';
        isValid = false;
    }
    if (password1.length > 30) {
        password1Error.style.display = 'block';
        password1Error.innerHTML = 'Zadługue Hasło';
        isValid = false;
    }
    if (password2.trim() === "") {
        password2Error.style.display = 'block';
        password2Error.innerHTML = 'Wprowadż powtór Hasło';
        isValid = false;
    } else if (password1 !== password2) {
        password2Error.style.display = 'block';
        password2Error.innerHTML = 'Jest różnica w Hasłach';
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    } else {
        submitForm('registrationForm', 'scripts/register.php', 'udan', "login.php");
    }

    return isValid;
}
function showMessageLogin(message, dane) {
    var messageContainer = document.getElementById('messageContainer');
    messageContainer.textContent = message;
    if (dane) {
        messageContainer.className = 'successContainer';
    } else {
        messageContainer.className = 'errorContainer';
    }
    messageContainer.style.display = 'block';
    setTimeout(function () {
        messageContainer.style.display = 'none';
    }, 3000);
}
function toggleSidebar() {
    var sidebar = document.querySelector('.sidebar');
    if (sidebar.style.display === 'none' || sidebar.style.display === '') {
        sidebar.style.display = 'block';
    } else {
        sidebar.style.display = 'none';
    }
}

function toggleContent() {
    //var content = document.getElementsByClassName('.content');
    var content = document.querySelector('.content');
    console.log(content);
    content.classList.toggle('hidden');
}
function toggleSelect(element){
    var login = document.querySelector('.login1-container');
    var password = document.querySelector('.password-container');
    var email = document.querySelector('.email-container');
    switch (element){
        case "email":
            login.style.display = 'none';
            password.style.display = 'none';
            email.style.display = 'block';
            break;
        case "password":
            login.style.display = 'none';
            password.style.display = 'block';
            email.style.display = 'none';
            break;
        default:
            login.style.display = 'block';
            password.style.display = 'none';
            email.style.display = 'none';
    }
}
