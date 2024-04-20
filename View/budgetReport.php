<div class="white-box">
    <p>Veiw all transaction entries in another window:</p>
    <form action="./index.php" method="POST">
        <input class="cn" id="expenses" type="submit" value="View Expenses" name="page" onclick="createTables('<?php echo strtr($_SESSION['name'],[' '=>'']). '.txt';?>')"></input>
    </form>
    <div id="expenseTable">
    <!-- table -->
    </div>
</div>
