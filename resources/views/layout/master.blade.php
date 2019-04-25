<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <base href="{{asset('')}}">
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="{{ asset('layouts/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- styles -->
    <link href="{{ asset('layouts/css/styles.css') }}" rel="stylesheet">

    <link href="{{ asset('layouts/vendors/form-helpers/css/bootstrap-formhelpers.min.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/vendors/select/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/vendors/tags/css/bootstrap-tags.css') }}" rel="stylesheet">

    <link href="{{ asset('layouts/css/forms.css') }}" rel="stylesheet">

  </head>
  <body>
  	{{-- @include("layout.header") --}}

    @yield("header")

    <div class="page-content">
    	<div class="row">
		@yield("menu")
		@yield("content")
		</div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <!-- <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('layouts/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('layouts/vendors/form-helpers/js/bootstrap-formhelpers.min.js') }}"></script>

    <script src="{{ asset('layouts/vendors/select/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('layouts/vendors/tags/js/bootstrap-tags.min.js') }}"></script>

    <script src="{{ asset('layouts/vendors/mask/jquery.maskedinput.min.js') }}"></script>

    <script src="{{ asset('layouts/vendors/moment/moment.min.js') }}"></script>

    <script src="{{ asset('layouts/vendors/wizard/jquery.bootstrap.wizard.min.js') }}"></script>

     <!-- bootstrap-datetimepicker -->
<!--      <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>  -->


    <!-- <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script> -->

    <script src="{{ asset('layouts/js/custom.js') }}"></script>
    <script src="{{ asset('layouts/js/forms.js') }}"></script>
  </body>
</html>