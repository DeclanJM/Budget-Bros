<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Budget Bros Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <?php
    include ("nav.php");
    ?>
</head>

<body>
    <div id='login-form' class='login-page'>
        <div class="form-box">
            <h1 style="text-align: center">Register</h1>
            <div class='button-box'>
                <div id='btn'></div>
                <form action="login.php" method="POST">
                    <input type='submit' name="login" onclick='register()' class='toggle-btn' value="Log In"></input>
                </form>
            </div>
            <form action="message.php" method="POST" id='login' class='input-group-login'>
                <input type='text' class='input-field' name="firstName" placeholder='First Name' required>
                <input type='text' class='input-field' name="lastName" placeholder='Last Name ' required>
                <input type='email' class='input-field' placeholder='Email Id' required>
                <input type='password' class='input-field' placeholder='Enter Password' required>
                <input type='password' class='input-field' placeholder='Confirm Password' required>
                <input type='checkbox' class='check-box'><span>I agree to the terms and conditions</span>
                <button type='submit' onclick="includeMessage()" class='submit-btn'>Register</button>
            </form>
        </div>
        
            <?php
            function includeMessage() {
                include ("message.php");
            }
            ?>
    </div>
</body>

</html>