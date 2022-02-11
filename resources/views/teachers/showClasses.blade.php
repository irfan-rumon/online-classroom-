<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Classes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
     <h1>Hello Sir</h1>
        
           
                <div class="d-flex justify-content-center">
                
                    @foreach($classes as $class)
                    
                    <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $class->name }}</h5>
                                    
                                    <p class="card-text">Hello </p>
                                    <a href="#" class="card-link">Enter</a>
                                
                                </div>
                    </div> 
                    @endforeach
                </div>
          
      
          
      </div> 

</body>
</html>