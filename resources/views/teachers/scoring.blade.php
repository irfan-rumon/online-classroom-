<!doctype html>
<html lang="en">
  <head>
  	<title>Teacher Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/page-template/css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
		<div class="p-4">
		  	<h1><a href="index.html" class="logo">Portfolic <span>Portfolio Agency</span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="{{ url('dashboard') }}"><span class="fa fa-home mr-3"></span>My Classes</a>
	          </li>
	          <li>
	              <a href="{{ url('room/create') }}"><span class="fa fa-user mr-3"></span>Create a new class</a>
	          </li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a style="margin-left: 25px;" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                </form>
              </li> 
	        </ul>

	        <div class="mb-5">
						<h3 class="h6 mb-3">Subscribe for newsletter</h3>
						<form action="#" class="subscribe-form">
	            <div class="form-group d-flex">
	            	<div class="icon"><span class="icon-paper-plane"></span></div>
	              <input type="text" class="form-control" placeholder="Enter Email Address">
	            </div>
	          </form>
					</div>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
            <form action="{{ url('score/store', $sheet_id)  }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="room_code" class="form-label">Question:</label>
                    <input type="text" class="form-control" id="question" name="question"  value="{{ $question }}" aria-describedby="room_name" readonly>
                    
                    
                </div>
                <div class="mb-3">
                    <label for="room_code" class="form-label">Student Answer:</label>
                
                    <input type="textarea" class="form-control" id="answer" name="answer" value="{{$answer}}"aria-describedby="room_code" readonly>
                   
                    
                </div>

                <div class="mb-3">
                    <label for="room_code" class="form-label">Submitted at:</label>
                    <input type="textarea" class="form-control" id="ca" name="ca" value="{{now()}}"aria-describedby="room_code" readonly>
                </div>    
                
                    

                <div class="mb-3">
                    <label for="room_code" class="form-label">Score:</label>
                
                    <input type="textarea" class="form-control" id="score" name="score" aria-describedby="room_code">
                    
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
        
      </div>
		</div>

    <script src="/page-template/js/jquery.min.js"></script>
    <script src="/page-template/js/popper.js"></script>
    <script src="/page-template/js/bootstrap.min.js"></script>
    <script src="/page-template/js/main.js"></script>
  </body>
</html>