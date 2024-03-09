<?php

// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);

$photoFolder = "product-photos";
$productFolder = "products";

if(!is_dir($photoFolder)){
    mkdir($photoFolder);
}
if(!is_dir($productFolder)){
    mkdir($productFolder);
}

//for photo name changing
$ext = pathinfo($_FILES["product_image"]["name"])["extension"];
//making photo file path
$photoFileName = $photoFolder. "/". uniqid() . "." . $ext;


//move from server to local save
//and return photo file to render...
if(move_uploaded_file($_FILES['product_image']['tmp_name'], $photoFileName)){
    $_POST["product_photo"] = $photoFileName;
}

//change all data to json
$json = json_encode($_POST);
//making product file path
$productFileName = $productFolder . "/". uniqid() . $_POST["product_name"] . ".json";

//make file and write 
touch($productFileName);
$fileStream = fopen($productFileName, 'w');
fwrite($fileStream, $json);
fclose($fileStream);

header("location:product.php");