<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "contactdb31");

// ✅ 1. Check DB connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ✅ 2. Get form data safely
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // ✅ 3. Run query
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    // ✅ 4. Check if query failed (VERY IMPORTANT)
    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }

    // ✅ 5. Check if user exists
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // ✅ 6. Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('User not found!');</script>";
    }
}
?>