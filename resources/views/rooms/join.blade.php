<!DOCTYPE html>web

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Room</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<form action="{{ url('join/verify', $student_id)  }}" method="POST">
  @csrf
  
  <div class="mb-3">
    <label for="room_code" class="form-label">Room Code:</label>
   
    <input type="text" class="form-control" id="room_code" name="room_code" aria-describedby="room_code">
    
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>