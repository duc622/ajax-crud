<?php
$conn = mysqli_connect('pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306', 'ru47msmzp4t19vj3', 'be9h3922cn8lrav9', 'z4zrvozudp2xxjls');
extract($_POST);
$perPage = 3;
//search limit
if (isset($_POST['page']) &&  isset($_POST['key'])) {
  $startFrom = ($page - 1) * $perPage;
  $query = "SELECT * FROM `user` where firstname like '%$key%' order by id desc limit $startFrom,$perPage";
  $result = mysqli_query($conn, $query);
  $data = array();
  while ($row = mysqli_fetch_array($result)) {
    array_push($data, $row);
  }
  echo json_encode($data);
}
//pagination
if (isset($_POST['pagination']) && isset($_POST['key'])) {
  $pageQuery = "SELECT * FROM `user` where firstname like '%$key%'";
  $pageResult = mysqli_query($conn, $pageQuery);
  $totalRecords = mysqli_num_rows($pageResult);
  $totalPages = ceil($totalRecords / $perPage);
  echo $totalPages;
}
//update
if (
  isset($_POST['update_id']) && isset($_POST['update_firstname'])
  && isset($_POST['update_lastname'])  && isset($_POST['update_email'])
  && isset($_POST['update_mobile'])
) {
  $query = "UPDATE `user` SET `firstname`='$update_firstname',`lastname`='$update_lastname',
  `email`='$update_email',`mobile`='$update_mobile' WHERE id=$update_id";
  mysqli_query($conn, $query);
}
//select by id
if (isset($_POST['getId'])) {
  $id = $_POST['getId'];
  $query = "SELECT * FROM `user` where id=$id";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  echo json_encode($row);
}
//delete
if (isset($_POST['deleteId'])) {
  $id = $_POST['deleteId'];
  $query = "DELETE FROM `user` WHERE id=$id";
  $result = mysqli_query($conn, $query);
}

//insert
if (
  isset($_POST['firstname']) && isset($_POST['lastname'])
  && isset($_POST['email']) && isset($_POST['mobile'])
) {
  $query = "INSERT INTO `user`( `firstname`, `lastname`, `email`, `mobile`)
   VALUES ('$firstname','$lastname','$email','$mobile')";
  mysqli_query($conn, $query);
}