$(".deleteProduct").click(function(){
  let name = $(this).data("name");
  let id = $(this).data("id");;
  $(".adminName").text(name);
  $(".confirmDeleteProduct").data("id",id)
})

let triggerElement = '';

$('#del').on('shown.bs.modal', function (event) {
  triggerElement = $(event.relatedTarget); 
});

$(".confirmDeleteProduct").click(function(){
  let id = $(this).data("id");
  console.log(id);
  url = "Function/Products/delete.php";
  $.post(url, {id}, function(data) {
    console.log(data)
  })
  triggerElement.parent().parent().remove();
  $('#del').modal('hide');
})
