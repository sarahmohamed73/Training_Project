var edit_id = 0;
$("tbody").on("click",".edit",function(){
  edit_id = $(this).data("id");
  sessionStorage.setItem('id',edit_id);
  var username = $(`.username${edit_id}`).html();
  var email = $(`.email${edit_id}`).html();
  var phone = $(`.phone${edit_id}`).html();
  var address = $(`.address${edit_id}`).html();
  var gender = $(`.gender${edit_id}`).html() == "Male" ? "0" : "1";
  var privliges = $(`.privliges${edit_id}`).html() == "Admin" ? "0" : "1";
  $(".id").val(edit_id);
  $("#editusername").val(username);
  $("#editemail").val(email);
  $("#editphone").val(phone);
  $("#editaddress").val(address);
  $(`input:radio[name=gender][value=${gender}]`).attr("checked",true);
  $(`#editadmin option[value=${privliges}]`).attr("selected",true);
});

$("body").on("submit",".editForm",function(event){
  event.preventDefault();
  let editurl = "Function/Admins/update.php";
  let editformdata = new FormData(this);
  console.log(editformdata.get("gender"));
  $.ajax({
    url: editurl,
    method: "POST",
    data: editformdata,
    contentType: false,
    processData: false,
    success: function(){
      console.log();
      $(`.username${edit_id}`).html(editformdata.get("username"));
      $(`.email${edit_id}`).html(editformdata.get("email"));
      $(`.phone${edit_id}`).html(editformdata.get("phone"));
      $(`.address${edit_id}`).html(editformdata.get("address"));
      $(`.gender${edit_id}`).html(editformdata.get("gender") == 0 ? "Male" : "Female");
      $(`.privliges${edit_id}`).html(editformdata.get("privliges") == 0 ? "Admin" : "User");
    }
  })
  $('#edit').modal('hide');
})