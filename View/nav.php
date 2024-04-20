<nav>
  <input type="checkbox" id="check">
  <label for="check" class="checkbtn">
    <i class="fas fa-bars"></i>
  </label>
  <label class="logo">Budget Bros</label>
  <ul>
    <li><form action="./index.php" method="POST" class="active"><input type="submit" value="Home" name="page"></form></li>
    <li><form action="./index.php" method="POST"><input type="submit" value="Budget Entry" name="page"></form></li>
    <li><form action="./index.php" method="POST"><input type="submit" value="Budget Report" name="page" id="budgetReport"></form></li>
    <li><form action="./index.php" method="POST"><input type="submit" value="About" name="page"></form></li>
    <?php 
      if (isset($_SESSION["name"])) {
        $button = "Logout";
      }
      else {
        $button = "Login";
      }
    ?>
    <li><form action="./index.php" method="POST"><input type="submit" value=<?php echo $button ?> name="page" class="button"></form></li>
  </ul>
</nav>

