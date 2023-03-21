<?php 
function connect($query){
    $connection = new PDO ("mysql:host=localhost;dbname=duanan1;charset=utf8","root" ,"");
    $stmt = $connection->prepare ($query);
    $stmt ->execute();
    return $stmt;
}
function getone ($query){
    $data = connect($query) -> fetch();
    return $data;
}
function getall ($query){
    $data = connect($query) -> fetchAll();
    return $data;
}
?>