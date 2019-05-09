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
        <div class="panel-title"><h2>Quản lý bài đăng</h2></div>
      
    </div>
        <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
            <div class="row form-group">
                <div class="col-md-2"><label>Tiêu đề</label></div>
                <div class="col-md-8"><input class="form-control" name="title" value="{{$topic->title}}"></div>
            </div>
            <div class="row form-group">
                <div class="col-md-2"><label>Nội dung</label></div>
                <div class="col-md-8"> <textarea class="form-control" rows="5" name="content">{{$topic->content}}</textarea></div>
            </div>
            <div class="row form-group">
                <div class="col-md-2"><label>File</label></div>
                <div class="col-md-4">
                    <input type="file" name='image' id='fileinput'>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
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

