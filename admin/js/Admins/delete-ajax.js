function DeleteAdmin(name, id){
  let name = name;
  let id = id;
  console.log(name);
  $(".adminName").text(name);
  $(".confirmDelete").data("id",id)
}

let triggerElement = '';

$('#del').on('shown.bs.modal', function (event) {
  triggerElement = $(event.relatedTarget); 
});

function ConfirmDeleteAdmin(this){
  let id = this.data('id');
  url = "Function/Admins/delete.php"
  $.post(url, {id}, function(data) {
    console.log(data)
  })
  triggerElement.parent().parent().remove();
  $('#del').modal('hide');
}