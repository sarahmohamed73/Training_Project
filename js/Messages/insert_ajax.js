$(".sendMessage").click(function(event){
  event.preventDefault();
  let name = $(".name").val();
  let email = $(".email").val();
  let subject = $(".subject").val();
  let message = $(".message").val();
  url = "Function/Messages/insert.php";
  $.post(url, {name, email,  subject, message}, function(data){
    console.log(data);
    $('.result').html(data);
    $('input , textarea').val('');
  })
})