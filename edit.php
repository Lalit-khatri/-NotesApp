<?php
     require_once("includes/db.php");
     require_once("includes/functions.php");
     // $sql = "SELECT * FROM todos";
     // $notes = mysqli_query($connection , $sql) ;
     
     if($_SERVER['REQUEST_METHOD'] == "POST")
     {
      
      $title = test_input($_POST['title']);
      $content = test_input($_POST['content']);
      $important = test_input($_POST['important']);
      $id = test_input($_POST['id']);

        $sql = "UPDATE todos SET ";
        $sql .= "title='" . $title  . "', ";
        $sql .= "content= '" . $content . "', ";
        $sql .= "important= '" . $important . "' ";
        $sql .= "WHERE id='" . $id . "' ";
        $sql .= "LIMIT 1";

     

      if(mysqli_query($connection , $sql))
      {
          echo"done";
          header("Location: index.php");
      }
      else
      {
        echo"SORRY couldn'd connect";
      }
    }

    if(!isset($_GET['id']))
    {
      echo"NOT SET";
      var_dump($_GET);
        header("Location: index.php");
    }

     $id = $_GET["id"];
     $query = "SELECT * FROM todos WHERE id='".$id."' LIMIT 1";
     $result = mysqli_query($connection , $query);
     $note = mysqli_fetch_assoc($result);
     mysqli_free_result($result);
    
     require_once("includes/footer.php");
   ?>  

<!DOCTYPE html>
<html>
<head>
  <title>Notes App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/style.css">

</head>
<body>
  <div class="container">
       <header>
           Notes App
         </header> 

           <div class="titleContainer">
                <div class="backlink">
                    <a class="home" href="index.php">Home</a>
               </div>
                  <div class="new-link">
                    <a class="home" href="new.php">New Note</a>
                   </div> 
           </div>
                  <form action = "edit.php" method = "POST">
                       <input type="hidden" name="id" value=<?php echo $note['id']; ?> />
            <span class="label">Title</span>
            <input type="text" name="title" value=<?php echo$note['title']; ?> />
            
            <span class="label">Content</span>
            <textarea name="content"> <?php echo $note['content']; ?> </textarea>

            <div class="chkgroup">
                <span class="label-in">Important</span>
                <input type="hidden" name="important" value="0" />
                <input type="checkbox" name="important" value="1" <?php if ($note['important']) {echo "checked"; } ?> />
            </div>
            
        <input type="submit" />
               </form>
    
  </div>
  

</body>
</html>