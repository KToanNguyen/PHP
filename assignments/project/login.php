<?php
session_start();
require "add/connect.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        // Fetch the user by email
        $stmt = $pdo->prepare("SELECT id, username, password FROM acc WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Verify password
        // Note: This assumes you stored the password using password_hash()
        if ($user && password_verify($password, $user['password'])) {
            
            // Success! Regenerate session ID for security (prevents session hijacking)
            session_regenerate_id();
            
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['user_name'] = $user['username'];
            
            header("Location: display.php");
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>

<?php require "add/header.php"; ?>

<main>
    <form action="login.php" method="POST">
        <fieldset>
            <legend>Login to Your Account</legend>

            <?php if ($error): ?>
                <div style="color: red; margin-bottom: 15px;"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control mb-4" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control mb-4" required>

            <button type="submit">Login</button>
        </fieldset>
    </form>
</main>

<?php require "add/footer.php"; ?>