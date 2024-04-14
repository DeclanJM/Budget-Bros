<?php
// Start session to access stored data
// session_start();
// // Check if name is set in session
// if(isset($_SESSION['name'])) {
//     $name = $_SESSION['name'];
// } else {
//     // If name is not set, handle accordingly
//     $name = "Guest"; // Default value
// }
if (isset($_POST['firstName']) and isset($_POST['lastName'])) {
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
}
?>

<div class="message">
    <p>Thank you
        <?php echo $fName . " " . $lName; ?> for registering. You are ready to start saving!
    </p>
</div>

</html>
<script>
    function callNotLoggedIn() {
        $("div").empty();
        $("div").append('<p>Please Log in or Sign up first!</p>');
    }
</script>