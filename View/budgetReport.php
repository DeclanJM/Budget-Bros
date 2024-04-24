<script>
    $(document).ready(function () {
        createMonthlyTable();
    });
    window.onload = function () {
        addChart();
    }
    function createMonthlyTable() {
        let url = "<?php echo '../Data/' . strtr($_SESSION['name'], [' ' => '']) . '.csv'; ?>";
        $.ajax({
            url: url,
            dataType: "text",
            success: function (data) {
                var transaction_data = data.split(/\r?\n|\r/);
                var table_data = '<table>';
                const d = new Date();
                const month = d.getMonth() + 1;
                const year = d.getFullYear();
                let sum = 0.0;
                for (var i = 0; i < transaction_data.length - 1; i++) {
                    var cell_data = transaction_data[i].split(",");
                    if (i != 0) {
                        let tempValue = parseFloat(cell_data[2].trim());
                        cell_data[2] = "$" + cell_data[2].trim();
                        let date = cell_data[3].split("/");
                        if (date[0] == month && date[2] == year) {
                            sum += tempValue;
                            table_data += '<tr>';
                            for (var cell_count = 0; cell_count < cell_data.length; cell_count++) {
                                table_data += '<td>' + cell_data[cell_count] + '</td>';
                            }
                            table_data += '</tr>';
                        }
                    }
                    else {
                        table_data += '<tr>';
                        for (var cell_count = 0; cell_count < cell_data.length; cell_count++) {
                            table_data += '<th>' + cell_data[cell_count] + '</th>';
                        }
                        table_data += '</tr>';
                    }
                }
                table_data += '<td>Total:</td><td colspan="3">';
                table_data += "$" + sum;
                table_data += '</td>'
                table_data += '</table>';
                $('#expenseTable').append(table_data).html();
            }
        });
    }
    function addChart() {
        let categorySums = [0.0, 0.0, 0.0, 0.0, 0.0, 0.0];
        $.ajax({
            url: "<?php echo '../Data/' . strtr($_SESSION['name'], [' ' => '']) . '.csv'; ?>",
            dataType: "text",
            success: function (data) {
                var transaction_data = data.split(/\r?\n|\r/);
                const d = new Date();
                const month = d.getMonth() + 1;
                const year = d.getFullYear();
                let totalSum = 0.0;
                for (var i = 0; i < transaction_data.length - 1; i++) {
                    var eachLine = transaction_data[i].split(",");
                    if (i != 0) {
                        let date = eachLine[3].split("/");
                        if (date[0] == month && date[2] == year) {
                            let category = eachLine[1].trim();
                            let value = parseFloat(eachLine[2].trim());
                            totalSum += value;
                            if (category == "Food") {
                                categorySums[0] += value;
                            }
                            else if (category == "Housing") {
                                categorySums[1] += value;
                            }
                            else if (category == "Car") {
                                categorySums[2] += value;
                            }
                            else if (category == "School") {
                                categorySums[3] += value;
                            }
                            else if (category == "Phone") {
                                categorySums[4] += value;
                            }
                            else if (category == "Fun") {
                                categorySums[5] += value;
                            }
                        }
                    }
                }
                for (let i = 0; i < categorySums.length; i++) {
                    let newValue = (categorySums[i] / totalSum) * 100;
                    categorySums[i] = newValue;
                }
                console.log(categorySums);
                if (totalSum != 0) {
                    let styleAttribute = "background: conic-gradient(black " +
                        categorySums[0] +
                        "%, blue " +
                        categorySums[0] +
                        "% " +
                        parseFloat(categorySums[0] + categorySums[1]) +
                        "%, green " +
                        parseFloat(categorySums[0] + categorySums[1]) +
                        "% " +
                        parseFloat(categorySums[0] + categorySums[1] + categorySums[2]) +
                        "%, yellow " +
                        parseFloat(categorySums[0] + categorySums[1] + categorySums[2]) +
                        "% " +
                        parseFloat(categorySums[0] + categorySums[1] + categorySums[2] + categorySums[3]) +
                        "%, orange " +
                        parseFloat(categorySums[0] + categorySums[1] + categorySums[2] + categorySums[3]) +
                        "% " +
                        parseFloat(categorySums[0] + categorySums[1] + categorySums[2] + categorySums[3] + categorySums[4]) +
                        "%, red " +
                        parseFloat(categorySums[0] + categorySums[1] + categorySums[2] + categorySums[3] + categorySums[4]) +
                        "%);";
                    $("#pieChart").attr("style", styleAttribute);
                    let categoriesWithoutZero = [];
                    for (let i = 0; i < categorySums.length; i++) {
                        if(categorySums[i] == 0) {
                            $($(".entry")[i]).empty();
                        }
                        else {
                            categoriesWithoutZero.push(categorySums[i]);
                        }
                    }
                    for (let i = 0; i < $(".entry-text").length; i++) {
                        $($(".entry-text")[i]).append(" " + categoriesWithoutZero[i].toFixed(2) + "%");
                    }
                }
                else {
                    $(".white-box").append("<p style='color:red;clear:both;padding-top:10px;'>Please enter a transaction for this month to see chart data</p>");
                }
            }
        });
    }
</script>
<div class="white-box">
    <p>Veiw all transaction entries in another window:</p>
    <form action="./index.php" method="POST">
        <input class="cn" id="expenses" type="submit" value="View Expenses" name="page"
            onclick="createTables('<?php echo '../Data/' . strtr($_SESSION['name'], [' ' => '']) . '.csv'; ?>')"></input>
    </form>
    <div id="expenseTable" style="border-right:solid black 2px;min-height: 269px;">
        <p>Transaction entries from the beginning of the month:</p>
        <!-- table -->
    </div>
    <div id="floatRight">
        <p>Monthly Percent Expenses by Category:</p>
        <div id="chartContainer">

            <div id="pieChart"
                style="background: conic-gradient(black 16%, blue 16% 33%, green 33% 50%, yellow 50% 66%, orange 66% 83%, red 83%);">
            </div>

            <div id="legend" style="font-size: 25px;">
                <div class="entry">
                    <div id="color-black" class="entry-color"></div>
                    <div class="entry-text">Food</div>
                </div>
                <div class="entry">
                    <div id="color-blue" class="entry-color"></div>
                    <div class="entry-text">Housing</div>
                </div>
                <div class="entry">
                    <div id="color-green" class="entry-color"></div>
                    <div class="entry-text">Car</div>
                </div>
                <div class="entry">
                    <div id="color-yellow" class="entry-color"></div>
                    <div class="entry-text">School</div>
                </div>
                <div class="entry">
                    <div id="color-orange" class="entry-color"></div>
                    <div class="entry-text">Phone</div>
                </div>
                <div class="entry">
                    <div id="color-red" class="entry-color"></div>
                    <div class="entry-text">Fun</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</div>