<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{ asset('layouts/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- styles -->
    <link href="{{ asset('layouts/css/styles.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.html">Sign Up</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			            	<form action="" method="post">
			            		{{ csrf_field() }}
			            		<h6>Sign Up</h6>
			            		@if(count($errors)>0)
									<div class="alert alert-danger">
										@foreach($errors->all() as $err)
										<p>{{$err}}</p>
										@endforeach
									</div>
			            		@endif
				                <input class="form-control" type="text" placeholder="Username" name="username" required="">
				                <input class="form-control" type="text" placeholder="Name" name="name" required="">
				                <input class="form-control" type="text" placeholder="E-mail address" name="email" >
				                <input class="form-control" type="password" placeholder="Password" name="password" required="">
				                <input class="form-control" type="password" placeholder="Confirm Password" name="confirm" required="">   
				                <button type="submit" class="btn btn-primary signup">Sign Up</button>      
			            	</form>
			            </div>
			        </div>

			        <div class="already">
			            <p>Have an account already?</p>
			            <a href="{{route('login')}}">Login</a>
			        </div>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('layouts/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('layouts/js/custom.js') }}"></script>
  </body>
</html>