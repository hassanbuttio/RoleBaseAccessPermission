n<?php
   include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3>Role Based Access For <?php echo $row['userFirstName'].' '.$roleName; ?></h3>
  <h4>Menu Post</h4>
  <ul>
  
      <?php if($viewPermission =="Y"){
echo "<li><a href='viewPost.php'>View Posts</a></li>";
  if($editPermission =="Y"){
  echo "<li><a href=''>Edit Posts</a></li>";
      if($deletePermission =="Y"){
      echo "<li><a href=''>Delete Posts</a></li>";
      if($insertPermission =="Y"){
    echo "<li><a href='createPost.php'>Create Post</a></li>";
        }
        }
  }


}
?>

  <a href="logout.php">Logout</a>
</div>

</body>
</html>