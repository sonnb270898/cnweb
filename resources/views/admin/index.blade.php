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
                     <h1><a href="">Nhom17</a></h1>
                  </div>
               </div>
               <div class="7">
                  <div class="navbar navbar-inverse" role="banner">
                      <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello, {{$admin->username}}<b class="caret"></b></a>
                            <ul class="dropdown-menu animated fadeInUp">
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
<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="content-box-large">
		<div class="panel-heading">
        <div class="panel-title"><h2>Quản lí</h2></div>
      
        <div class="panel-options">
<!--           <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a> -->
          <!-- <a href="profile" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a> -->
        </div>
        <div class="panel-body">
          <div class="form-group">
          <table id="example" class="display" style="width:100%">
              <thead>
                  <th>id</th>
                  <th>Tên lớp</th>
                  <th>Ngày tạo</th>
                  <th>Giáo viên</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
              </thead>
              <tbody id="body">
                  @foreach($classes as $cl)
                  <tr>
                      <td>{{$cl->id}}</td>
                      <td>{{$cl->cname}}</td>
                      <td>{{$cl->createdate}}</td>
                      <td>{{$cl->u->name}}</td>
                      <td><a href="" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a></td>
                      <td><a href="" data-rel="collapse"><i class="glyphicon glyphicon-remove"></i></a></td>
                  </tr>
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
</script>
    </div>
		<div class="panel-body">
			
		</div>
	</div>
</div>
@endsection
