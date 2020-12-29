<?php
   require_once('includes/db.php');
    if (!isset($_GET['id']))
    {
        header("Location: index.php");
    }
   $id = $_GET['id'];
   $sql = "SELECT * FROM todos WHERE  id='".$id."' LIMIT 1";
   $result = mysqli_query($connection , $sql);
   $note = mysqli_fetch_assoc($result);
   
   
    $title = $note['title'];
    $content = $note['content'];
    $important = $note['important'];

   $query= "INSERT INTO workdone (title , content , important)
             VALUES('". $title."' , '". $content ."' , '". $important ."') ";
 
    mysqli_query($connection , $query);

    $query = "DELETE FROM todos WHERE id='".$id."'";

   if(mysqli_query($connection , $query))
   {
   	header("Location: index.php");
   } 
   

    
  ?>