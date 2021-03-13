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
        Open modal
      </button>
    </div>
    <h2 class="text-danger">All records</h2>
    <div id="records_content"></div>
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
  <script>
  readReadcords();

  function updateUser() {
    const update_id = $("#hidden_id").val()
    const update_firstname = $("#update_firstname").val()
    const update_lastname = $("#update_lastname").val()
    const update_email = $("#update_email").val()
    const update_mobile = $("#update_mobile").val()
    $.ajax({
      url: "backend.php",
      type: "post",
      data: {
        update_id: update_id,
        update_firstname: update_firstname,
        update_lastname: update_lastname,
        update_email: update_email,
        update_mobile: update_mobile,
      },
      success: function(data, status) {
        readReadcords();
      }
    })
  }

  function deleteUser(deleteId) {
    const cofirm = confirm('Are you sure')
    if (confirm)
      $.ajax({
        url: "backend.php",
        type: "post",
        data: {
          deleteId: deleteId
        },
        success: function(data, status) {
          readReadcords();
        }
      })
  }

  function getUser(id) {
    const getId = id;
    $.ajax({
      url: "backend.php",
      type: "post",
      data: {
        getId: getId
      },
      success: (data, status) => {
        const user = JSON.parse(data)
        $("#hidden_id").val(user.id)
        $("#update_firstname").val(user.firstname)
        $("#update_lastname").val(user.lastname)
        $("#update_email").val(user.email)
        $("#update_mobile").val(user.mobile)
      }
    })
  }


  function readReadcords() {
    const readrecord = "readrecord";
    $.ajax({
      url: "backend.php",
      type: "post",
      data: {
        readrecord: readrecord
      },
      success: (data) => {
        $('#records_content').html(data)
      }
    })

  }

  function addRecord() {
    const firstname = $("#firstname").val();
    const lastname = $("#lastname").val();
    const email = $("#email").val();
    const mobile = $("#mobile").val();
    $.ajax({
      url: "backend.php",
      type: "post",
      data: {
        firstname: firstname,
        lastname: lastname,
        email: email,
        mobile: mobile,
      },
      success: () => {
        readReadcords();
      }
    });
  }
  </script>
</body>

</html>