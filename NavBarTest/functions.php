<?php
function sendName($first, $last) {
    // Start session to store data
    session_start();

    // Store name in session variable
    $_SESSION['name'] = $first . " " . $last;
}

function validPassword($first_pass, $second_pass) {
    if ($first_pass != $second_pass) {
        echo '<script>alert("Passwords must match!")</script>'; 
        return 0;
    }
    return 1;
}
function addUserToFile($first, $last, $email, $password) {
    $user_file = fopen("NewUser.csv", "w");
    $space = " ";
    $comma = ",";
    fwrite($user_file, $first);
    fwrite($user_file, $space);
    fwrite($user_file, $last);
    fwrite($user_file, $comma);
    fwrite($user_file, $email);
    fwrite($user_file, $comma);
    fwrite($user_file, hash('sha256', $password));
    fclose($user_file);
}

function validateUser() {
    echo exec("java validateUser.java");
}

function registerUser($first, $last, $email, $first_pass, $second_pass) {
    if(validPassword($first_pass, $second_pass));
    addUserToFile($first, $last, $email, $first_pass);
    validateUser();
}

function reroute() {
    header("Location: message.php");
}

if(isset($_POST['Register'])) {
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $email = $_POST['email'];
    $first_pass = $_POST['first'];
    $second_pass = $_POST['second'];

    $val = validPassword($first_pass, $second_pass);
    if($val == 0) return;

    registerUser($first, $last, $email, $first_pass, $second_pass);

    // Call sendName function to store name in session
    sendName($first, $last);

    // Redirect to message.php after form submission
    reroute();
}


// Cool way to display current date/time
//<?php
// $currentDateTime = date('Y-m-d H:i:s');
// ? >

// <h1>Current Date and Time: <?php echo $currentDateTime; ? ></h1>
