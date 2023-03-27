<?php
session_start();
if (isset($_SESSION['student_Id'])) {
  header("Location: profile.php");
}
else if(isset($_SESSION['admin_Id']))
{
  header("Location: admin/dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignIn To Continue</title>
  <link rel="stylesheet" href="includes/css/style.css" />
</head>
<body>
 <?php include('admin/forms/signin.php') ?>
</body>
</html>

<script>
  document.getElementById("signInForm").addEventListener("submit",function(e){
  e.preventDefault();
  const username = $("#tx_username").val();
  const password = $("#tx_password").val();
  onFormSubmit(username,password,false);
  });
</script>

<script type="text/javascript" src="includes/js/action.js"></script>
<script type="text/javascript" src="includes/js/main.js"></script>
<style>
 
</style>