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
        <?php
        if (isset($_POST["firstName"]) and isset($_POST["lastName"])) {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            echo "<p>Thank you, $firstName $lastName for registering. You are ready to start saving!<p>";
        }
        ?>
    </div>
</body>


</html>