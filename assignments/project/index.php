<?php require "add/header.php"; ?>
    
    <main>
        <form action="resumedetails.php" method="post">
            <fieldset>
                <legend id="start">Resume details</legend>
                <legend for="first_name" class="form-label">First name</legend>
                <input type="text" id="first_name" name="first_name" class="form-control" require>

                <legend for="last_name" class="form-label">Last name</legend>
                <input type="text" id="last_name" name="last_name" class="form-control" require>

                <legend for="pos" class="form-label">Current position</legend>
                <input type="text" id="pos" name="pos" class="form-control" require>

                <legend for="skills" class="form-label">Skills</legend>
                <input type="text" id="skills" name="skills" class="form-control" require>

                <legend for="email" class="form-label">Email</legend>
                <input type="email" id="email" name="email" class="form-control" require>

                <legend for="num" class="form-label">Phone number</legend>
                <input type="tel" id="num" name="num" class="form-control" placeholder="676-767-6767" require>
            </fieldset>

            <fieldset>
                <legend id="start">Summary</legend>
                <textarea id="sum" name="sum" rows="4" ></textarea>
            </fieldset>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
</body>
<?php require "add/footer.php"; ?>