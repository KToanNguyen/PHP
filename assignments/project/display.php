<?php
require "add/auth.php";

require "add/connect.php";
require "add/header.php";

// DELETE Logic
if (isset($_GET['delete_id'])) {
    $stmt = $pdo->prepare("DELETE FROM resumedetails WHERE id = ?");
    $stmt->execute([$_GET['delete_id']]);
    header("Location: display.php?msg=Deleted");
    exit;
}

// READ Logic
$resumes = $pdo->query("SELECT id, first_name, last_name, email, pos FROM resumedetails")->fetchAll();
?>

<h2>Resume Management (A feature for admin only)</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($resumes as $r): ?>
    <tr>
        <td><?= htmlspecialchars($r['first_name'] . " " . $r['last_name']) ?></td>
        <td><?= htmlspecialchars($r['email']) ?></td>
        <td>
            <a href="index.php?edit_id=<?= $r['id'] ?>">Edit</a> | 
            <a href="display.php?delete_id=<?= $r['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php require "add/footer.php"; ?>