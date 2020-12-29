<?php
   require_once('includes/db.php');
   $query = "SELECT * FROM todos";
    $workdo = "SELECT * FROM workdone";

    $done = mysqli_query($connection , $workdo);
    $notes = mysqli_query($connection , $query);
      

    ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit notes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
	<header>
		  Notes App
	</header>
	<div>
	         <div class="titleContainer">
	         	<a class=" home nav-link" href="new.php">Add a new note</a>
	         </div>
             <div class="bodycontainer">
                 <div class="overflowhead">
                    ""
                    Work Todo
                    <span class="overflower"> "" Done</span>
                 </div>
                 

             
             <div class="overflow">
             	 <?php while( $note = mysqli_fetch_assoc($notes)) { ?>
             	      <div class="titlediv">
             	      	 <span class="nt-title"><?php echo $note['title'] ;?></span>
             	      	 <div class="nt-links">
             	      	 	<a class="nt-link" href= "edit.php?id=<?php echo$note['id'] ;?>">Edit note</a>
             	      	 	<a class="nt-link" href = "delete.php?id=<?php echo$note['id'] ;?>" >[X]</a>
             	      	 </div>
             	      	</div>

             	      	<div class= "nt-content"  >
             	      	 <?php if($note['important'])
             	      	         {
             	      	         	echo "<span class = 'imp'> IMPORTANT </span>";
             	      	         }
             	      	         ?>
             	      	  <?php echo$note['content']; ?>        
             	      		
             	      	</div>
             	      	 <?php  } 
             	      	  mysqli_free_result($notes)
             	      	  ?>

                         
             	      	 </div>


                          <div class="overflow">
                            <?php while( $do = mysqli_fetch_assoc($done)) { ?>
                               <div class="titlediv">
                                   <span class="nt-title"><?php echo $do['title'] ;?></span>
                                 <div class="nt-links">
                                 
                                  <a class="nt-link" href = "delete1.php?id=<?php echo$do['id'] ;?>" >[X]</a>
                                    </div>
                                   </div>
           
                                   <div class= "nt-content"  >
                                            <?php if($do['important'])
                                                {
                                                   echo "<span class = 'imp'> IMPORTANT </span>";
                                                 }
                                              ?>
                                       <?php echo$do['content']; ?>        
                                         
                                     </div>
                                     <?php  } 
                                           mysqli_free_result($done)
                                             ?>

                         
                          </div>


             	      
             </div>


    </div>

</body>
</html>