<?php
session_start();
$conn = mysqli_connect("localhost", "root", "root", "guvi");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST["name"];
$password1 = $_POST["password1"];

if(empty($name) || empty($password1)){
  echo "Please Fill Out The Form!";
  exit;
}

$user = mysqli_query($conn, "SELECT * FROM user WHERE name = '$name' LIMIT 1");
if(mysqli_num_rows($user) > 0){

  $row = mysqli_fetch_assoc($user);

  if($password1 == $row['password1']){
   
    $_SESSION["login"] = true;
    $_SESSION["id"] = $row["id"];
    exit();
  }
  else{
    echo "Wrong Password";
    exit;
  }
}
else{
  echo "User not registered";
  exit;
}

mysqli_close($conn);

?>
