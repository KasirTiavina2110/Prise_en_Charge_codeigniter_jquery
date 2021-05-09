<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>SIGN UP</title>
</head>

<body>
    <div class="signupSection">
        <div class="info">
            <h2>VELOPTIC</h2>
            <i class="icon ion-ios-ionic-outline" aria-hidden="true"></i>
            <p>*****</p>
        </div>
        <form method="POST" action="<?php echo base_url(); ?>LoginController/login" class="signupForm" name="signupform">
            <h2>Authentification</h2>
            <ul class="noBullet">
                <li>
                    <label for="username"></label>
                    <input type="text" class="inputFields" id="login" name="login" placeholder="Login" value="" autocomplete="on" oninput="return  loginValidation(this.value)" />
                    <span class="text-danger"><?php echo form_error('login'); ?></span>
                </li>
                <li>
                    <label for="password"></label>
                    <input type="password" class="inputFields" id="password" name="password" placeholder="Mot de passe" value="" autocomplete="on" oninput="return passwordValidation(this.value)" />
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                </li>
                <li>
                    <label for="email"></label>
                    <input type="email" class="inputFields" id="email" name="email" placeholder="Email" value="" autocomplete="on" oninput="return emailValidation(this.value)" />
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                </li>
                <li id="center-btn">
                    <input type="submit" id="join-btn" name="join" alt="Join" value="Submit">
                    <?php
                    echo '<label class="text-danger">' . $this->session->flashdata("error") . '</label>';
                    ?>
                </li>
            </ul>
        </form>
    </div>

</html>


<script type="text/javascript">
    var alertRedInput = "#8C1010";
    var defaultInput = "rgba(10, 180, 180, 1)";
    var warningInput = "rgba(255,255,0)";

    function loginValidation(loginInput) {
        var login = document.getElementById("login");
        var issueArr = [];
        if (/[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/.test(loginInput)) {
            issueArr.push("Pas de Characteres speciales");
        }
        if (!/^[A-Z][a-z]*$/.test(loginInput)) {
            issueArr.push("Le prenom doit commencé par un majuscule");
            login.style.borderColor = alertRedInput;
            console.log("Le prenom commence par un majuscule");
        }

        if (issueArr.length > 0) {
            login.setCustomValidity(issueArr);
            login.style.borderColor = alertRedInput;
        } else {
            login.setCustomValidity("");
            login.style.borderColor = defaultInput;
        }
    }

    function passwordValidation(passwordInput) {
        var password = document.getElementById("password");
        var issueArr = [];
        if (!/^.{7,15}$/.test(passwordInput)) {
            issueArr.push("Mot de passe entre 7-15 characteres.");
            password.style.borderColor = warningInput;
        }
        if (!/\d/.test(passwordInput)) {
            issueArr.push("Doit contenir au moins un nombre.");
            password.style.borderColor = warningInput;
        }
        if (!/[a-z]/.test(passwordInput)) {
            issueArr.push("Doit contenir du miniscule.");
            password.style.borderColor = warningInput;
        }
        if (!/[A-Z]/.test(passwordInput)) {
            issueArr.push("Doit contenir du Majuscule.");
            password.style.borderColor = warningInput;
        }
        if (issueArr.length > 0) {
            password.setCustomValidity(issueArr.join("\n"));
            password.style.borderColor = alertRedInput;
        } else {
            password.setCustomValidity("");
            password.style.borderColor = defaultInput;
        }
    }

    function emailValidation(emailInput) {
        var email = document.getElementById("email");
        var issueArr = [];
        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (mailformat.test(emailInput)) {
            email.style.borderColor = defaultInput;
            return true;
        } else {
            email.style.borderColor = alertRedInput;
            email.setCustomValidity(issueArr);
            issueArr.push("Email non valide.");
            console.log("Email non valide.");
            return false;
        }
    }
</script>