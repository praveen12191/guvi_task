<?php
$conn = new MongoDB\Client("mongodb://localhost:27017");
$db = $conn->mydatabase;
$collection = $db->users;
$user_id = $_GET['id'];
$user = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($user_id)]);
if (!$user) {
  die('User not found');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $update_data = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'img' => $_POST['img'],
    'phone'=> $_POST['phone'],
    'address'=> $_POST['address']
  ];
  $collection->updateOne(['_id' => new MongoDB\BSON\ObjectID($user_id)], ['$set' => $update_data]);
  header("Location: profile.php?id=$user_id");
  exit();
}
?>
