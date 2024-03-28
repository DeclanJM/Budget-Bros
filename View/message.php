<?php
    // Start session to access stored data
    session_start();

    // Check if name is set in session
    if(isset($_SESSION['name'])) {
        $name = $_SESSION['name'];
    } else {
        // If name is not set, handle accordingly
        $name = "Guest"; // Default value
    }
?>

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
    <div class="message">
        <p>Thank you <?php echo $name; ?> for registering. You are ready to start saving!</p>
    </div>
</body>


</html>