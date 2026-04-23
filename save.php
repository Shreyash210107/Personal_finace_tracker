<?php
session_start();
// Security check: Make sure the user is actually logged in before saving
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Connect to the database
$conn = mysqli_connect("localhost","root","","contactdb31");

// Grab the data from the form
$title = $_POST['title'];
$amount = $_POST['amount'];
$type = $_POST['type'];
$date = $_POST['date'];

// Insert into the database
$sql = "INSERT INTO transactions(title, amount, type, date) VALUES('$title', '$amount', '$type', '$date')";
mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Saved!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: linear-gradient(120deg,#4e73df,#1cc88a); min-height:100vh; display: flex; align-items: center;">
    <div class="container text-center">
        <div class="card shadow-lg mx-auto" style="max-width: 400px; border-radius:15px;">
            <div class="card-body py-5">
                <h3 style="color: #1cc88a; font-weight: bold;">Transaction Saved!</h3>
                <p class="text-muted mt-3">Your <?php echo htmlspecialchars($type); ?> of ₹<?php echo htmlspecialchars($amount); ?> has been successfully recorded.</p>
                <br>
                <a href="index.php" class="btn btn-primary w-100" style="border-radius:10px;">Go Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>