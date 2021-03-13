<?php
$conn = mysqli_connect('localhost', 'root', '', 'ajax_crud');
extract($_POST);
$perPage = 3;
//pagination
if (isset($_POST['pagination'])) {
  $pageQuery = "SELECT * FROM `user`";
  $pageResult = mysqli_query($conn, $pageQuery);
  $totalRecords = mysqli_num_rows($pageResult);
  $totalPages = ceil($totalRecords / $perPage);
  echo $totalPages;
}
//update
if (isset($_POST['update_id']) && isset($_POST['update_firstname']) && isset($_POST['update_lastname'])  && isset($_POST['update_email']) && isset($_POST['update_mobile'])) {
  $query = "UPDATE `user` SET `firstname`='$update_firstname',`lastname`='$update_lastname',`email`='$update_email',`mobile`='$update_mobile' WHERE id=$update_id";
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
//select limit
if (isset($_POST['readRecord']) && isset($_POST['page'])) {
  $startFrom = ($page - 1) * $perPage;
  $query = "SELECT * FROM `user` order by id desc limit $startFrom,$perPage";
  $result = mysqli_query($conn, $query);
  $data = array();
  while ($row = mysqli_fetch_array($result)) {
    array_push($data, $row);
  }
  echo json_encode($data);
}
//insert
if (isset($_POST['firstname']) && isset($_POST['lastname'])  && isset($_POST['email']) && isset($_POST['mobile'])) {
  $query = "INSERT INTO `user`( `firstname`, `lastname`, `email`, `mobile`)
   VALUES ('$firstname','$lastname','$email','$mobile')";
  mysqli_query($conn, $query);
}