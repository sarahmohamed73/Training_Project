$(".showMessage").click(function(){
  let name = $(this).data("name");
  let message = $(this).data("message");
  console.log(name);
  console.log(message);
  $(".onwerMassage").text(name);
  $(".message").text(message);
  let check = $(this).parent().prev().text().trim();
  if(check != "Read") {
    $(this).parent().prev().text("Read");
    let id = $(this).data("id");
    url = "Function/Messages/update.php";
    $.post(url, {id}, function(data){
      console.log(data);
    })
    let numMessage = Number($(".numMessage").text().trim());
    $(".numMessage").text(--numMessage);
  }
})