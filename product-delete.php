<?php 
// print_r($_GET);
$fileName = $_GET["file"];

//search data from file read
$filePath = file_get_contents("products/" . $fileName);
// echo $filePath;
//change to json to delete photo file path, then all data
$obj = json_decode($filePath);

if(unlink($obj->product_photo) && unlink("products/".$fileName)){
     header("location:product.php");
}else{
    echo "Error deleting product";
}
