<div class="white-box">
    <p>Veiw all transaction entries in another window:</p>
    <form action="./index.php" method="POST">
        <input class="cn" id="expenses" type="submit" value="View Expenses" name="page" onclick="createTables('<?php echo '../Data/'.strtr($_SESSION['name'],[' '=>'']). '.csv';?>')"></input>
    </form>
    <div id="expenseTable">
    <!-- table -->
    </div>
</div>
