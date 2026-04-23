<?php
session_start();
// If the user is not logged in, redirect them to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Finance Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: linear-gradient(120deg,#4e73df,#1cc88a); min-height:100vh;">
    <div class="container mt-5">
        <div class="card shadow-lg" style="border-radius:15px;">
            <div class="card-body">
                <h2 class="text-center mb-4" style="color:#4e73df;">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
                
                <form action="save.php" method="post">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required style="border-radius:10px;">
                    </div>
                    <div class="mb-3">
                        <label>Amount</label>
                        <input type="number" name="amount" class="form-control" required style="border-radius:10px;">
                    </div>
                    <div class="mb-3">
                        <label>Type</label>
                        <select name="type" class="form-control" style="border-radius:10px;">
                            <option value="Income">Income</option>
                            <option value="Expense">Expense</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" required style="border-radius:10px;">
                    </div>
                    <button class="btn btn-primary w-100" style="border-radius:10px;">Add Transaction</button>
                </form>
                <br>
                <a href="view.php" class="btn btn-success w-100" style="border-radius:10px;">View Transactions</a>
                
                <a href="logout.php" class="btn btn-danger w-100 mt-2" style="border-radius:10px;">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>