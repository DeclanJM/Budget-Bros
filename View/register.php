<div id='login-form' class='login-page'>
    <div class="form-box">
        <h1 style="text-align: center">Register</h1>
        <div class='button-box'>
            <div id='btn'></div>
            <form action="./index.php" method="POST">
                <input type='submit' name="page" class='toggle-btn' value="Log In"></input>
            </form>
        </div>
        <form action="./index.php" method="POST" id='login' class='input-group-login'>
            <input required type='text' class='input-field' name="firstName" placeholder='First Name'>
            <input required type='text' class='input-field' name="lastName" placeholder='Last Name '>
            <input required type='email' class='input-field' name="email" placeholder='Email'>
            <input required type='password' class='input-field' name="first" placeholder='Enter Password'>
            <input required type='password' class='input-field' name="second" placeholder='Confirm Password'>
            <input required type='checkbox' class='check-box'> <span>I agree to the terms and conditions</span>
            <input type='submit' class='submit-btn' name='page' value='Sign Up'>
        </form>
    </div>
</div>