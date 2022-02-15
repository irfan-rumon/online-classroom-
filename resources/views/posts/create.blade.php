<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<form action="{{ url('post/store', $room_id)  }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="topic" class="form-label">Topic:</label>
    <input type="text" class="form-control" id="topic" name="topic" aria-describedby="topic">
    
  </div>

  <div class="mb-3">
    <label for="contents" class="form-label">Contents:</label>
    <input type="textarea" class="form-control" id="contents" name="contents" aria-describedby="topic">
    
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>