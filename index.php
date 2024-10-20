<?php

    require_once "./includes/operations.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Images</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <h1 class="text-center my-5">Registration Form</h1>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" class="w-50">
            <?php inputFields("text", "username", "Enter your username!", "", "off");  ?>
            <?php inputFields("tel", "mobile", "Enter your mobile!", "", "off");  ?>
            <?php inputFields("file", "file", "", "", "");  ?>

            <button type="button" name="submit" class="btn btn-dark">Submit</button>
        </form>

    </div>

</body>

</html>