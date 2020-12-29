<?php 
  
    require_once("includes/db.php");
   if(!isset($_GET['id']))
   {
   	header("Location: index.php");
   }
    
    $id = $_GET['id'];
   $query = "DELETE FROM workdone WHERE id='".$id."'";

   if(mysqli_query($connection , $query))
   {
   	header("Location: index.php");
   }
 ?>