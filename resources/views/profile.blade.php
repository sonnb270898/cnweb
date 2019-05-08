@extends("layout.master")

@section("title")
	profile
@endsection
@section("header")
        <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <div class="logo">
                     <h1><a href="">Nhom17</a></h1>
                  </div>
               </div>
                <div class="col-md-2">
                  <div class="navbar navbar-inverse" role="banner">
                      <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Class <b class="caret"></b></a>
                            <ul class="dropdown-menu animated fadeInUp">
                              @foreach($user->userClass as $userClass)
                                <li><a href="class/{{$userClass->class->id}}">{{$userClass->class->id}}-{{$userClass->class->cname}}</a></li>
                              @endforeach
                              <li><a href="join">Join Class</a></li>
                              <li><a href="create">Create Class</a></li>
                            </ul>
                          </li>
                        </ul>
                      </nav>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="input-group form">
                           <input type="text" class="form-control" placeholder="Search...">
                           <span class="input-group-btn">
                             <button class="btn btn-primary" type="button">Search</button>
                           </span>
                      </div>
                    </div>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="navbar navbar-inverse" role="banner">
                      <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello, {{$user->username}}<b class="caret"></b></a>
                            <ul class="dropdown-menu animated fadeInUp">
                              <li><a href="">Profile</a></li>
                              <li><a href="{{Route('logout')}}">Logout</a></li>
                            </ul>
                          </li>
                        </ul>
                      </nav>
                  </div>
               </div>
            </div>
         </div>
@endsection
@section("menu")

@endsection
@section("content")
<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="content-box-large">
		<div class="panel-heading">
        <div class="panel-title"><h2>Thông tin cá nhân</h2></div>
      
<!--         <div class="panel-options">
          <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
          <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div> -->
    </div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" method="post" action="">
        {{ csrf_field() }}
        @if(count($errors)>0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            <p>{{$err}}</p>
            @endforeach
          </div>
        @endif
				<div class="form-group">
					<label for="inputname" class="col-sm-2 control-label">Họ và tên</label>
					<div class="col-sm-10">
				  	<input type="text" class="form-control" id="inputname" name='name' placeholder="Họ và tên" value="{{$user->name}}" required="">
					</div>
				</div>
				<div class="form-group">
					<label for="inputemail" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
				  		<input type="email" class="form-control" id="inputemail" name='email' placeholder="Email" value="{{$user->email}}" required="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Địa chỉ</label>
					<div class="col-sm-10">
				  		<textarea class="form-control" placeholder="Địa chỉ" rows="3"  required="" name='address'>{{$user->address}}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Ngày sinh</label>
					<div class="col-sm-10">
				  	<input type="date" class="form-control" id="inputDob3" name='dob' placeholder="Ngày sinh" value="{{$user->dob}}" required="">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
				  		<button type="submit" class="btn btn-primary">Gửi</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
