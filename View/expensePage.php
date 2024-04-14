<main class="home">
  <section class="white-box">
    <h1>Expense Tracker</h1>
    <ul id="transactionList"></ul>
    <div id="status"></div>

    <h3>Add Transaction</h3>

    <form id="transactionForm" action="/View/expensePage.php" method="POST">
      <label for="categories">Choose an expense category:</label>
      <select name="categories" id="categories">
        <option value="food">Food</option>
        <option value="housing">Housing</option>
        <option value="car">Car</option>
        <option value="school">School</option>
        <option value="phone">Phone</option>
        <option value="fun">Fun</option>
      </select>
      <br><br>
      <div>
        <label for="name"></label>
        <textarea name="description" rows="4" cols="50" placeholder="Describe your expense."></textarea>
        <br><br>
      </div>
      <div>
        <label for="amount">Amount</label>
        <input type="number" name="amount" value="0" min="0.01" step="0.01" required />
        <br><br>
      </div>
      <input type="submit" name="register" class="toggle-btn" value="Enter Expense"></input>
    </form>
  </section>
</main>