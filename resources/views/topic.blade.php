
  @extends("layout.master")

@section("title")
  Bài Đăng
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
              <li><a href="class/{{$class->id}}/discussion"><i class="glyphicon glyphicon-tasks"></i>New discussion</a></li>
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
<div class="col-md-10" style="font-size:14px;">
  <div class="row">
    <div class="col-md-12">
      <div class="content-box-header">
        <div class="panel-title">{{$topic->title}}</div>      
      <div class="panel-options">
        <a href="class/{{$class->id}}/discussion/{{$topic->id}}/edit" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
        <a onclick="myFunc('{{$class->id}}','{{$topic->id}}')" style="cursor: pointer;" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
      </div>
      </div>
      <div class="content-box-large box-with-header">
        {{$topic->content}}
      <br /><br />
        @if($topic->image != null)
            <img src="{{$topic->image}}" style="max-height:300px;">
        @endif
    </div>
    </div>
  </div>
<form role="form" action="class/{{$class->id}}/discussion/{{$post->id}}" method="post">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="content-box-header">
        <div class="panel-title">Discussions</div>      
<!--      <div class="panel-options">
        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
      </div> -->
      </div>
      <div class="content-box-large box-with-header ">
        <div class="row">
          <form class="form-horizontal box-with-header" enctype="multipart/form-data">
            <div class="container-fluid" id="xxx">
            @foreach($topic->comment as $cmt)
                @if($cmt->status == 0)
                <div class="form-group" style="margin-left: 15px">
                  <div class="username">{{$cmt->user->name}}</div>
                  <div class='comment'>{{$cmt->content}}</div>
                  @if($cmt->image!=null)
                    <img src="{{$cmt->image}}" style="max-height: 150px;">
                    @endif
                  <div class='rep' id="rep{{$cmt->id}}">
                    <a>reply</a>
                  </div>
                </div>
                  <div class="container form-group" >
                    <div id="a{{$cmt->id}}">
                      @foreach($cmt->rep_cmt as $rep) 
                          <div class="username">{{$rep->comment->user->name}}</div>
                          <div class='comment'>{{$rep->comment->content}}</div>
                          @if($rep->comment->image!=null)
                          <img src="{{$rep->comment->image}}" style="max-height: 150px;">
                          @endif
                      @endforeach
                    </div>
                    <div class="row" style="display:none" id="inp{{$cmt->id}}">
                        <div class="col-md-11 inputrep input-group" >
                          <input type="text" class="form-control" name="{{$cmt->id}}" id="content{{$cmt->id}}">
                           <span class="input-group-btn" style="width:20px;text-align: center;">
                              <label class="glyphicon glyphicon-file" for='file{{$cmt->id}}' ></label>
                              <input type="file" name="image{{$cmt->id}}" id="file{{$cmt->id}}" style="display: none;">
                          </span>
                          <span class="input-group-btn">
                            <input type="button" class="btn btn-primary send" id="send{{$cmt->id}}" value="Gửi">
                          </span>                          
                        </div>         
                    </div>    
                  </div>
              @endif
             @endforeach
             </div>
          </form>
          <script>
            $(".rep").click(function(){
                var a=$(this).attr("id");
                a=a.substr(3);
                $("#inp"+a).css("display","block");
                $("#inp"+a+" input")[0].focus();
            });

            $(".send").click(function(){
                var a=$(this).attr("id");
                a=a.substr(4);
                var file_data = $('#file'+a).prop('files')[0];
                //lấy ra kiểu file
                var form_data = new FormData();
                //thêm files vào trong form data
                if(file_data!=null) form_data.append('file', file_data);
                form_data.append('content', $("#content"+a).val());
                form_data.append('pid', {{$post->id}});
                form_data.append('id', a);
                //sử dụng ajax post

                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                $.ajax({
                    url: "ajax/repcomment",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (data) {
                      $("#a"+a).append(data);
                      $("#content"+a).val('');
                      $("#file"+a).val('');
                    }
                });
            });
          </script>
          <form action="" method="post" role="form1" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="content-box-large box-with-header container-fluid">
              <div class="row form-group ">
                  <div style="margin-left: 15px" ><label>Viết bình luận</label></div>
                  <div class="col-md-12 input-group">
                    <input class="form-control" type='text' name="content" id="contentt" placeholder="Comment...">
                     <span class="input-group-btn" style="width:20px;text-align: center;">
                        <label class="glyphicon glyphicon-file" for='file' ></label>
                        <input type="file" name="image" id="file" style="display: none;">
                    </span>
                    <span class="input-group-btn">
                      <input type="button" class="btn btn-danger" name='sub' id="upload" value="Gửi">
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <script>
            $("#upload").click(function(){
                var file_data = $('#file').prop('files')[0];
                //lấy ra kiểu file
                var form_data = new FormData();
                //thêm files vào trong form data
                if(file_data!=null) form_data.append('file', file_data);
                form_data.append('content', $("#contentt").val());
                form_data.append('pid', {{$topic->id}});
                //sử dụng ajax post
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                    url: "ajax/getcomment",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (data) {
                      $("#xxx").append(data);
                      $("#contentt").val('');
                      $("#file").val('');
                    }
                });
            });
          </script>
        </div>
    </div>
    </div>
  </div>
  </form>
</div>


@endsection

@section('script')
<script type="text/javascript">
  function myFunc(cid,pid){
      if (confirm('Bạn có chắc chắn muốn xóa?')){
        window.location.href="class/"+cid+"/discussion/"+pid+"/del";
    }  
  }
</script>
@endsection
