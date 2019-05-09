@extends("layout.master")

@section("title")
Admin
@endsection
@section("header")
        <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-5">

                  <div class="logo">
                     <h1><a href="/">Nhom17</a></h1>
                  </div>
               </div>
               <div class="7">
                  <div class="navbar navbar-inverse" role="banner">
                      <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello, {{$admin->username}}<b class="caret"></b></a>
                            <ul class="dropdown-menu animated fadeInUp">
                              <li><a href="{{Route('admin.home')}}">Trang chủ</a></li>
                              <li><a href="{{Route('logout')}}">Logout</a></li>
                            </ul>
                          </li>
                        </ul>
                      </nav>
                  </div>
               </div>
            </div>
         </div>
    </div>
@endsection
@section("menu")
  <div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            
            <li class=""><a href="admin/class/{{$class->id}}"><i class="glyphicon glyphicon-home"></i>Quản lý lớp</a></li>
            <li class=""><a href="admin/class/{{$class->id}}/user"><i class="glyphicon glyphicon-home"></i>Quản lý sinh viên</a></li>         
            <li class=""><a href="admin/class/{{$class->id}}/topic"><i class="glyphicon glyphicon-home"></i>Quản lý bài đăng</a></li> 
        </ul>
     </div>
  </div>
@endsection
@section("content")
<div class="col-md-8">
	<div class="content-box-large">
		<div class="panel-heading">
        <div class="panel-title"><h2>Thông tin sinh viên trong lớp</h2></div>
      
 <!--        <div class="panel-options">
          <a href="admin/class/{{$class->id}}/user/{{$user->id}}edit" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
          <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div> -->
    </div>
		<div class="panel-body">
			<form class="form-horizontal" action="" method="post" role="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="id" class="col-sm-2 control-label">ID</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="id" name='id' placeholder="ID" disabled="" value="{{$user->id}}" required="">
          </div>
        </div>        
				<div class="form-group">
					<label for="username" class="col-sm-2 control-label">Tên tài khoản</label>
					<div class="col-sm-8">
				  	<input type="text" class="form-control" id="username" name='username' placeholder="Tên tài khoản" value="{{$user->username}}" required="">
					</div>
				</div>
        <div class="form-group">
          <label for="username" class="col-sm-2 control-label">Họ và tên</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="name" name='name' placeholder="Họ và tên" value="{{$user->name}}" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" id="email" name='email' placeholder="Email" value="{{$user->email}}" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="address" class="col-sm-2 control-label">Address</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" id="address" name='address' placeholder="Address" value="{{$user->address}}" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="dob" class="col-sm-2 control-label">Dob</label>
          <div class="col-sm-8">
              <input type="date" class="form-control" id="dob" name='dob' placeholder="Dob" value="{{$user->dob}}" required=""> 
          </div>
        <div class="form-group">
          <div class="">
            <input type="submit" class="btn btn-success">
          </div>
        </div>
			</form>
		</div>
  <hr>
  <hr>
  <hr>
<!--     <div class="panel-heading">
        <div class="panel-title"><h2>Tra cứu thông tin lớp</h2></div>
      
        <div class="panel-options">
          <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
          <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div>
    </div> -->


	</div>
</div>
<script type="text/javascript">
</script>
@endsection
