var alertRedInput = "#8C1010";
var defaultInput = "rgba(10, 180, 180, 1)";

function loginInputValidation(loginInputInput) {
    var login = document.getElementById("login");
    var issueArr = [];
    if (/[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/.test(loginInput)) {
        issueArr.push("Pas de Characteres speciales");
    }
    if (!/^[A-Z][a-z]*$/.test(loginInputInput)) {
        issueArr.push("Le prenom commence par un majuscule");
        loginInput.style.borderColor = alertRedInput;
        /*console.log("Le prenom commence par un majuscule");*/
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
    }
    if (!/\d/.test(passwordInput)) {
        issueArr.push("Doit contenir au moins un nombre.");
    }
    if (!/[a-z]/.test(passwordInput)) {
        issueArr.push("Doit contenir du miniscule.");
    }
    if (!/[A-Z]/.test(passwordInput)) {
        issueArr.push("Doit contenir du Majuscule.");
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
    }
    else {
        email.style.borderColor = alertRedInput;
        email.setCustomValidity(issueArr);
        issueArr.push("Email non valide.");
        console.log("Email non valide.");
        return false;
    }
}