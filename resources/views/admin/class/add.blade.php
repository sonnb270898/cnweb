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
@section("content")
<div class='col-md-2'></div>
<div class="col-md-8">
  <div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title"><h2>Tạo lớp</h2></div>
      
<!--         <div class="panel-options">
          <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
          <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div> -->
    </div>
    <div class="panel-body">
      <form class="form-horizontal" method="post" action="">
        {{ csrf_field() }}
        @if(count($errors)>0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            <p>{{$err}}</p>
            @endforeach
          </div>
        @endif
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
          <label for="cname" class="col-sm-2 control-label" >Tên lớp</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="cname" name="cname" placeholder="Nhập mã lớp" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="enroll" class="col-sm-2 control-label" >Mã kích hoạt</label>
          <div class="col-sm-5">
              <input type="password" class="form-control" id="enroll" name="enroll" placeholder="Mã kích hoạt" required="">
          </div>
        </div>
         <div class="form-group">
          <label for="enroll" class="col-sm-2 control-label" >ID giáo viên</label>
          <div class="col-sm-5">
              <input type="text" class="form-control" id="creator" name="creator" placeholder="ID giáo viên" required="">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-5">
              <button type="submit" class="btn btn-primary">Tạo lớp</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection