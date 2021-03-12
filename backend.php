<?php
$conn = mysqli_connect('localhost', 'root', '', 'ajax_crud');
extract($_POST);
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
  $res = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $res = $row;
  }
  echo json_encode($res);
}
//delete
if (isset($_POST['deleteId'])) {
  $id = $_POST['deleteId'];
  $query = "DELETE FROM `user` WHERE id=$id";
  $result = mysqli_query($conn, $query);
}
//select
if (isset($_POST['readrecord'])) {
  $data = '<table class="table table-bordered table-striped">
            <tr>
              <th>ID</th>
              <th>first name</th>
              <th>last name</th>
              <th>email</th>
              <th>mobile</th>
              <th>edit</th>
              <th>delete</th>
            </tr>';
  $query = "SELECT * FROM `user` order by id desc";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $data .= '<tr>
                  <th>' . $row['id'] . '</th>
                  <th>' . $row['firstname'] . '</th>
                  <th>' . $row['lastname'] . '</th>
                  <th>' . $row['email'] . '</th>
                  <th>' . $row['mobile'] . '</th>  
                  <th><button data-toggle="modal" data-target="#updateModal" onclick="getUser(' . $row['id'] . ')" class="btn btn-warning">Edit</button></th>
                  <th><button onclick="deleteUser(' . $row['id'] . ')" class="btn btn-danger">Delete</button></th>              
                </tr>';
    }
    $data .= "</table>";
    echo $data;
  }
}
//insert
if (isset($_POST['firstname']) && isset($_POST['lastname'])  && isset($_POST['email']) && isset($_POST['mobile'])) {
  $query = "INSERT INTO `user`( `firstname`, `lastname`, `email`, `mobile`)
   VALUES ('$firstname','$lastname','$email','$mobile')";
  mysqli_query($conn, $query);
}