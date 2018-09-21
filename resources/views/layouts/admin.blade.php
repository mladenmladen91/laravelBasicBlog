
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
     

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
     <link href="{{asset('css/libs.css')}}" rel="stylesheet">

  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




</head>

<body id="admin-page">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
       <a class="navbar-brand pull-left" href="{{route('start')}}">CMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
           
        </div>
        <ul class="nav" id="side-menu">
                   
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench fa-fw"></i>Users</a>
                        <ul class="nav nav-second-level dropdown-menu dropdown-user">
                            <li>
                                <a href="{{ route('users.index') }}">All Users</a>
                            </li>

                            <li>
                                <a href="{{ route('users.create') }}">Create User</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench fa-fw"></i> Posts</a>
                        <ul class="nav nav-second-level dropdown-menu dropdown-user">
                            <li>
                                <a href="{{ route('posts.index') }}">All Posts</a>
                            </li>

                            <li>
                                <a href="{{ route('posts.create') }}">Create Post</a>
                            </li>
                             <li>
                                <a href="{{ route('comments.index') }}">All Comments</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench fa-fw"></i>Categories</a>
                        <ul class="nav nav-second-level dropdown-menu dropdown-user">
                            <li>
                                <a href="{{ route('categories.index') }}">All Categories</a>
                            </li>


                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} 
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{route('users.edit', Auth::user()->id)}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
<li>
                     
                </ul>
        

        <!-- /.navbar-static-side -->
    </nav>

</div>






<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>

                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>


@yield('footer')





</body>

</html>
