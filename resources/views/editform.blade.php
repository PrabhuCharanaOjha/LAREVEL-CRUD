<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>LARAVEL CRUD</title>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-8 offset-2">
        <h1 class="text-center">INSERT STUDENT INFORMATION</h1>
        <form action="" method="post">
          @csrf
          @method("PUT");
          <div class="form-group my-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter User Name" value="{{$student->name}}">
          </div>
          <div class="form-group my-2">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" placeholder="Enter User City" value="{{$student->city}}">
          </div>
          <div class="form-group my-2">
            <label for="marks">Marks</label>
            <input type="text" name="marks" id="marks" class="form-control" placeholder="Enter User Marks" value="{{$student->marks}}">
          </div>
          <div class="form-group my-2">
            <button type="submit" class="btn btn-success btn-sm">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>