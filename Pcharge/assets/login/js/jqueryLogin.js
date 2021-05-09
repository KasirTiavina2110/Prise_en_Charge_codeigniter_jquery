
var base_url = '<?= base_url() ?>';
$('.signupForm').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        url: base_url + 'LoginController/login',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function (respData) {
            var loginAlert = '';
            if (respData.isLogin == 0) {
                loginAlert = '<div class="loginAlert">Successfully logged in!</div>';
                setTimeout(function () {
                    window.location.href = base_url;
                }, 1000);
                console.log("tafiditra");
            } else {
                loginAlert = '<div class="loginAlert">Incorrect Login or Password or Email!</div>';
                console.log("Incorrect Login or Password or Email!")
            }
            $('#loginAlert').html(loginAlert);
        }
    });
});
