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
                     <h1><a href="index.html">Nhom17</a></h1>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
                            <ul class="dropdown-menu animated fadeInUp">
                              <li><a href="{{Route('profile')}}">Profile</a></li>
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
            <!-- Main menu -->
            <li class="current"><a href="profile"><i class="glyphicon glyphicon-home"></i>Thông tin cá nhân</a></li>
            @if($user->userClass!=null)
              <li><a href="class/{{$user->userClass[0]->cid}}/discussion"><i class="glyphicon glyphicon-tasks"></i>New discussion</a></li>
            @endif
            <li class="submenu">
                 <a href="#">
                    <i class="glyphicon glyphicon-list"></i>Discussion
                    <span class="caret pull-right"></span>
                 </a>
                 <!-- Sub menu -->
                 <ul>
                    @if($user->userClass!=null)
                      @foreach($user->userClass[0]->class->post as $post)
                          <li><a href="class/#{{$post->id}}">{{$post->title}}</a></li>
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
        <div class="panel-title"><h2>Thông tin cá nhân</h2></div>
      
        <div class="panel-options">
          <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
          <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div>
    </div>
		<div class="panel-body">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Họ và tên</label>
					<div class="col-sm-10">
				  	<input type="email" class="form-control" id="inputEmail3" placeholder="Họ và tên">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Địa chỉ</label>
					<div class="col-sm-10">
				  		<input type="password" class="form-control" id="inputPassword3" placeholder="Địa chỉ">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Textarea</label>
					<div class="col-sm-10">
				  		<textarea class="form-control" placeholder="Textarea" rows="3"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Readonly</label>
					<div class="col-sm-10">
				  	<span class="form-control">Read only text</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
				  	<div class="checkbox">
				    <label>
				      <input type="checkbox"> Checkbox
				    </label>
				  	</div>
				  	<div class="checkbox">
				    	<label>
				      		<input type="checkbox"> Checkbox
				    	</label>
				  	</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
				  		<button type="submit" class="btn btn-primary">Sign in</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
