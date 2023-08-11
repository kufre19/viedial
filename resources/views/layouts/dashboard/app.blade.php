<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>@yield('title',"Dashboard")</title>

    @include('layouts.dashboard.style')
    @yield('extra_css')
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
	
  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">
		<a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
			<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
		</a>	
		<!-- Logo -->
		<a href="{{url('/')}}" class="logo">
		  <!-- logo-->
		  <div class="logo-lg">
			  <span class="light-logo"><img src="{{asset('view_assets/images/logo-light-text.png')}}" alt="logo"></span>
			  <span class="dark-logo"><img src="{{asset('view_assets/images/logo-light-text.png')}}" alt="logo"></span>
		  </div>
		</a>	
	</div>  
    <!-- Header Navbar -->
    @include('layouts.dashboard.navigation')

  </header>
  
  @include('layouts.dashboard.sidebar')
  

  <!-- Content Wrapper. Contains page content -->
  @yield('main-content')
  <!-- /.content-wrapper -->
 
  @include('layouts.dashboard.footer')



  

</div>
<!-- ./wrapper -->
	
	
		
	

    @include('layouts.dashboard.scripts')
    @yield('extra_js')
	
</body>

</html>
