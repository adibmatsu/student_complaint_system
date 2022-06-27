<?php
    session_start();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <?php include "../inc/header.php" ?>
        <h1 class="px-5 py-3">Make A Complaint</h1>
        <div class="container px-5 my-5">
        <form id="contactForm" action=".php" method="POST">
        <div class="form-floating mb-3">
            <select class="form-select" name="category" aria-label="Category" required >
                <option value=""></option>
                <option value="Electrical">Electrical</option>
                <option value="Plumbing">Plumbing</option>
                <option value="Furniture">Furniture</option>
            </select>
            <label for="category">Category</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="location" type="text" placeholder="Location" required />
            <label for="location">Location</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="description" type="text" placeholder="Description" required />
            <label for="description">Description</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="date" type="date" placeholder="Date" required />
            <label for="date">Date</label>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" name="submitButton" type="submit">Submit</button>
        </div>
    </form>
</div>
    </body>
</html>