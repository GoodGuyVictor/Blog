<?php

use blog\db\Db;
require_once ("Db.php");

session_start();

$error = '';

if($_POST['post-title'] && $_POST['post-content']) {

    $imageUploaded = false;

    if($_FILES['post-image']['error'] == UPLOAD_ERR_OK) {
        $target_dir = '\images\\';
        $target_file = __DIR__ . $target_dir . basename($_FILES['post-image']['name']);
        $imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if($imageType != 'jpeg' && $imageType != 'jpg' && $imageType != 'png' && $imageType != 'gif' && $imageType != 'svg') {
            $error .= 'Uploaded file should be an image (.jpeg or .jpg or .png or .svg or .gif)';
        }

        if($error) {
            $_SESSION['error'] = $error;
            header('Location: new-post.php');
            exit;
        } else {
            if(!move_uploaded_file($_FILES['post-image']['tmp_name'], $target_file)) {
                $_SESSION['error'] = 'Failed to upload the image';
                header('Location: new-post.php');
                exit;
            } else {
                unset($_SESSION['error']);
                $imageUploaded = true;
            }
        }
    }

    $db = Db::getInstance();
    $date = new DateTime();
    if($imageUploaded) {
        $imagePath = 'images/' . basename($_FILES['post-image']['name']);
        $sql = "INSERT INTO post (title, content, image) VALUES('".$_POST["post-title"]."', '".$_POST["post-content"]."', '".$imagePath."')";
    }
    else {
        $sql = "INSERT INTO post (title, content) VALUES('".$_POST["post-title"]."', '".$_POST["post-content"]."')";
    }

    $db->sqlQuery($sql);
    header('Location: index.php');
    exit;
} else {
    $_SESSION['error'] = 'Title and content are necessarily fields';
    header('Location: new-post.php');
    exit;
}