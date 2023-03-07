$("tbody").on("click",".deleteAdmin",function(){
  let name = $(this).data("name");
  let id = $(this).data("id");
  console.log(name);
  console.log(id);
  $(".modal-body .adminName").text(name);
  $(".confirmDeleteAdmin").data("id",id);
})

let triggerElement = '';

$('#del').on('shown.bs.modal', function (event) {
  triggerElement = $(event.relatedTarget); 
});

$("body").on("click",".confirmDeleteAdmin",function(){
  let id = $(this).data("id");
  console.log(id);
  url = "Function/Admins/delete.php";
  $.post(url, {id}, function(data) {
    console.log(data)
  })
  triggerElement.parent().parent().remove();
  $('#del').modal('hide');
})