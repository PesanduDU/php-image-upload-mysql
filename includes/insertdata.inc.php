<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {

        try {

            require_once './dbh.inc.php';

            $username = $_POST['username'];
            $usermobile = $_POST['mobile'];



            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $userimage = $_FILES['file'];

                // $imagename = $userimage['name'];
                // $imageerror = $userimage['error'];
                // $imagetemp = $userimage['tmp_name'];

                // $filename_seperate = explode('.', $imagename);
                // $file_extension = strtolower(end($filename_seperate));
                // $file_extension = strtolower($filename_seperate[1]);

                // $extensions = array('jpeg', 'jpg', 'png');

                // if (in_array($file_extension, $extensions)) {
                //     $upload_image = '../images/' . $imagename;
                //     move_uploaded_file($imagetemp, $upload_image);
                // }

                // Define allowed image formats
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp'];

                // Check if image is uploaded properly
                $imageInfo = getimagesize($userimage['tmp_name']);
                $mimeType = $imageInfo['mime'];
            }


            // // Define allowed image formats
            // $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp'];

            // // Check if image is uploaded properly
            // $imageInfo = getimagesize($userimage['tmp_name']);
            // $mimeType = $imageInfo['mime'];

            if (empty($username) || empty($usermobile)) {
                header("Location: ../index.php?error=emptyusernameandmobile");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9_@#$]*$/", $username)) {
                header("Location: ../index.php?error=invalidusername");
                exit();
            } elseif (!preg_match("/^\+?[0-9]{10,15}$/", $usermobile)) {
                header("Location: ../index.php?error=invalidusermobile");
                exit();
            } elseif (!in_array($mimeType, $allowedMimeTypes)) {
                header("Location: ../index.php?error=imageformatmismatch");
                exit();
            } else {

                $imagename = $userimage['name'];
                $imagetemp = $userimage['tmp_name'];
                $upload_image = '../images/' . $imagename;
                move_uploaded_file($imagetemp, $upload_image);

                $query = "INSERT INTO `registration` (name, mobile, image) VALUES (?, ?, ?);";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$username, $usermobile, $upload_image]);

                // header("Location: ../index.php");
                // exit();

                print_r($userimage);


                // print_r($userimage);
                // echo '<br>';
                // print_r($file_extension);
                // echo $imageerror;
                // echo '<br>';
                // echo $imagetemp;
                // echo '<br>';
            }
        } catch (PDOException $err) {
            die("Query Failed! :" . $err->getMessage());
            header("Location: ../index.php");
        }
    } else {
        header("Location: ../index.php");
        exit();
    }
}
