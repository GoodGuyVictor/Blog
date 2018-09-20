<?php

use blog\db\Db;
require_once ("Db.php");

session_start();

$error = '';

if($_POST['update-post']) {
    if($_POST['post-title'] && $_POST['post-content']) {
        $db = Db::instance();
        $sql = "UPDATE post SET title ='" . $_POST['post-title'] . "', content ='" . $_POST['post-content'] . "', updated_at = now() WHERE id =". $_SESSION['post_id'];
        $db->sqlQuery($sql);
        header('Location: review.php?post='.$_SESSION['post_id']);
        exit;
    } else {
        $_SESSION['error'] = 'Title and content are necessary fields';
        header('Location: edit-post.php');
        exit;
    }
} else {

    if ($_POST['post-title'] && $_POST['post-content']) {

        $imageUploaded = false;

        //checking for image and transferring it to permanent location
        if ($_FILES['post-image']['error'] == UPLOAD_ERR_OK) {
            $target_dir = '\images\\';
            $target_file = __DIR__ . $target_dir . basename($_FILES['post-image']['name']);
            $imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($imageType != 'jpeg' && $imageType != 'jpg' && $imageType != 'png' && $imageType != 'gif' && $imageType != 'svg') {
                $error .= 'Uploaded file should be an image (.jpeg or .jpg or .png or .svg or .gif)';
            }

            if ($error) {
                $_SESSION['error'] = $error;
                header('Location: new-post.php');
                exit;
            } else {
                if (!move_uploaded_file($_FILES['post-image']['tmp_name'], $target_file)) {
                    $_SESSION['error'] = 'Failed to upload the image';
                    header('Location: new-post.php');
                    exit;
                } else {
                    unset($_SESSION['error']);
                    $imageUploaded = true;
                }
            }
        }

        $db = Db::instance();
        if ($imageUploaded) {
            $imagePath = 'images/' . basename($_FILES['post-image']['name']);
            $sql = "INSERT INTO post (title, content, image, author_id) VALUES('" . $_POST["post-title"] . "', '" . $_POST["post-content"] . "', '" . $imagePath . "', '" . $_SESSION['user_id'] . "')";
        } else {
            $sql = "INSERT INTO post (title, content, author_id) VALUES('" . $_POST["post-title"] . "', '" . $_POST["post-content"] . "', '" . $_SESSION['user_id'] . "')";
        }

        $db->sqlQuery($sql);
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['error'] = 'Title and content are necessary fields';
        header('Location: new-post.php');
        exit;
    }

}