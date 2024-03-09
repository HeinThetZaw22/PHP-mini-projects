<?php
// touch("mytext.txt");
// mkdir("myfolder", 0777, true);

// var_dump(is_file("mytext.txt"));
// var_dump(is_dir("myfolder"));
// var_dump(file_exists("myfolder"));
// print_r(scandir("."));

//unlink is remove file
//rmdir is remove folder
// unlink("mytext.txt");
// rmdir("myfolder");

$fileName = "my.txt";
if(!file_exists($fileName)){
    touch($fileName);
}

//for file write
// $fileStream = fopen($fileName, "a");
// fwrite($fileStream, "hein");
// fwrite($fileStream, "thet");
// fwrite($fileStream, "zaw");
// fclose($fileStream);


//for file read
$fileStream = fopen($fileName, "r");
// echo fread($fileStream, 1024);
while(!feof($fileStream)){
    echo fgets($fileStream);
}
fclose($fileStream);
