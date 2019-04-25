@extends("layout.master")

@section("title")
	Trang Chu
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
<div class="col-md-10">
	<div class="row">
		<div class="col-md-12">
			<div class="content-box-header">
				<div class="panel-title">Topic</div>			
			<div class="panel-options">
				<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
				<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
			</div>
			</div>
			<div class="content-box-large box-with-header">
  			Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
			<br /><br />
		</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="content-box-header">
				<div class="panel-title">Discussions</div>			
			<div class="panel-options">
				<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
				<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
			</div>
			</div>
			<div class="content-box-large box-with-header">
				<div class="row">
					<div class="content-box-large box-with-header">
					<div class="content-box-header">
						ABC
					</div>
					<div class="content-box-large box-with-header">
  						<p>
  							Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
  						<br /><br />
  						</p>

  						<div class="content-box-large box-with-header">
  							<div class="content-box-header">
								ABC
							</div>
							<p>
	  							Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
	  							<br /><br />
  							</p>
  						</div>

  						<div class="content-box-large box-with-header">	
	  						<form role="form">
		                        <div class="row form-group">  
			                        <div>
			                        	<span></span>
			                        </div>   
		                            <div class="col-md-10">
		                            	<input class="form-control" placeholder="Reply...">
		                        	</div>
		                        	<div class="col-md-2">
	                            		<input type="submit" class="btn btn-danger" value="Submit">
	                            	</div>
		                        </div>
                    		</form>
						</div>
					</div>
					</div>
					<div class="content-box-large box-with-header">
						<form role="form">
                        <div class="row form-group">     
                            <div class="col-md-12">
                            	<label>Start a new followup discussion</label>
                            	<input class="form-control" placeholder="Reply...">
                        	</div>
                        </div>
                        <div class="row form-group">
                        	<div class="col-md-2">
                            	<input type="submit" class="btn btn-danger" value="Submit">
                            </div>
                        </div>
                	</form>
					</div>
				</div>
		</div>
		</div>
	</div>
</div>
@endsection