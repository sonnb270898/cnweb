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
        <div class="panel-title"><h2>Quản lý người dùng</h2></div>
      
        <div class="panel-options">
<!--           <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a> -->
          <!-- <a href="profile" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a> -->
        </div>
        <div class="panel-body">
          <div class="form-group">
          <table id="example" class="display" style="width:100%">
              <thead>
                  <th>id</th>
                  <th>Tên tài khoản</th>
                  <th>Chức vụ</th>
                  <th>Họ và tên</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Dob</th>
                  <th>Ngày tham gia</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
              </thead>
              <tbody id="body">
                  @foreach($userClass as $uc)
                    @if($uc->status != 1)
                    <tr>
                        <td>{{$uc->user->id}}</td>
                        <td>{{$uc->user->username}}</td>
                        @if($uc->user->id == $uc->class->creator)
                          <td>Giáo viên</td>
                        @else
                          <td>Học sinh</td>
                        @endif
                        <td>{{$uc->user->name}}</td>
                        <td>{{$uc->user->email}}</td>
                        <td>{{$uc->user->address}}</td>
                        <td>{{$uc->user->dob}}</td>
                        <td>{{$uc->dop}}</td>
                        <td><a href="admin/class/{{$class->id}}/user/{{$uc->user->id}}/edit" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a></td>
                        <td><a onclick="myFunc({{$class->id}} ,{{$uc->user->id}})" style="cursor: pointer;" data-rel="collapse"><i class="glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                    @endif
                  @endforeach
              </tbody>
          </table>
          </div>
      </div>

  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
    });
});
  function myFunc(cid,uid){
      if (confirm('Bạn có chắc chắn muốn xóa sinh viên khỏi lớp?')){
        window.location.href="admin/class/"+cid+"/user/"+uid+"/del";
    }  
  }
</script>
</div>
    <div class="panel-body">
      
    </div>
  </div>
</div>
@endsection