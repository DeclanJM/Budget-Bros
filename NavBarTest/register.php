<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Budget Bros Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <?php
        include ("nav.html");
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
            <form action="functions.php" method="post" id='login' class='input-group-login'>
                <input required type='text'     class='input-field' name="firstName" placeholder='First Name'>
                <input required type='text'     class='input-field' name="lastName"  placeholder='Last Name '>
                <input required type='email'    class='input-field' name= "email"    placeholder='Email'>
                <input required type='password' class='input-field' name= "first"    placeholder='Enter Password'>
                <input required type='password' class='input-field' name= "second"   placeholder='Confirm Password'>
                <input required type='checkbox' class='check-box'>  <span>I agree to the terms and conditions</span>
                <input         type='submit'   class='submit-btn'  name='Register' value='Register'>
            </form>
        </div>
    </div>
</body>
</html>
