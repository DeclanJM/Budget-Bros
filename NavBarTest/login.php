<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Budget Bros Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <?php
    include("nav.html");
    ?>
</head>

<body>
    <div id='login-form' class='login-page'>
        <div class="form-box">
            <h1 style="text-align: center">Log In</h1>
            <div class='button-box'>
                <div id='btn'></div>
                <form action="register.php" method="POST">
                    <input type='submit' name="register" onclick='register()' class='toggle-btn' value="Register"></input>
                </form>
            </div>
            <form id='login' class='input-group-login'>
                <input type='text' class='input-field' placeholder='Email Id' required>
                <input type='password' class='input-field' placeholder='Enter Password' required>
                <input type='checkbox' class='check-box'><span>Remember Password</span>
                <button type='submit' class='submit-btn'>Log in</button>
            </form>
        </div>
    </div>
</body>

</html>