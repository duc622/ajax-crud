page = 1;
readRecords(page); //default
loadPagination();
totalPage = 0;
$("#page-item1").addClass("btn-primary");
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
      readRecords(page);
      loadPagination();
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
        readRecords(page);
        loadPagination();
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

function loadPagination() {
  $.ajax({
    url: "backend.php",
    type: "post",
    data: {
      pagination: "pagination",
    },
    success: (data) => {
      output = "";
      console.log(data);
      for (let i = 1; i <= data; i++) {
        output += `<button id="page-item${i}" class="btn m-1" onclick="readRecords(${i})">${i}</button>`;
      }
      $(".pagination").html(output);
      totalPage = data;
    },
  });
}

function readRecords(pagee) {
  $.ajax({
    url: "backend.php",
    type: "post",
    data: {
      readRecord: "readRecord",
      page: pagee,
    },
    success: (data) => {
      data = JSON.parse(data);
      dataa = ``;
      data.map((val) => {
        dataa += `<tr>
                   <th>${val["id"]}</th>
                   <th>${val["firstname"]}</th>
                   <th>${val["lastname"]}</th>
                   <th>${val["email"]}</th>
                   <th>${val["mobile"]}</th>
                   <th><button data-toggle="modal" data-target="#updateModal" onclick="getUser(${val["id"]})" class="btn btn-warning">Edit</button></th>
                   <th><button onclick="deleteUser(${val["id"]})" class="btn btn-danger">Delete</button></th>
                 </tr>`;
      });
      $("tbody").html(dataa);

      for (let i = 1; i <= totalPage; i++)
        $(`#page-item${i}`).removeClass("btn-primary");
      page = pagee;
      $(`#page-item${page}`).addClass("btn-primary");
      console.log(data);
    },
  });
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
      readRecords(page);
      loadPagination();
    },
  });
}
