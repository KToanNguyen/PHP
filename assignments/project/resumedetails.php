<?php
require "add/connect.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}

    $firstName = trim($_POST['first_name'] ?? '');
    $lastName  = trim($_POST['last_name'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $num       = trim($_POST['num'] ?? '');
    $pos       = trim($_POST['pos'] ?? '');
    $skills    = trim($_POST['skills'] ?? '');
    $sum       = trim($_POST['sum'] ?? '');
    $errors = [];

    if ($firstName === null || $firstName === '') {
    $errors[] = "First name has not been entered.";
    }

    if ($lastName === null || $lastName === '') {
        $errors[] = "Last name has not been entered.";
    }

    if ($email === null || $email === '') {
        $errors[] = "Email has not been entered.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email must be a valid email address.";
    }

    if ($num === null || $num === '') {
        $errors[] = "Phone number has not been entered.";
    } elseif (!filter_var($num, FILTER_VALIDATE_REGEXP, [
        'options' => ['regexp' => '/^[0-9\-\+\(\)\s]{7,25}$/']
    ])) {
        $errors[] = "Your phone number format is invalid.";
    }

    if ($pos === null || $pos === '') {
        $errors[] = "Please enter your current position.";
    }

    if ($skills === null || $skills === '') {
        $errors[] = "Please enter your skills.";
    }

    if ($sum === null || $sum === '') {
        $errors[] = "Your summary need to be filled out. No summary can lead to lower hiring chances.";
    }
    
    if (!empty($errors)) {
    
    echo "<div class='alert alert-danger'>";
    echo "<h2>Please fix the following:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
    echo "</div>";

    exit;
}

try{
    $stmt = $pdo->prepare(
        "INSERT INTO resumedetails (first_name, last_name, pos, skills, email, num, sum)
        VALUES (:first_name, :last_name, :pos, :skills, :email, :num, :sum)"
    );

    $stmt->execute([':first_name' => $firstName, ':last_name' => $lastName, ':pos' => $pos, ':skills' => $skills, ':email' => $email, ':num' => $num, ':sum' => $sum]);

    $resumeId = $pdo->lastInsertId();
}
catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
<?php require "add/header.php"; ?>
    <main>
        <h1>Resume</h1>
        <p>Name: <?= htmlspecialchars($firstName) . " " . htmlspecialchars($lastName); ?></p>
        <p>Current Position: <?= htmlspecialchars($pos); ?></p>
        <p>Skills: <?= htmlspecialchars($skills); ?></p>
        <p>Email: <?= htmlspecialchars($email); ?></p>
        <p>Phone Number: <?= htmlspecialchars($num); ?></p>

        <h2>Summary</h2>
        <p><?= nl2br(htmlspecialchars($sum)); ?></p>
    </main>
</body>
<?php require "add/footer.php"; ?>