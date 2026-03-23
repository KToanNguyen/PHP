<?php
require "includes/header.php";

$errors = [];
$success = "";
$imagePath = null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] !== UPLOAD_ERR_NO_FILE){
        if($_FILES['profile_image']['error'] !== UPLOAD_ERR_OK){
            $errors[] = "There is a problem while uploading your file!";
        }
        else{
            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];
            $detectedType = mime_content_type($_FILES['profile_image']['tmp_name']);
            if(!in_array($detectedType, $allowedTypes, true)){
                $errors[] = "Accept only: .jpeg, .jpg, .png, .webp";
            }
            else{
                $exten = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);

                $imageFile = uniqid('profile_', true). "." .strtolower($exten);

                $dest = __DIR__ . '/uploads/' . $imageFile;

                if(move_uploaded_file($_FILES['profile_image']['tmp_name'], $dest)){
                    //Save relative path
                    $imagePath = 'uploads/' . $imageFile;
                }
                else{
                    $errors[] = "Image uploaded failed";
                }
            }
        }
    }
}

?>

<main class="container mt-4">
    <h1>Add Your Profile Picture</h1>

    <?php if (!empty($errors)): ?>
        <div class="">
            <h3>Please fix the following:</h3>
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($success !== ""): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($success); ?>
        </div>
    <?php endif; ?>
    <!--enctype="multipart/form-data" required for uploads, will not send properly if not included -->
    <form method="post" enctype="multipart/form-data" class="mt-3">
        <label for="profile_image" class="form-label">Select your image</label>
        <input
            type="file"
            id="profile_image"
            name="profile_image"
            class="form-control mb-4"
            accept=".jpg,.jpeg,.png,.webp"
        >

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>