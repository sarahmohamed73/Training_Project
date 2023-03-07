$(".addProduct").click(function(e){
  e.preventDefault();
  let name = $(".name").val();
  let price = $(".price").val();
  let sale = $(".sale").val();
  let img = $(".image")[0].files;
  let category = $(".category").val();
  let trending = $(".trending:checked").val();
  let description = $(".description").val();
  let form_data = new FormData();
  for(let i = 0; i<img.length; i++) {
    form_data.append("image[]", img[i]);
  }
  console.log(form_data);
  let url = "Function/Products/insert.php";

  $.ajax({
    url: url,
    method: "POST",
    data: form_data,
    contentType: false,
    processData: false,
    success: function(data) {
      console.log(data);
    }
  })

  // $.post(url , {name, price, sale, category, trending, description}, function(data){
  //   console.log(data);
  //   console.log("Success");
  //   let id = data;
  //   $("tbody").prepend(`
  //     <tr>
  //       <td>${id}</td>
  //       <td>${name}</td>
  //       <td>${price}</td>
  //       <td>${sale}</td>
  //       <td>${images}</td>
  //       <td>${category}</td>
  //       <td>${trending == 0 ? "NOT TRENDING" : "TRENDING"}</td>
  //       <td>
  //         <a class="btn btn-primary" href="?action=edit&id=${id}">Edit</a>
  //         <button type="button" class="delete btn btn-danger" onclick="Delete(${name}, ${id})" data-toggle="modal" data-target="#del" data-id="${id}" data-name="${name}">
  //         Delete
  //       </button>
  //       </td>
  //     </tr>
  //   `)
  // })
  $('#add').modal('hide');
})