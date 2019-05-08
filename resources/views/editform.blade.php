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
  <div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class=""><a href="class/{{$class->id}}/list"><i class="glyphicon glyphicon-home"></i>Danh sách sinh viên</a></li>
            <li class=""><a href="class/{{$class->id}}/info"><i class="glyphicon glyphicon-home"></i>THông tin lớp</a></li>
            @if($user->userClass!=null)
              <li ><a href="class/{{$class->id}}/discussion"><i class="glyphicon glyphicon-tasks"></i>New discussion</a></li>
            @endif
            <li class="submenu">
                 <a href="#">
                    <i class="glyphicon glyphicon-list"></i>Discussion
                    <span class="caret pull-right"></span>
                 </a>
                 <!-- Sub menu -->
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
<div class="col-lg-10">
	<div class="content-box-large">
		<div class="panel-heading">
        <div class="panel-title"><h2 class="page-header">Bài đăng</h2></div>				   
    </div>
		<div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
            <div class="row form-group">
                <div class="col-md-2"><label>Tiêu đề</label></div>
                <div class="col-md-8"><input class="form-control" name="title" value="{{$post->title}}"></div>
            </div>
            <div class="row form-group">
                <div class="col-md-2"><label>Nội dung</label></div>
                <div class="col-md-8"> <textarea class="form-control" rows="5" name="content">{{$post->content}}</textarea></div>
            </div>
            <div class="row form-group">
                <div class="col-md-2"><label>File</label></div>
                <div class="col-md-4">
                    <input type="file" name='image' id='fileinput'>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Post My Question to {{$class->id}}!</button>
            <!-- {{-- <a href=''class="btn btn-default">Save Draft</a> --}} -->
            <button type="reset" class="btn btn-default">Cancel</button>
            <!-- {{-- <a href=''class="btn btn-default">Preview Post</a> --}} -->
        </form>
		</div>
	</div>
</div>
@endsection

@section('script')
  <script type="text/javascript">
  </script>
@endsection