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
            <input required type='text' class='input-field' name="firstName" placeholder='First Name' id="fname">
            <input required type='text' class='input-field' name="lastName" placeholder='Last Name' id="lname">
            <input required type='email' class='input-field' name="email" placeholder='Email'>
            <div id="passwords">
                <input required type='password' class='input-field' name="first" placeholder='Enter Password' id="fpass" minlength="5">
                <input required type='password' class='input-field' name="second" placeholder='Confirm Password' id="spass" minlength="5">
            </div>
            <input required type='checkbox' class='check-box' id='terms'> <span>I agree to the terms and conditions</span>
            <input type='submit' class='submit-btn' name='page' value='Sign Up'>
        </form>
    </div>
</div>
<script>
    function checkIfPasswordsMatch() {
        if ($fpass.value != $spass.value && $("#alert").length == 0) {
            $("#passwords").append("<div style='color:red;font-size: 12px' id='alert'>PASSWORDS MUST MATCH</div>");
        }
        else if($fpass.value == $spass.value) {
            $("#alert").remove();
        }
    }
    function checkAllFields(event) {
        if ($fpass.value != $spass.value || $("#alert").length == 0 || fname.value == '' || lname.value == '' || email.value == '' || terms.value == 0) {
            event.preventDefault();
        }
        alert("All values must be entered and passwords must match");
    }
    $fpass = document.getElementById("fpass");
    $spass = document.getElementById("spass");
    $spass.onfocusout = function () {
        checkIfPasswordsMatch();
    }
    $spass.onkeyup = function () {
        checkIfPasswordsMatch();
    }
    login.addEventListener("submit", checkAllFields);

</script>