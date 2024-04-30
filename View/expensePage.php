<main class="home">
  <section class="white-box">
    <h1>Expense Tracker</h1>
    <ul id="transactionList"></ul>
    <div id="status"></div>

    <h3>Add Transaction</h3>

    <form id="transactionForm" action="index.php" method="POST">
      <label for="categories">Choose an expense category:</label>
      <select name="categories" id="categories">
        <option value="Food">Food</option>
        <option value="Housing">Housing</option>
        <option value="Car">Car</option>
        <option value="School">School</option>
        <option value="Phone">Phone</option>
        <option value="Fun">Fun</option>
      </select>
      <br><br>
      <div>
        <label for="name"></label>
        <textarea name="description" rows="4" cols="50" placeholder="Describe your expense." maxlength="100"></textarea>
        <br><br>
      </div>
      <div>
        <label for="amount">Amount</label>
        <input type="number" name="amount" value="0" min="0.01" step="0.01" required />
        <br><br>
      </div>
      <input type="submit" name="page" class="toggle-btn" value="Enter Expense"></input>
    </form>
  </section>
</main>