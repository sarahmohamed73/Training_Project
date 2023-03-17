$(".add").submit(function(event){
  event.preventDefault();
  let addformdata = new FormData(this);
  let url = "Function/Products/insert.php";

  $.ajax({
    url: url,
    method: "POST",
    data: addformdata,
    contentType: false,
    processData: false,
    success: function(data) {
      console.log(data);
      let returnData = data.split("+");
      let id = returnData[0];
      let images = returnData[1].split(",");
      let printImage = '';
      console.log(id);
      console.log(images);
      images.forEach(image => {
        printImage += `<img style="width: 100px;" src="Images/${image}" alt=""><br>`
      });
      $("tbody").prepend(`
        <tr class="row${id}">
          <td class="id${id}">${id}</td>
          <td class="name${id}" style="width:300px">${addformdata.get("name")}</td>
          <td class="price${id}">${addformdata.get("price")}</td>
          <td class="sale${id}">${addformdata.get("sale")}</td>
          <td class="images${id}" style="width:150px">${printImage}</td>
          <td class="cat_name${id}">${addformdata.get("category")}</td>
          <td class="trend${id}">${addformdata.get("trending") == 0 ? "NOT TRENDING" : "TRENDING"}</td>
          <td>
            <a class="btn btn-primary" href="?action=edit&id=${id}">Edit</a>
            <!-- Button trigger modal -->
            <button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#del" data-id="${id}" data-name="${addformdata.get("name")}">
              Delete
            </button>
          </td>
        </tr>
      `)
    }
  })

  $('#add').modal('hide');
})