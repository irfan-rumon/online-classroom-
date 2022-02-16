<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Submission</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
        <h1>{{ $question }}</h1>
        <form action="{{ url('submission/store', $assignment_id)  }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="answer" class="form-label">Answer:</label>
            <input type="text" class="form-control" id="answer" name="answer" aria-describedby="answer">
            
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</body>
</html>