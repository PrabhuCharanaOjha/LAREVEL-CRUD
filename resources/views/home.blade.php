<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <title>LARAVEL CRUD</title>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1>INSERT STUDENT INFORMATION</h1>
        <form action="" method="post">
          @csrf
          <div class="form-group my-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter User Name" aria-describedby="helpId">
          </div>
          <div class="form-group my-2">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" placeholder="Enter User City" aria-describedby="helpId">
          </div>
          <div class="form-group my-2">
            <label for="marks">Marks</label>
            <input type="file" name="marks" id="marks" class="form-control" placeholder="Enter User Marks" aria-describedby="helpId">
          </div>
          <div class="form-group my-2">
            <button type="button" class="btn btn-success btn-sm" onclick="adduserdata();">Submit</button>
          </div>
        </form>
      </div>
      <div class="col-sm-6 text-center">
        <h1>VIEW STUDENT DETAILS</h1>
        <table class="table">
          <thead>
            <tr>
              <th>SL. NO.</th>
              <th>NAME</th>
              <th>CITY</th>
              <th>MARKS</th>
              <th>ACTIONS</th>
            </tr>
          </thead>
          <tbody id="tBody">
            <tr>
              <td scope="row"></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <a href="" class="btn btn-info btn-sm">edit</a>
                <a href="" class="btn btn-danger btn-sm">delete</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <!-- javascript work start -->
  <script>
    function adduserdata() {
      var _token = $('input[name=_token]').val();
      var name = $('#name').val();
      var city = $('#city').val();
      var marks = $('#marks').prop('files')[0];

      var menu_data = new FormData();
      menu_data.append('_token', _token);
      menu_data.append('marks', marks);
      menu_data.append('name', name);
      menu_data.append('city', city);



      $.ajax({
        url: '/create',
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: menu_data,
        type: 'post',

        success: function(data) {
          console.log(data);
          if (data.msg == 'success') {
            alert("data added successfully...")
          }
        }
      });

    }


    getalluserdata();

    function getalluserdata() {
      $.ajax({
        url: '/getStudentDetails',
        type: "GET",
        success: function(data) {

          var JSONDATA = data.students;
          var tag = '';
          if (JSONDATA.length > 0) {
            for (let x = 0; x < JSONDATA.length; x++) {

              tag += '<tr>';
              tag += '<td scope="row">' + (x + 1) + '</td>';
              tag += '<td>' + JSONDATA[x]['name'] + '</td>';
              tag += '<td>' + JSONDATA[x]['city'] + '</td>';
              tag += '<td>' + JSONDATA[x]['marks'] + '</td>';
              tag += '<td>';
              tag += '<button type="button" class="btn btn-info btn-sm" onclick="editFunction(' + JSONDATA[x]['id'] + ');">edit</button>';
              tag += '<button type="button" class="btn btn-danger btn-sm" onclick="deleteFunction(' + JSONDATA[x]['id'] + ');">delete</button>';
              tag += '</td>';
              tag += '</tr>';

            }
            document.getElementById("tBody").innerHTML = tag;
          } else {
            document.getElementById("tBody").innerHTML = 'No Record Found';
          }
        }
      });

    }
  </script>
  <!-- javascript work end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>