<?php

$db = mysqli_connect('localhost','root','','aplikasispp');
if(!$db){
    throw new Exception("Database gagal terkoneksi",1);
}

?>