<?php
   include('config.php');
   session_start();
   
   $userID = $_SESSION['userID'];
   
   $ses_sql = mysqli_query($db,"select * from users where userID = '$userID' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $sess_sql = mysqli_query($db,"SELECT users.*,roles.*,userpermissions.* FROM users INNER JOIN roles ON roles.roleID=users.roleID INNER JOIN userpermissions ON userpermissions.userID=users.userID WHERE users.userID='$userID'");
   $rows= mysqli_fetch_array($sess_sql,MYSQLI_ASSOC);


   $userID = $row['userID'];
   $viewPermission = $rows['viewPermission'];
   $insertPermission = $rows['insertPermission'];
   $editPermission = $rows['editPermission'];
   $deletePermission = $rows['deletePermission'];
   $roleName = $rows['roleName'];

   if(!isset($_SESSION['userID'])){
      header("location:index.php");
      die();
   }
?>