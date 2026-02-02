<?php require "includes/header.php"?>
<main>
    <h2>Contact form</h2>
    <form action="contact2.php" method="post">
        <fieldset>
            <legend>Customer Information</legend>
            <label for="first_name">First name</label>
            <input type="text" id="first_name" name="first_name" required>
            <label for="last_name">Last name</label>
            <input type="text" id="last_name" name="last_name" required>
            <label for="phone">Phone number</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </fieldset>
        <p>
            <button type="submit">Submit</button>
        </p>
    </form>
</main>

<?php require "includes/footer.php" ?>