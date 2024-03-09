<?php

echo "<pre>";
// print_r($_FILES);

$saveFolder = "photos";
if (!is_file($saveFolder)) {
    mkdir($saveFolder);
};

// $ext = pathinfo($_FILES["upload"]["name"])["extension"];

//but never use your uploaded img name to avoid overwrite
//you can add unquid()
// $save_file_path = $saveFolder . "/". uniqid().".".$ext;

//when you upload, file is stored somewhere in temporary server path
//have to move back to your local file path
// if (move_uploaded_file($_FILES["upload"]["tmp_name"], $save_file_path)) {
//     header("location:gallery.php");
// };

// print_r(pathinfo($_FILES["upload"]["name"])["extension"]);

//for multiple img
$error = false;

foreach ($_FILES["upload"]["name"] as $key => $name) {
    $ext = pathinfo($name)["extension"];
    $save_file_path = $saveFolder . "/" . uniqid() . "." . $ext;

    // move_uploaded_file() return true/false
    if (!move_uploaded_file($_FILES["upload"]["tmp_name"][$key], $save_file_path)) {
        $error = true;
    };
}
if ($error === false) {
    header("location:gallery.php");
}
