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
  <h4>Create Post</h4>
  <ul>
  
      <?php 
      if($insertPermission =="Y"){
    echo "<form action='' method='post'>
    <input type='text' value='$userID' name='userID' class='form-control'>

<label>Post Title</label>
<input type='text' name='postTitle' class='form-control'>
<label>Post Description</label>
<input type='text' name='postDescription' class='form-control'>
<br/>
<button name='createPost' class='btn btn-primary'>Create Post</button>
    </form>";
    
  }
  else{
        echo "You Dont Have permision";

  }


?>

  <a href="logout.php">Logout</a>
</div>

</body>
</html>