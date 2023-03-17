$(".addForm").submit(function(event){
  event.preventDefault();
  let inserturl = "Function/Admins/insert.php";
  let addformdata =new FormData(this);
  $.ajax({
    url: inserturl,
    method: "POST",
    data: addformdata,
    contentType : false , 
		processData : false ,
    success: function(data){
      console.log(data);
      $("tbody").append(`
      <tr class="row${data}">
        <td class="id${data}">${data}</td>
        <td class="username${data}">${addformdata.get("username")}</td>
        <td class="email${data}">${addformdata.get("email")}></td>
        <td class="phone${data}">${addformdata.get("phone")}</td>
        <td class="address${data}">${addformdata.get("address")}</td>
        <td class="gender${data}">${addformdata.get("gender") == 0 ? "Male" : "Female"}</td>
        <td class="privliges${data}">${addformdata.get("privliges") == 0 ? "Admin" : "User"}</td>
        <td>
          <!-- Button trigger modal -->
          <button type="button" class="edit btn btn-primary" data-toggle="modal" data-target="#edit" data-id="${data}">
            Edit
          </button>
          <!-- Button trigger modal -->
          <button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#del" data-id="${data}" data-name="${addformdata.get("username")}">
            Delete
          </button>
        </td>
      </tr>
    `)
    }
  })
  $(this).trigger("reset");
  $('#add').modal('hide');
})