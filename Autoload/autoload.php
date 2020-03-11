<?php
  session_start();
  require_once __DIR__. "/../libraries/Database.php"; 
  require_once __DIR__. "/../libraries/function.php"; 
  $db = new Database;


  define("ROOT",$_SERVER['DOCUMENT_ROOT'] ."/php/Public/uploads/");



   $category = $db->fetchAll("category");
   $sqlNew ="select * from products order by id DESC LIMIT 4";
   $productNew = $db->fetchsql($sqlNew);
   $sqlHot = "select *from products order by pay DESC limit 1";
   $productHot = $db->fetchsql($sqlHot);
   $sqlHot2 = "select *from products order by pay DESC limit 6";
   $productHot2 = $db->fetchsql($sqlHot2);
?>