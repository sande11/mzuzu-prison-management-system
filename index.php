<!DOCTYPE html>
<html>

<head>
    <title>MPMS</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/jquery-2.2.4.js"></script>
</head>

<body>
    <img class="wave" src="images/img/wave.png">
    <div class="container">
        <div class="img">
            <img src="images/img/R.png">
        </div>
        <div class="login-content">
            <form id="login-form">
                <img style="border-radius: 50%;" src="images/img/1.png">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" name="email">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password">
                    </div>
                </div>
                <a href="#">Forgot Password?</a>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script>
    $('#login-form').submit(function(e) {
        e.preventDefault()

        $.ajax({
            url: 'ajax.php?action=login',
            method: 'POST',
            data: $(this).serialize(),
            success: function(resp) {
                if (resp) {
                    resp = JSON.parse(resp)
                    if (resp === 0) {

                        alert("Your account is not active. Please contact the Administrator");
                    }

                    if (resp === 2) {

                        window.location.href = 'warder/index.php'

                    }
                    if (resp === 3) {

                        // link to admin account
                        window.location.href = 'home.php'

                    }
                    if (resp === 4) {
                        // link to customer account
                        window.location.href = 'index.php'

                    }
                    if (resp === 1) {
                        // link to manager account
                        window.location.href = 'admin/index.php'

                    }
                    if (resp === 5) {
                        alert("Incorrect password!");
                    }
                    if (resp === 6) {
                        alert(
                            "Account is not active, activate your account"
                        );

                    }
                    if (resp === 7) {
                        // link to mechanic account
                        window.location.href = 'mechanic/index.php'

                    }
                }
            },
            complete: function() {

            }
        })
    })
    </script>
    <script type="text/javascript" src="js/scripts.js"></script>
</body>

</html>