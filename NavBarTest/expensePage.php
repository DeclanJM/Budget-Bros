<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Expense Tracker</title>
  <link rel="stylesheet" href="style.css"/>
  <?php
    include("nav.html");
  ?>
</head>

<body>
  <main class="home">
    <section class="white-box">
      <h1>Expense Tracker</h1>
      <ul id="transactionList"></ul>
      <div id="status"></div>

      <h3>Add Transaction</h3>

      <form id="transactionForm">
        <ul class="list">
          <li>
            <input type="radio" id="food" name="categories" value="Food">
            <label for="food">Food</label>
          </li>
          <li>
            <input type="radio" id="housing" name="categories" value="Housing">
            <label for="housing">Housing</label>
          </li>
          <li>
            <input type="radio" id="car" name="categories" value="Car">
            <label for="car">Car</label>
          </li>
          <li>
            <input type="radio" id="fun" name="categories" value="Fun">
            <label for="fun">Fun</label>
          </li>
          <li>
            <input type="radio" id="school" name="categories" value="School">
            <label for="school">School</label>
          </li>
          <li>
            <input type="radio" id="phone" name="categories" value="Phone Bill">
            <label for="phone">Phone Bill</label>
          </li>
        </ul>
        <div>
          <label for="name">Description</label>
          <input type="text" name="name" required />
        </div>
        <div>
          <label for="amount">Amount</label>
          <input type="number" name="amount" value="0" min="0.01" step="0.01" required />
        </div>
        <div>
          <label for="date">Date</label>
          <input type="date" name="date" required />
        </div>
        <button type="submit">Submit</button>
      </form>
    </section>
  </main>
  <script src="script.js"></script>
</body>

</html>