<?php
try {
    $con = new PDO('mysql:host=localhost;dbname=login','root','');
}catch (PDOException $e){
    var_dump("Tidak dapat mengakses database : " . $e->getMessage());
}
?>
