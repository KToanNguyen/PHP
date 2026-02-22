<?php
//Make sure the page is connected to the database
require "add/connect.php";

//Make sure the form is in POST method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}
    //Data santization 
    $firstName = trim($_POST['first_name'] ?? '');
    $lastName  = trim($_POST['last_name'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $num       = trim($_POST['num'] ?? '');
    $pos       = trim($_POST['pos'] ?? '');
    $skills    = trim($_POST['skills'] ?? '');
    $sum       = trim($_POST['sum'] ?? '');
    $errors = [];

    //Data validation
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
    
    //Error
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

try{ //Function for inserting and updating data
    $stmt = $pdo->prepare(
        "INSERT INTO resumedetails (first_name, last_name, pos, skills, email, num, sum)
        VALUES (:first_name, :last_name, :pos, :skills, :email, :num, :sum)
        ON DUPLICATE KEY UPDATE
            first_name = VALUES(first_name),
            last_name  = VALUES(last_name),
            pos        = VALUES(pos),
            skills     = VALUES(skills),
            email      = VALUES(email),
            num        = VALUES(num),
            sum        = VALUES(sum)"
    );
    //Execute
    $stmt->execute([':first_name' => $firstName, ':last_name' => $lastName, ':pos' => $pos, ':skills' => $skills, ':email' => $email, ':num' => $num, ':sum' => $sum]);
    //Invoice ID
    $resumeId = $pdo->lastInsertId();
}
catch (PDOException $e) {//Error
    die("Database error: " . $e->getMessage());
}
?>
<!-- Submitted form display -->
<?php require "add/header.php"; ?>
    <main>
        <form>
            <fieldset>
                <legend id="big">Resume Display</legend>
                <legend>Name: <?= htmlspecialchars($firstName) . " " . htmlspecialchars($lastName); ?></legend>
                <legend>Current Position: <?= htmlspecialchars($pos); ?></legend>
                <legend>Skills: <?= htmlspecialchars($skills); ?></legend>
                <legend>Email: <?= htmlspecialchars($email); ?></legend>
                <legend>Phone Number: <?= htmlspecialchars($num); ?></legend>
            </fieldset>

            <fieldset>
                <legend id="big">Summary</legend>
                <legend><?= nl2br(htmlspecialchars($sum)); ?></legend>
            </fieldset>
        </form>

        <form action="index.php" method="post">
            <button type="update">Update</button>
        </form>

        <form action="thank.php" method="post">
            <button type="submit">Submit</button>
        </form>
    </main>
</body>
<?php require "add/footer.php"; ?>