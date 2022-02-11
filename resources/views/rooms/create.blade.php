<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action=" {{ url('/store-class')  }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Class Name</label>
                <input type="text" class="form-control" id="name" name="name">
                
            </div>
            <div class="mb-3">
                <label for="code" class="form-label">Class Code</label>
                <input type="text" class="form-control" id="code" name="code">
                
            </div>

            
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</body>
</html>