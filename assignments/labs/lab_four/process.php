<?php
require "includes\header.php";
//  TODO: connect to the database 
require "includes\connect.php";
require "includes\process.php";
//   TODO: Grab form data (no validation or sanitization for this lab)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$firstName = $_POST['first_name'] ?? '';
$lastName = $_POST['last_name'] ?? '';
$email = $_POST['email'] ?? '';
/*
  1. Write an INSERT statement with named placeholders
  2. Prepare the statement
  3. Execute the statement with an array of values
  4.
*/
$sql = "INSERT INTO subscribers (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";
$stmt = $pdo-> prepare($sql);
$stmt->execute([
    ':first_name' => $firstName,
    ':last_name' => $lastName,
    ':email' => $email
]);
} else {
    // Redirect if accessed directly (optional but clean)
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <main class="container mt-4">
        <h2>Thank You for Subscribing</h2>

        <!-- TODO: Display a confirmation message -->
        <!-- Example: "Thanks, Name! You have been added to our mailing list." -->
        <?php echo"<h2>Thank you, " . $firstName . "! You have been added to our mailing list.</h2>" ?>

        <p class="mt-3">
            <a href="subscribers.php">View Subscribers</a>
        </p>
    </main>
</body>

</html>
<?php require "includes\footer.php"; ?>