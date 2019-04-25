@extends("layout.master")
@section("title")
	Form
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
                          <li><a href="class/{{$user->userClass[0]->cid}}/#{{$post->id}}">{{$post->title}}</a></li>
                      @endforeach
                    @endif
                </ul>
            </li>
        </ul>
     </div>
  </div>
@endsection
@section("content")
<div class="col-lg-10">
	<div class="content-box-large">
		<div class="panel-heading">
        <div class="panel-title"><h2 class="page-header">Question</h2></div>				   
    </div>
		<div class="panel-body">
        <form action="class/{{$class->id}}/discussion" method="post">
          {{csrf_field()}}
            <div class="row form-group">
                <div class="col-md-2"><label>Summary</label></div>
                <div class="col-md-10"><input class="form-control" name="title"></div>
            </div>
            <div class="row form-group">
                <div class="col-md-2"><label>Detail</label></div>
                <div class="col-md-10"> <textarea class="form-control" rows="5" name="content"></textarea></div>
            </div>
            <div class="row form-group">
                <div class="col-md-2"><label>File input</label></div>
                <div class="col-md-10">
                     <input type="file">
                </div>
            </div>
             {{-- <div class="row form-group">
                <div class="col-md-2"><label>Show my name as</label></div>
                <div class="col-md-10">
                    <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div> --}}
            <button type="submit" class="btn btn-danger">Post My Question to {{$class->id}}!</button>
            {{-- <a href=''class="btn btn-default">Save Draft</a> --}}
            <a href='{{ URL::previous() }}'class="btn btn-default">Cancel</a>
            {{-- <a href=''class="btn btn-default">Preview Post</a> --}}
        </form>
		</div>
	</div>
</div>
@endsection