<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
include "init.php";
error_reporting(0);     
if(isset($_FILES['images']['name'])):
  define ("MAX_SIZE","2000");
  for($i=0; $i<count($_FILES['images']['name']); $i++)  {
  $size=filesize($_FILES['images']['tmp_name'][$i]);    
  if($size < (MAX_SIZE*1024)):    
   $path = "uploads/";
   $name = $_FILES['images']['name'][$i];
   $size = $_FILES['images']['size'][$i];
   list($txt, $ext) = explode(".", $name);
   date_default_timezone_set ("Asia/Kabul"); 
   $currentdate=date("d M Y");  
   $file= time().substr(str_replace(" ", "_", $txt), 0);
   $info = pathinfo($file);
   $filename = $file.".".$ext;
    if(move_uploaded_file($_FILES['images']['tmp_name'][$i], $path.$filename)) :
       $fetch=$conn->query("INSERT INTO attachments(image) VALUES('$filename')");
       if($fetch):
         header('Location:dashboard.php');
       else :
         $error ='Data not inserting';
       endif;
    endif;
  else:
     $error = 'You have exceeded the size limit!';
  endif;      
  }
endif;          
?>
 