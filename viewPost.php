<?php
   include('session.php');
   if(isset($_POST['createPost'])){
    $postTitle  = $_POST['postTitle'];
        $postDescription  = $_POST['postDescription'];
        $postQuery = mysqli_query($db,"INSERT INTO posts VALUES(null,'$postTitle','$postDescription','$userID')");
        if($postQuery == TRUE){
          echo "Inert Value".$postTitle.$postDescription;
        }
        else{
          echo "Erro Value".$postTitle.$postDescription;

        }


   }
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
  <h4>View All Post</h4>
  <ul>
  
      <?php 
if($roleName == "administrator")
{
  echo "You Are Admin";
        if($viewPermission =="Y"){
    echo "<table class='table table-bordered'>
<tr>
<th>Post Title</th>
<th>Post Description</th>
<th>Post Action</th>
    </tr>";
   
    if($editPermission == "Y"){
      $postGetQuery = mysqli_query($db,"SELECT * FROM posts");
      while($row = mysqli_fetch_array($postGetQuery)){
        $postTitle = $row['postTitle'];
        $postDescription = $row['postDescription'];
  echo "<tr>
<th>$postTitle</th>
<th>$postDescription</th>
<th><a href='' class='btn btn-primary'>Edit</a></th>
    </tr>";
      }
        echo "</table>";

    }
    else
          if($editPermission == "N"){
      $postGetQuery = mysqli_query($db,"SELECT * FROM posts");
      while($row = mysqli_fetch_array($postGetQuery)){
        $postTitle = $row['postTitle'];
        $postDescription = $row['postDescription'];
  echo "<tr>
<th>$postTitle</th>
<th>$postDescription</th>
<th><a href='' class='btn btn-danger'>Not Allowed</a></th>
    </tr>";
      }
        echo "</table>";
          }

  }

  else{
        echo "You Dont Have permision";

  }


}

if($roleName == "employee")
{
        if($viewPermission =="Y"){
    echo "<table class='table table-bordered'>
<tr>
<th>Post Title</th>
<th>Post Description</th>
<th>Post Action</th>
    </tr>";
   
    if($editPermission == "Y"){
      $postGetQuery = mysqli_query($db,"SELECT * FROM posts WHERE userID='$userID'");
      while($row = mysqli_fetch_array($postGetQuery)){
        $postTitle = $row['postTitle'];
        $postDescription = $row['postDescription'];
  echo "<tr>
<th>$postTitle</th>
<th>$postDescription</th>
<th><a href='' class='btn btn-primary'>Edit</a></th>
    </tr>";
      }
        echo "</table>";

    }
    else
          if($editPermission == "N"){
      $postGetQuery = mysqli_query($db,"SELECT * FROM posts WHERE userID='$userID'");
      while($row = mysqli_fetch_array($postGetQuery)){
        $postTitle = $row['postTitle'];
        $postDescription = $row['postDescription'];
       echo "<tr>
      <th>$postTitle</th>
      <th>$postDescription</th>
      <th><a href='' class='btn btn-danger'>Not Allowed</a></th>
    </tr>";
      }
        echo "</table>";
          }

  }

  else{
        echo "You Dont Have permision";

  }
}


?>

  <a href="logout.php">Logout</a>
</div>

</body>
</html>