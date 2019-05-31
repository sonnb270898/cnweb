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
                              <li><a href="{{Route('admin.class.add')}}">Tạo lớp</a></li>
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
            <li class=""><a href="admin/class/{{$class->id}}/add"><i class="glyphicon glyphicon-home"></i>Thêm sinh viên</a></li>  
        </ul>
     </div>
  </div>
@endsection
@section("content")
<div class="col-md-8">
  <div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title"><h2>Thêm sinh viên</h2></div>
      
<!--         <div class="panel-options">
          <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
          <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div> -->
    </div>
    <div class="panel-body">
      <form class="form-horizontal" method="post" action="">
        {{ csrf_field() }}
        <div class="form-group">
          @if(session("thongbao"))
            <div class="alert alert-success">
              {{session("thongbao")}}
            </div>
          @endif
          @if(session("thatbai"))
            <div class="alert alert-danger">
              {{session("thatbai")}}
            </div>
          @endif
          @if(session("tontai"))
            <div class="alert alert-danger">
              {{session("tontai")}}
            </div>
          @endif
          <label for="inputEmail3" class="col-sm-2 control-label" >Username</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="Nhập tài khoản">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-5">
              <button type="submit" class="btn btn-primary">Thêm</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection