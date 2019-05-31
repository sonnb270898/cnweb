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
                                @if($userClass->status != 1)
                                  <li><a href="class/{{$userClass->class->id}}">{{$userClass->class->id}}-{{$userClass->class->cname}}</a></li>
                                @endif
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
  <div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">

            <li class=""><a href="class/{{$class->id}}/list"><i class="glyphicon glyphicon-home"></i>Danh sách sinh viên</a></li>
            <li class=""><a href="class/{{$class->id}}/info"><i class="glyphicon glyphicon-home"></i>THông tin lớp</a></li>
            @if($user->userClass!=null)
              <li><a href="class/{{$class->id}}/discussion"><i class="glyphicon glyphicon-tasks"></i>New discussion</a></li>
            @endif
            <li class="submenu">
                 <a href="#">
                    <i class="glyphicon glyphicon-list"></i>Discussion
                    <span class="caret pull-right"></span>
                 </a>

                 <ul>
                      @foreach($class->post as $post)
                        @if($post->status == 0)
                          <li><a href="class/{{$class->id}}/discussion/{{$post->id}}">{{$post->title}}</a></li>
                        @endif
                      @endforeach
                </ul>
            </li>
        </ul>
     </div>
  </div>
@endsection
@section("content")
<div class="col-md-8">
	<div class="content-box-large">
		<div class="panel-heading">
        <div class="panel-title page-header"><h2>Danh sách sinh viên</h2></div>
      
<!--         <div class="panel-options">
          <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
          <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div> -->
    </div>
    <div class="panel-body">
          <div class="form-group">
          <table id="example" class="display" style="width:100%">
              <thead>
                  <th>id</th>
                  <th>Tên sinh viên</th>
                  <th>Username</th>
                  <th>Chức vụ</th>
                  <th>Email</th>
                  <th>Adress</th>
                  <th>DoB</th>
              </thead>
              <tbody id="body">
                  @foreach($userclass as $uc)
                  <tr>
                      <td>{{$uc->user->id}}</td>
                      <td>{{$uc->user->name}}</td>
                      <td>{{$uc->user->username}}</td>
                      @if($uc->user->id == $uc->class->creator)
                        <td>Giáo viên</td>
                      @else
                        <td>Học sinh</td>
                      @endif
                      <td>{{$uc->user->email}}</td>
                      <td>{{$uc->user->address}}</td>
                      <td>{{$uc->user->dob}}</td>
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
@endsection




