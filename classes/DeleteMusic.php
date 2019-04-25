<?php

 require_once '../classes/DB.php';
 require_once 'MusicTable.php';
 
 if (!isset($_GET['id'])){
     die("illegal request");
 }
 
 $id =$_GET['id'];
 
 $connection=  DB::getConnection();
 
 $gateway = new MusicTable($connection);
 
 $gateway->delete($id);
 
 header("location: ../home.php");
 ?>
