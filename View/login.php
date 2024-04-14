<div id='login-form' class='login-page'>
    <div class="form-box">
        <h1 style="text-align: center">Log In</h1>
        <div class='button-box'>
            <div id='btn'></div>
            <form action="./index.php" method="POST">
                <input type='submit' name="page" onclick='register()' class='toggle-btn' value="Register"></input>
            </form>
        </div>
        <form id='login' class='input-group-login'>
            <input type='text' class='input-field' placeholder='Email Id' name="email" required>
            <input type='password' class='input-field' placeholder='Enter Password' required>
            <input type='checkbox' class='check-box'><span>Remember Password</span>
            <button type='submit' class='submit-btn'>Log in</button>
        </form>
    </div>
</div>