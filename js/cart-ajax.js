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
    var subtotal = Number($(".subtotal").html().trim().substring(1));
    $(".subtotal").text(`$${subtotal-price}`);
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
    var subtotal = Number($(".subtotal").text().trim().substring(1));
    $(".subtotal").text(`$${subtotal+price}`);
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
    $(`.row${id}`).remove();
    $(".loading").addClass("loading-hidden");
    var subtotal = Number($(".subtotal").text().trim().substring(1));
    $(".subtotal").text(`$${subtotal-totalPrice}`);
    var finalTotal = Number($(".finalTotal").text().trim().substring(1));
    $(".finalTotal").text(`$${finalTotal-totalPrice}`);
    var numPro = Number($(".numPro").text().trim().charAt(1));
    console.log(numPro);
    $(".numPro").text(`(${--numPro})`);
  })
}

// Coupon
$(".coupon").submit(function(event){
  event.preventDefault();;
  console.log(new FormData(this));
  let couponName = $(".couponName").val();
  if(couponName === "") {
    $(".message").html("<div class='message alert alert-danger' role='alert'>Please Enter Coupon First</div>");
  } else {
    $(".message").empty();
    $.ajax ({
      url: "Function/shoppingList/discount.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function(data) {
        let returnData = data.split("+");
        let couponDiscount = returnData[1];
        var subtotal = Number($(".subtotal").text().trim().substring(1));
        console.log(returnData, couponName, couponDiscount, subtotal);
        $(".finalTotal").text(`$${subtotal - (subtotal*(couponDiscount/100))}`);
      }
    });
  }
  
  $(this).trigger("reset");
})