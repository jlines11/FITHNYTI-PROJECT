<?php
try{
    $db=new PDO("mysql:host=localhost;dbname=fithnyti;","root","");
} catch (PDOException $e ){
    echo $e->getMessage();
}
?>