// $.getScript("js/Admins/delete-ajax.js", function () {
//   console.log("The script is loaded but not necessarily executed.");
// });

// $(".addUser").click(function(){
//   let username = $(".username").val();
//   let password = $(".password").val();
//   let email = $(".email").val();
//   let phone = $(".phone").val();
//   let gender = $(".gender:checked").val();
//   let address = $(".address").val();
//   let privliges = $(".privliges").val();
//   let url = "Function/Admins/insert.php";
//   $.post(url , {username, password, email, phone, gender, address, privliges}, function(data){
//     console.log(data);
//     let id = data;
//     $("tbody").append(`
//       <tr>
//         <td>${id}</td>
//         <td>${username}</td>
//         <td>${email}</td>
//         <td>${phone}</td>
//         <td>${address}</td>
//         <td>${gender == 0 ? "Male" : "Female"}</td>
//         <td>${privliges == 0 ? "Admin" : "User"}</td>
//         <td>
//           <a class="btn btn-primary" href="?action=edit&id=${id}">Edit</a>
//           <button type="button" class="delete btn btn-danger" onclick="Delete(${username}, ${id})" data-toggle="modal" data-target="#del" data-id="${id}" data-name="${username}">
//           Delete
//         </button>
//         </td>
//       </tr>
//     `)
//   })
//   $('#add').modal('hide');
// })