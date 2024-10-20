<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Datas</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        img{
            width: 200px;
        }
    </style>
</head>

<body>

    <h1 class="text-center my-5">User Data</h1>

    <div class="container mt-5 d-flex justify-content-center">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID N0.</th>
                    <th scope="col">Username</th>
                    <th scope="col">Mobile NO.</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once './includes/retrievedata.php';
                require_once './includes/operations.inc.php';

                $data = getAllUserData();

                foreach ($data as $row):
                    $uid = $row['id'];
                    $uname = $row['name'];
                    $umobile = $row['mobile'];
                    $uimage = $row['image'];
                ?>

                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($uid) ?></th>
                        <td><?php echo htmlspecialchars($uname) ?></td>
                        <td><?php echo htmlspecialchars($umobile) ?></td>
                        <td class="d-flex justify-content-center"><img src="images/<?php echo getImage($uimage) ?>" alt=""></td>
                        <!-- <td><?php //echo getImage($uimage) 
                                    ?></td> -->
                    </tr>

                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>

</body>

</html>