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
    </div>
@endsection
@section("menu")
<!--   <div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">

            <li class=""><a href="class/{{$user->userClass[0]->cid}}/list"><i class="glyphicon glyphicon-home"></i>Danh sách sinh viên</a></li>
            <li class=""><a href="class/{{$user->userClass[0]->cid}}/info"><i class="glyphicon glyphicon-home"></i>THông tin lớp</a></li>
            @if($user->userClass!=null)
              <li><a href="class/{{$user->userClass[0]->cid}}/discussion"><i class="glyphicon glyphicon-tasks"></i>New discussion</a></li>
            @endif
            <li class="submenu">
                 <a href="#">
                    <i class="glyphicon glyphicon-list"></i>Discussion
                    <span class="caret pull-right"></span>
                 </a>
 
                 <ul>
                      @foreach($user->userClass[0]->class->post as $post)
                        @if($post->status == 0)
                          <li><a href="class/{{$user->userClass[0]->cid}}/discussion/{{$post->id}}">{{$post->title}}</a></li>
                        @endif
                      @endforeach
                </ul>
            </li>
        </ul>
     </div>
  </div> -->
@endsection
@section("content")
<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="content-box-large">
		<div class="panel-heading">
        <div class="panel-title"><h2>Thông tin cá nhân</h2></div>
      
        <div class="panel-options">
<!--           <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a> -->
          <a href="profile" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div>
    </div>
		<div class="panel-body">
			<form class="form-horizontal" role="form">
        <div class="form-group">
          <label for="uname" class="col-sm-2 control-label">Họ và Tên</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="uname" placeholder="Họ và Tên" disabled="" value="{{$user->name}}">
          </div>
        </div>        
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-8">
				  	<input type="email" class="form-control" id="inputEmail3" placeholder="Email" disabled="" value="{{$user->email}}">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Ngày sinh</label>
					<div class="col-sm-8">
				  		<input type="date" class="form-control" id="inputPassword3" placeholder="Ngày sinh" disabled="" value="{{$user->dob}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Địa chỉ</label>
					<div class="col-sm-8">
				  		<textarea class="form-control" placeholder="Địa chỉ" rows="3" disabled="">{{$user->address}}</textarea>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
