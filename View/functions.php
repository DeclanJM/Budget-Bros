<?php

// Creates a new session variable $name, that will be called from the message.php file
function transmitName($first, $last) {
    // Start session to store data
    session_start();

    // Store name in session variable
    $_SESSION['name'] = $first . " " . $last;
}


// Adds new user's info to the newUser.csv file
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


// If the passwords do not match, the page will throw a pop-up alert and reload
function validPassword($first_pass, $second_pass) {
    if ($first_pass != $second_pass) {
        echo '<script>alert("Passwords must match!")</script>'; 
        refresh();  // Reload page
        return 0;
    }
    return 1;
}


// Executes a CLI command to run validateUser.java
function validateUser() {
    echo exec("java validateUser.java");
}


// If the passwords match, the user will be added to the newUser.csv file and will be validated from the java classes
function registerUser($first, $last, $email, $first_pass, $second_pass) {
    if(validPassword($first_pass, $second_pass)) {
        addUserToFile($first, $last, $email, $first_pass);
        validateUser();
    }
}


// Checks to see if the variable is empty or a null value
function isEmpty($var) {
    return empty($var);
}


// Reroutes the user to message.php
function reroute() {
    header("Location: message.php");
    //echo '<script>window.location.replace("message.php")</script>';   // Same thing, header breaks stuff if the page has already been loaded in
}


// Refreshes the current page
function refresh() {
    echo '<script>window.location.replace("register.php")</script>';
}


// If the Register button has been pressed, submitting the form data...
if(isset($_POST['Register'])) {
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $email = $_POST['email'];
    $first_pass = $_POST['first'];
    $second_pass = $_POST['second'];

    // Checks to make sure there are no empty variable values. Required can be deleted from Inspect Element so this is another safety check
    if(isEmpty($first) || isEmpty($last) || isEmpty($email) || isEmpty($first_pass) || isEmpty($second_pass)) {
        refresh();
        return;
    }

    registerUser($first, $last, $email, $first_pass, $second_pass);

    // Call transmitName function to store name in a session variable
    transmitName($first, $last);

    // Redirect to message.php after form submission
    reroute();
}
