var delete_id = 0;
$("tbody").on("click",".delete",function(){
  let name = $(this).data("name");
  delete_id = $(this).data("id");
  console.log(name);
  console.log(delete_id);
  $(".modal-body .adminName").text(name);
})

$("body").on("click",".confirmDelete",function(event){
  event.preventDefault();
  console.log(delete_id);
  let deleteurl = "Function/Admins/delete.php";
  $.post(deleteurl, {id: delete_id}, function(data) {
    console.log(data)
  })
  $('#del').modal('hide');
  $(`.row${delete_id}`).remove();
})