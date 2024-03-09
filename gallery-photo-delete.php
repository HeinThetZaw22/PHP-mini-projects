<?php 
$id = $_GET["id"];
// echo $id;
$folder_name = "photos";
if(unlink($folder_name."/".$id)){
    header("location:gallery.php");
}