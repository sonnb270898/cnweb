@extends("layout.master")

@section("title")
	profile
@endsection
@section("header")
        <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <!-- Logo -->
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
    </div>
@endsection
@section("menu")
  <div class="col-md-3">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="submenu">
                 <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Danh sách lớp tham gia
                    <span class="caret pull-right"></span>
                 </a>
                 <!-- Sub menu -->
                 <ul>
                    @if($user->userClass!=null)
                      @foreach($user->userClass as $uc)
                          <li><a href="#">{{$uc->class->id}} - {{$uc->class->cname}}</a></li>
                      @endforeach
                    @endif
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
        <div class="panel-title"><h2>Tham gia lớp học</h2></div>
      
<!--         <div class="panel-options">
          <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
          <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div> -->
    </div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="join">
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
					<label for="inputEmail3" class="col-sm-2 control-label" >Nhập mã lớp</label>
					<div class="col-sm-5">
				  	<input type="input" class="form-control" id="inputEmail3" name="cid" placeholder="Nhập mã lớp">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label" >Mã kích hoạt</label>
					<div class="col-sm-5">
				  		<input type="password" class="form-control" id="inputPassword3" name="enroll" placeholder="Mã kích hoạt">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-5">
				  		<button type="submit" class="btn btn-primary">Enroll</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection