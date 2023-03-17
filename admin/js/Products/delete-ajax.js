let id = 0
$("tbody").on("click",".delete",function(){
  let name = $(this).data("name");
  id = $(this).data("id");;
  $(".productName").text(name);
})

$("body").on("click",".confirmDelete",function(){
  url = "Function/Products/delete.php";
  $.post(url, {id}, function(data) {
    console.log(data)
  })
  $(`.row${id}`).remove();
  $('#del').modal('hide');
})
