//DECREASE
function decrease(id,price) {
  var url = `Function/shoppingList/update.php?action=decrease&id=${id}`;
  $(".loading").removeClass("loading-hidden");
  $.get(url, function(data){
    console.log(data);
    if($(`.product${id}`).val() == 1) {
      $(`.decrease${id}`).addClass("disabled");
    }
    $(`.product${id}`).val(data)
    $(".loading").addClass("loading-hidden");
    $(`.totalPrice${id}`).text(`$${price*data}`);
    var suptotal = Number($(".subtotal").html().trim().substring(1));
    $(".subtotal").text(`$${suptotal-price}`);
    var finalTotal = Number($(".finalTotal").html().trim().substring(1));
    $(".finalTotal").text(`$${finalTotal-price}`);
  })
}

//INCREASE 
function increase(id,price) {
  var url = `Function/shoppingList/update.php?action=increase&id=${id}`;
  $(".loading").removeClass("loading-hidden");
  $.get(url, function(data){
    console.log(data);
    if($(`.product${id}`).val() > 1) {
      $(`.decrease${id}`).removeClass("disabled");
    }
    $(`.product${id}`).val(data)
    $(".loading").addClass("loading-hidden");
    $(`.totalPrice${id}`).text(`$${price*data}`);
    var suptotal = Number($(".subtotal").text().trim().substring(1));
    $(".subtotal").text(`$${suptotal+price}`);
    var finalTotal = Number($(".finalTotal").text().trim().substring(1));
    $(".finalTotal").text(`$${finalTotal+price}`);
  })
}

//DELETE 
function Delete(id) {
  var url = `Function/shoppingList/delete.php?id=${id}`;
  $(".loading").removeClass("loading-hidden");
  var totalPrice = $(`.totalPrice${id}`).text().trim().substring(1);
  console.log(totalPrice);
  $.get(url, function(data){
    console.log(data);
    $(".loading").addClass("loading-hidden");
    var suptotal = Number($(".subtotal").text().trim().substring(1));
    $(".subtotal").text(`$${suptotal-totalPrice}`);
    var finalTotal = Number($(".finalTotal").text().trim().substring(1));
    $(".finalTotal").text(`$${finalTotal-totalPrice}`);
  })
}