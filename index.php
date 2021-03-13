<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ajax CRUD</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body>
  <div class="container">
    <h1 class="text-primary text-center">AJAX CRUD</h1>
    <div class="d-flex justify-content-end">
      <button class="btn btn-warning" data-toggle="modal" data-target="#myModal">
        Add user
      </button>
    </div>
    <h2 class="text-danger">All records</h2>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>first name</th>
          <th>last name</th>
          <th>email</th>
          <th>mobile</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <div class="pagination"></div>


    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add user</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-group">
              <label>First name:</label>
              <input type="text" name="" id="firstname" class="form-control" />
            </div>
            <div class="form-group">
              <label>Last name:</label>
              <input type="text" name="" id="lastname" class="form-control" />
            </div>
            <div class="form-group">
              <label>Email:</label>
              <input type="text" name="" id="email" class="form-control" />
            </div>
            <div class="form-group">
              <label>Mobile:</label>
              <input type="text" name="" id="mobile" class="form-control" />
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addRecord()">
              Save
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- The Update Modal -->
    <div class="modal" id="updateModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update User</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <input type="hidden" id="hidden_id">
            <div class="form-group">
              <label>First name:</label>
              <input type="text" name="" id="update_firstname" class="form-control" />
            </div>
            <div class="form-group">
              <label>Last name:</label>
              <input type="text" name="" id="update_lastname" class="form-control" />
            </div>
            <div class="form-group">
              <label>Email:</label>
              <input type="text" name="" id="update_email" class="form-control" />
            </div>
            <div class="form-group">
              <label>Mobile:</label>
              <input type="text" name="" id="update_mobile" class="form-control" />
            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateUser()">
              Update
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="script.js"></script>
</body>

</html>
<span></span>