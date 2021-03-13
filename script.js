page = 1;
val = "";
totalPage = 0;
search(val, page);
loadPagination(val);

$(`#page-item1`).addClass("btn-primary");

function getValAndSearch() {
  val = $("#search").val();
  search(val, 1);
  loadPagination(val);
}
function search(key, pagee) {
  page = pagee;
  $.ajax({
    url: "backend.php",
    type: "post",
    data: {
      page: pagee,
      key: key,
    },
    success: (data) => {
      console.log(data);
      data = JSON.parse(data);
      dataa = ``;
      data.map((val) => {
        dataa += `<tr>
                   <th>${val["id"]}</th>
                   <th>${val["firstname"]}</th>
                   <th>${val["lastname"]}</th>
                   <th>${val["email"]}</th>
                   <th>${val["mobile"]}</th>
                   <th><button data-toggle="modal" 
                   data-target="#updateModal" onclick="getUser(${val["id"]})" 
                   class="btn btn-warning">Edit</button></th>
                   <th><button onclick="deleteUser(${val["id"]})" class="btn btn-danger">Delete</button></th>
                 </tr>`;
      });
      $("tbody").html(dataa);
    },
  });
}

function updateUser() {
  const update_id = $("#hidden_id").val();
  const update_firstname = $("#update_firstname").val();
  const update_lastname = $("#update_lastname").val();
  const update_email = $("#update_email").val();
  const update_mobile = $("#update_mobile").val();
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
    success: function (data, status) {
      search("", 1);
      loadPagination("");
      $("#al").html(`
        <div
          class="alert alert-success alert-dismissible fade show"
          role="alert"
        >
          Update success
          <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
     `);
    },
  });
}

function deleteUser(deleteId) {
  const cofirm = confirm("Are you sure");
  if (confirm)
    $.ajax({
      url: "backend.php",
      type: "post",
      data: {
        deleteId: deleteId,
      },
      success: function (data, status) {
        search("", 1);
        loadPagination("");
        $("#al").html(`
          <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
          >
            Delete success
            <button
              type="button"
              class="close"
              data-dismiss="alert"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        `);
      },
    });
}

function getUser(id) {
  const getId = id;
  $.ajax({
    url: "backend.php",
    type: "post",
    data: {
      getId: getId,
    },
    success: (data, status) => {
      const user = JSON.parse(data);
      $("#hidden_id").val(user.id);
      $("#update_firstname").val(user.firstname);
      $("#update_lastname").val(user.lastname);
      $("#update_email").val(user.email);
      $("#update_mobile").val(user.mobile);
    },
  });
}

function loadPagination(key) {
  $.ajax({
    url: "backend.php",
    type: "post",
    data: {
      pagination: "pagination",
      key: key,
    },
    success: (data) => {
      output = "";
      console.log(data);
      for (let i = 1; i <= data; i++) {
        output += `<button id="page-item${i}" class="btn m-1" 
        onclick="search('${key}', ${i});loadPagination('${key}')">${i}</button>`;
      }
      $(".pagination").html(output);
      for (let i = 1; i <= data; i++)
        $(`#page-item${i}`).removeClass("btn-primary");

      $(`#page-item${page}`).addClass("btn-primary");
      console.log(page);
    },
  });
}

function addRecord() {
  const firstname = $("#firstname").val();
  const lastname = $("#lastname").val();
  const email = $("#email").val();
  const mobile = $("#mobile").val();
  $("#firstname").val("");
  $("#lastname").val("");
  $("#email").val("");
  $("#mobile").val("");
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
      search("", 1);
      loadPagination("");
      $("#al").html(`
        <div
          class="alert alert-success alert-dismissible fade show"
          role="alert"
        >
          Add success
          <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      `);
    },
  });
}
