<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Budget Bros Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="http://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body >
    <?php
    if (isset($_POST["page"])) {
        $page = strtolower($_POST["page"]);
        if ($page == "budget entry") {
            $page = "expensePage";
        } elseif ($page == "budget report" || $page == "view expenses" || $page == "change goal") {
            if ($page == "change goal") {
                transmitBudget($_POST['monthlyBudget']);
            }
            $page = "budgetReport";
        } elseif ($page == "log in") {
            $page = "login";
        } elseif ($page == "logout") {
            // remove all session variables
            session_unset();

            // destroy the session
            session_destroy();
            $page = "home";
        } elseif ($page == "sign up") {
            $page = "message";
        } elseif ($page == "enter expense") {
            $page = "expensePage";
        }
        elseif($page == "logbackin") {
            $page = "expensePage";
            logInUser();
        }
    } else {
        $page = "home";
    }
    if (isset($_POST["categories"]) && isset($_POST["description"]) && isset($_POST["amount"]) && isset($_SESSION["name"])) {
        $fullName = explode(" ", $_SESSION["name"]);
        $first = $fullName[0];
        $last = $fullName[1];
        writeBudgetEntry($first, $last, $_POST["description"], $_POST["categories"], $_POST["amount"], date("m/d/Y"));
    }
    include ("nav.php");
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    if (($page == "expensePage" || $page == "budgetReport") && !isset($_SESSION["name"])) {
        $page = "login";
        include ("message.php");
        echo '<script type="text/javascript">',
            'callNotLoggedIn();',
            '</script>';

    }
    include ("$page.php");
    if ($page == "budgetReport") {
        $url = '../Data/' . strtr($_SESSION['name'], [' ' => '']) . '.csv';
        echo '<script src="createExpenseView.js" type="text/javascript">',
            'createMonthlyTable("',
            $url,
            '");',
            '</script>';
    }
    ?>
    <script nonce="8IBTHwOdqNKAWeKl7plt8g==">
        if ($(".message") != null) {
            $(".form-box").css("margin-top", "0px");;
        }
    </script>
    <script src="createExpenseView.js"></script>
</body>

<!-- Log in user -->
<?php
function transmitBudget($budget) {
    $_SESSION['budget'] = $budget;
}
function logInUser() {
    // find user
    // check email and password
    // take first and last name
    // call transmitName
    // take user to the budget report
}
?>
<!-- PHP FUNCTIONS -->
<?php
// Creates a new session variable $name, that will be called from the message.php file
function transmitName($first, $last)
{
    // Store name in session variable
    $_SESSION['name'] = $first . " " . $last;
}


// Adds new user's info to the newUser.csv file
function addUserToFile($first, $last, $email, $password)
{
    $user_file = fopen("../Data/newUser.csv", "w");
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
function createUserDataFile($first, $last)
{
    $usersData_file = fopen("../Data/" . $first . $last . ".csv", "w");
    chmod("../Data/" . $first . $last . ".csv", 0755); // automatically chmods the file
    fwrite($usersData_file, "Description, ");
    fwrite($usersData_file, "Category, ");
    fwrite($usersData_file, "Amount($), ");
    fwrite($usersData_file, "Date(M/D/Y)\n");
    fclose($usersData_file);
}
function writeBudgetEntry($first, $last, $description, $category, $amount, $date)
{
    $fileContents = $description . ", " . $category . ", " . $amount . ", " . $date . "\n";
    file_put_contents("../Data/" . $first . $last . ".csv", $fileContents, FILE_APPEND);
}


// If the passwords do not match, the page will throw a pop-up alert and reload
function validPassword($first_pass, $second_pass)
{
    if ($first_pass != $second_pass) {
        passwordAlert();  // Calls popup
        // refresh();  // Reloads page
        return 0;
    }
    return 1;
}


// Alert for passwords not matching
function passwordAlert()
{
    echo '<script>alert("Passwords must match!")</script>';
}


// Executes a CLI command to run validateUser.java
function validateUser()
{
    chdir("../DataManipulation");
    echo exec("java DataManipulation.validateUser");
}


// If the passwords match, the user will be added to the newUser.csv file and will be validated from the java classes
function registerUser($first, $last, $email, $first_pass, $second_pass)
{
    if (validPassword($first_pass, $second_pass)) {
        addUserToFile($first, $last, $email, $first_pass);
        validateUser();
        createUserDataFile($first, $last);
    }
}

// Checks to see if the variable is empty or a null value
function isEmpty($var)
{
    return empty($var);
}


// Alert for empty values in form
function emptyAlert()
{
    echo '<script>alert("No empty values allowed!")</script>';
}


// Reroutes the user to message.php
// function reroute() { header("Location: message.php");
//     //echo '<script>window.location.replace("message.php")</script>';   // Same thing, header breaks stuff if the page has already been loaded in
// }

// // Refreshes the current page
// function refresh() {
//     echo '<script>window.location.replace("register.php")</script>';
// }


// If the Register button has been pressed, submitting the form data...
if (isset($_POST['page'])) {
    if ($_POST['page'] == "Sign Up") {
        session_unset();
        $first = ucfirst(strtr($_POST['firstName'], [' ' => '']));
        $last = ucfirst(strtr($_POST['lastName'], [' ' => '']));
        $email = strtr($_POST['email'], [' ' => '']);
        $first_pass = strtr($_POST['first'], [' ' => '']);
        $second_pass = strtr($_POST['second'], [' ' => '']);

        // Checks to make sure there are no empty variable values. Required can be deleted from Inspect Element so this is another safety check
        if (isEmpty($first) || isEmpty($last) || isEmpty($email) || isEmpty($first_pass) || isEmpty($second_pass)) {
            emptyAlert();
            refresh();
            return;
        }
        // Call transmitName function to store name in a session variable
        transmitName($first, $last);

        transmitBudget(100);

        registerUser($first, $last, $email, $first_pass, $second_pass);



        // Redirect to message.php after form submission
        // reroute();
    }
}
?>