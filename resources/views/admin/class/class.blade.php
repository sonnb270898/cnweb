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
        <div class="panel-title"><h2>Thông tin lớp</h2></div>
      
        <div class="panel-options">
          <a href="admin/class/{{$class->id}}/edit" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
          <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div>
    </div>
		<div class="panel-body">
			<form class="form-horizontal" role="form">
        <div class="form-group">
          <label for="cid" class="col-sm-2 control-label">ID</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="cid" placeholder="ID" disabled="" value="{{$class->id}}">
          </div>
        </div>        
				<div class="form-group">
					<label for="cname" class="col-sm-2 control-label">Tên lớp</label>
					<div class="col-sm-8">
				  	<input type="text" class="form-control" id="cname" placeholder="Tên lớp" disabled="" value="{{$class->cname}}">
					</div>
				</div>
				<div class="form-group">
					<label for="creator" class="col-sm-2 control-label">Người tạo</label>
					<div class="col-sm-8">
				  		<input type="text" class="form-control" id="creator" placeholder="Ngày sinh" disabled="" value="{{$class->u->name}}">
					</div>
				</div>
        <div class="form-group">
          <label for="create_at" class="col-sm-2 control-label">Ngày tạo</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" id="create_at" placeholder="Ngày tạo" disabled="" value="{{$class->createdate}}">
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

@endsection
