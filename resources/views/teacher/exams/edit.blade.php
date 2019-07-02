<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
@yield('title')
<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=d<title>AdminLTE 2 | Starter</title>evice-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
          href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
          href="{{asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.min.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script type="text/javascript" src="{{asset('lib/jquery-1.4.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('jquery-timeRangePicker.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#timePicker").timePicker({
                required: true,
                minutesStep: 10,
                include24: false
            });
            $("#timeRangePicker").timeRangePicker({
                required: false,
                minutesStep: 10,
                include24: true
            });
        });
    </script>

    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }
    </style>
</head>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-green sidebar-mini  ">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{{url('/teacher')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>E</b>IO</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Exam</b>-IO</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="{{ asset('dist/img/user1-128x128.jpg') }}" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                                <!-- /.menu -->
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{ asset('dist/img/avatar.png') }}" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">Hamza Djebli</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{ asset('dist/img/avatar.png') }}" class="img-circle"
                                     alt="User Image">

                                <p>
                                    Hamza Djebli - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit(); ">
                                        Sign out <span></span> </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('dist/img/avatar.png') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Hamza Djebli</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">

                    <!-- Optionally, you can add icons to the links -->
                    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
                    <li><a href="{{route('teacher.exams.create')}}"><i class="fa fa-file-text"></i>
                            <span>Create a new exam</span></a>
                    </li>
                    <li><a href="{{route('teacher.exams.index')}}"><i class="fa fa-files-o"></i>
                            <span>View Exams' list</span></a>
                    </li>
                    <li><a href="{{route('teacher.groups.create')}}"><i class="fa fa-group"></i>
                            <span>Create a new group</span></a>
                    </li>
                    <li><a href="{{route('teacher.groups.index')}}"><i class="fa fa-group"></i>
                            <span>View Groups' List</span></a>
                    </li>

                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>--}}
                    {{--                            <span class="pull-right-container">--}}
                    {{--                <i class="fa fa-angle-left pull-right"></i>--}}
                    {{--              </span>--}}
                    {{--                        </a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">Link in level 2</a></li>--}}
                    {{--                            <li><a href="#">Link in level 2</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}

                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i><span>
                    {{ __('Logout') }}
               </span> </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            </br>
            <h1>

                <!--  <small>Optional description</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="/eexams/public/teacher/exams/{{$exams->id_Exam}}"><i class="fa fa-dashboard"></i>View Exam</a>
                </li>
                <li class="active">Edit Exam</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->


            <form role="form" method="post" action="/eexams/public/teacher/exams/{{$exams->id_Exam}}">
                {{method_field('PATCH')}}
                {{csrf_field()}}
                <div class="form-group">
                    <h2>Exam Tilte </h2>
                    <input type="text" name="title" class="form-control"
                           value="{{$exams->title}}">
                    <h2>Exam Description</h2>
                    <textarea type="text" name="Description" class="form-control"
                              value="{{$exams->Description}}">{{$exams->Description}} </textarea>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <input type="hidden" {{$c=1}}>
                        @foreach ($exams->questions()->orderBy('order')->get() as $Q)
                            <tr>


                                <h3><input type="hidden" name="id_Exam" value="{{ $exams->id_Exam }}"></h3>
                                <!-- text input -->
                                <div class="form-group">
                                    <label><h2>Question {{$c}} <samp style="font-style: italic;">expression</samp></h2>
                                    </label>
                                    <input type="text" name="expression{{$Q->id_Question}}" class="form-control"
                                           value="{{$Q->expression}}">

                                </div>
                                <h2><input type="hidden" name="id_Question{{$Q->id_Question}}"
                                           value="{{ $Q->id_Question }}"></h2>
                            @if($Q->questiontable_type=="TFQuestion")
                                <!-- radio -->
                                    <div class="form-group">
                                        <label><h2>Correct Answer</h2></label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="correct_answer{{$Q->id_Question}}"
                                                       id="optionsRadios2" value="1"
                                                       @if($Q->questiontable->correct_answer==1)

                                                       checked
                                                        @endif
                                                >
                                                True
                                            </label>
                                            <label>
                                                <input type="radio" name="correct_answer{{$Q->id_Question}}"
                                                       id="optionsRadios2" value="0"
                                                       @if($Q->questiontable->correct_answer==0)

                                                       checked
                                                        @endif
                                                >
                                                False
                                            </label>
                                        </div>
                                        @endif
                                        @if($Q->questiontable_type=="MCQuestion")

                                            <h2>Answer Options</h2>

                                            <div class="table-responsive">
                                                <input type="hidden" value="{{$d0=1}}">
                                                <table class="table table-bordered" id="dynamic_field00">
                                                    <button type="button" name="add00" class="add00"
                                                           >Add More
                                                    </button>

                                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                                        <tr>


                                                            <td style="float: left"><input style="width: 500px"
                                                                                           type="text"
                                                                                           name="choice{{$Q->pivot->order}}[]"
                                                                                           class="form-control name_list"
                                                                                           value="{{$mc->choice}}"/>
                                                            </td>

                                                            <td style="float: left">

                                                                <button type="button" name="remove" id="0"
                                                                        class="btn btn-danger btn_remove">X
                                                                </button>

                                                            </td>

                                                        </tr>
                                                        {{$d0++}}
                                                    @endforeach
                                                </table>
                                            </div>

                                            <h2 style="float:left ;margin-right: 25px; padding: 0px;margin-top: 40px;">
                                                Right Answer</h2>


                                            <!-- select -->
                                            <div class="form-group">
                                                <h3><input type="hidden" value="{{$d=1}}"></h3>
                                                <select style="width: 150px; float:left ;margin-top: 20px"
                                                        class="form-control" name="correct_answer{{$Q->id_Question}}"
                                                        id="dynamic_field22">
                                                    <option value="{{$Q->questiontable->correct_answer}}">{{$Q->questiontable->correct_answer}}</option>
                                                    @while(count($Q->questiontable->choices()->get())>=$d)
                                                        @if($Q->questiontable->correct_answer==$d)
                                                            {{$d++}}
                                                            <option value="{{$d}}">{{$d}}</option>
                                                        @else
                                                            <option value="{{$d}}">{{$d}}</option>
                                                        @endif
                                                        {{$d++}}

                                                    @endwhile
                                                </select>
                                                <hr style="clear:both;"/>

                                            </div>
                                        @endif
                                        @if($Q->questiontable_type=="SAQuestion")

                                            <h2>Answer Options</h2>

                                            <div class="table-responsive">

                                                <table class="table table-bordered" id="dynamic_field11">
                                                    <button type="button" name="add2" id="add2"
                                                            class="btn btn-success">Add More
                                                    </button>

                                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                                        <tr>


                                                            <td style="float: left"><input style="width: 500px"
                                                                                           type="text"
                                                                                           name="choice{{$Q->id_Question}}[]"
                                                                                           class="form-control name_list"
                                                                                           value="{{$mc->choice}}"/>
                                                            </td>

                                                            <td style="float: left">

                                                                <button type="button" name="remove" id="0"
                                                                        class="btn btn-danger btn_remove">X
                                                                </button>

                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        @endif
                                        @if($Q->questiontable_type=="MRQuestion")
                                            <h2>Answer Options</h2>

                                            <div class="table-responsive">

                                                <table class="table table-bordered" id="dynamic_field33">
                                                    <button type="button" name="add" id="add"
                                                            class="btn btn-success">Add More
                                                    </button>
                                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                                        <tr>

                                                            <td style="float: left">
                                                                <div class="col-lg-12">
                                                                    <div class="input-group"><span
                                                                                class="input-group-addon"><input
                                                                                    type="checkbox"
                                                                                    name="is_correct{{$Q->id_Question}}[]"
                                                                                    value="1" @if($mc->is_correct==1)

                                                                                    checked
                                 @endif><input
                                                                                    type="hidden"
                                                                                    name="is_correct{{$Q->id_Question}}[]"
                                                                                    value="0"></span><input
                                                                                type="text"
                                                                                name="choice{{$Q->id_Question}}[]"
                                                                                value="{{$mc->choice}}"
                                                                                class="form-control"
                                                                                style="width: 500px"></div>
                                                                    <!-- /input-group -->
                                                                </div>
                                                            </td>


                                                            <td style="float: left">
                                                                <button type="button" name="remove" id="0"
                                                                        class="btn btn-danger btn_remove">X
                                                                </button>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        @endif

                                        <div class="box box-default" style="border-top-color: #ecf0f5;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h2>Order</h2>
                                                    <input type="number" name="order{{$Q->id_Question}}"
                                                           class="form-control"
                                                           value="{{$Q->pivot->order}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h2>Score</h2>
                                                    <input type="number" name="score{{$Q->id_Question}}"
                                                           class="form-control"
                                                           value="{{$Q->pivot->score}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h2> Estimated Time:</h2>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="text" name="estimated_time{{$Q->id_Question}}"
                                                           class="form-control" placeholder="00H:00M"
                                                           data-inputmask="'mask': ['99H:99M]', '00H:00M']" data-mask
                                                           value="{{$Q->estimated_time}}">
                                                </div>

                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <input type="hidden" {{$c++}}>
                                        @endforeach
                                    </div>
                                    <div class="box-footer">

                                        <button type="submit" name="submitbtn" value="add"
                                                class="btn btn-success pull-right">
                                            Submit Exam
                                        </button>

                                        <a href="/eexams/public/teacher/questions/tfquestions/create?id={{$exams->id_Exam}}&key=2"
                                           class="btn btn-info">

                                            Create Question

                                        </a>
                                    </div>


                            </tr>


                    </table>

                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Version 1.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">ExamIO Inc</a>.</strong> All rights reserved.
    <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
    <a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
    <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
</footer>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- Select2 -->
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- CK Editor -->
<script src="{{asset('bower_components/ckeditor/ckeditor.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- jQuery Knob -->
<script src="{{asset('bower_components/jquery-knob/js/jquery.knob.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{{asset('dist/js/demo.js')}}"></script>--}}
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true, startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(1.5, 'hour'),
            locale: {
                format: 'MM/DD/YYYY HH:mm '
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>

<script type="text/javascript">

    $(document).ready(function () {

        var postURL = "<?php echo url('addmore'); ?>";

        var i = " {{$d0}}";
        var c= 1;
        var b =0;
        var co=1;

        $('.add00').click(function () {

            i++;
            co++;

            $('#dynamic_field00').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="choice'+ c +'[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            $('#dynamic_field2').append('<option id="op'+co+'" value="' +co+ '">' + co + '</option>');


        });
        $('#add2').click(function () {

            i++;
            co++;

            $('#dynamic_field1').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="choice[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            $('#dynamic_field22').append('<option id="op'+co+'" value="' +co+ '">' + co + '</option>');


        });

        $('#add').click(function () {

            b++;


            $('#dynamic_field3').append('<tr id="row' + b + '" class="dynamic-added"><td style="float: left"><div  ><div class="input-group"><span class="input-group-addon"><input type="checkbox" name="is_correct[]" value="1"><input type="hidden" name="is_correct[]" value="0"></span><input type="text" name="choice[]" class="form-control" style="width: 500px"></div><!-- /input-group --></div></td><td style="float: left"><button type="button" name="remove" id="' + b + '" class="btn btn-danger btn_remove">X</button></td></tr>');

        });

        $(document).on('click', '.btn_remove', function () {

            var button_id = $(this).attr("id");
            var op_id=$(this).attr("op")

            $('#row' + button_id + '').remove();
            $('#op'+co+'' ) .remove();

            co--;
        });


        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });


        $('#submit').click(function () {

            $.ajax({

                url: postURL,

                method: "POST",

                data: $('#add_name').serialize(),

                type: 'json',

                success: function (data) {

                    if (data.error) {

                        printErrorMsg(data.error);

                    } else {

                        i = 1;
                        !
                            $('.dynamic-added').remove();

                        $('#add_name')[0].reset();

                        $(".print-success-msg").find("ul").html('');

                        $(".print-success-msg").css('display', 'block');

                        $(".print-error-msg").css('display', 'none');

                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');

                    }

                }

            });

        });


        function printErrorMsg(msg) {

            $(".print-error-msg").find("ul").html('');

            $(".print-error-msg").css('display', 'block');

            $(".print-success-msg").css('display', 'none');

            $.each(msg, function (key, value) {

                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');

            });

        }

    });

</script>

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
<script>
    $(function () {
        /* jQueryKnob */

        $(".knob").knob({
            /*change : function (value) {
             //console.log("change : " + value);
             },
             release : function (value) {
             console.log("release : " + value);
             },
             cancel : function () {
             console.log("cancel : " + this.value);
             },*/
            draw: function () {

                // "tron" case
                if (this.$.data('skin') == 'tron') {

                    var a = this.angle(this.cv)  // Angle
                        , sa = this.startAngle          // Previous start angle
                        , sat = this.startAngle         // Start angle
                        , ea                            // Previous end angle
                        , eat = sat + a                 // End angle
                        , r = true;

                    this.g.lineWidth = this.lineWidth;

                    this.o.cursor
                    && (sat = eat - 0.3)
                    && (eat = eat + 0.3);

                    if (this.o.displayPrevious) {
                        ea = this.startAngle + this.angle(this.value);
                        this.o.cursor
                        && (sa = ea - 0.3)
                        && (ea = ea + 0.3);
                        this.g.beginPath();
                        this.g.strokeStyle = this.previousColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                        this.g.stroke();
                    }

                    this.g.beginPath();
                    this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                    this.g.stroke();

                    this.g.lineWidth = 2;
                    this.g.beginPath();
                    this.g.strokeStyle = this.o.fgColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                    this.g.stroke();

                    return false;
                }
            }
        });
        /* END JQUERY KNOB */

        //INITIALIZE SPARKLINE CHARTS
        $(".sparkline").each(function () {
            var $this = $(this);
            $this.sparkline('html', $this.data());
        });

        /* SPARKLINE DOCUMENTATION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
        drawDocSparklines();
        drawMouseSpeedDemo();

    });
    function drawDocSparklines() {

        // Bar + line composite charts
        $('#compositebar').sparkline('html', {type: 'bar', barColor: '#aaf'});
        $('#compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
            {composite: true, fillColor: false, lineColor: 'red'});


        // Line charts taking their values from the tag
        $('.sparkline-1').sparkline();

        // Larger line charts for the docs
        $('.largeline').sparkline('html',
            {type: 'line', height: '2.5em', width: '4em'});

        // Customized line chart
        $('#linecustom').sparkline('html',
            {
                height: '1.5em', width: '8em', lineColor: '#f00', fillColor: '#ffa',
                minSpotColor: false, maxSpotColor: false, spotColor: '#77f', spotRadius: 3
            });



        // Tri-state charts using inline values
        $('.sparktristate').sparkline('html', {type: 'tristate'});
        $('.sparktristatecols').sparkline('html',
            {type: 'tristate', colorMap: {'-2': '#fa7', '2': '#44f'}});

        // Composite line charts, the second using values supplied via javascript
        $('#compositeline').sparkline('html', {fillColor: false, changeRangeMin: 0, chartRangeMax: 10});
        $('#compositeline').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
            {composite: true, fillColor: false, lineColor: 'red', changeRangeMin: 0, chartRangeMax: 10});

        // Line charts with normal range marker
        $('#normalline').sparkline('html',
            {fillColor: false, normalRangeMin: -1, normalRangeMax: 8});
        $('#normalExample').sparkline('html',
            {fillColor: false, normalRangeMin: 80, normalRangeMax: 95, normalRangeColor: '#4f4'});

        // Discrete charts
        $('.discrete1').sparkline('html',
            {type: 'discrete', lineColor: 'blue', xwidth: 18});
        $('#discrete2').sparkline('html',
            {type: 'discrete', lineColor: 'blue', thresholdColor: 'red', thresholdValue: 4});

        // Bullet charts
        $('.sparkbullet').sparkline('html', {type: 'bullet'});

        // Pie charts
        $('.sparkpie').sparkline('html', {type: 'pie', height: '1.0em'});

        // Box plots
        $('.sparkboxplot').sparkline('html', {type: 'box'});
        $('.sparkboxplotraw').sparkline([1, 3, 5, 8, 10, 15, 18],
            {type: 'box', raw: true, showOutliers: true, target: 6});

        // Box plot with specific field order
        $('.boxfieldorder').sparkline('html', {
            type: 'box',
            tooltipFormatFieldlist: ['med', 'lq', 'uq'],
            tooltipFormatFieldlistKey: 'field'
        });

        // click event demo sparkline
        $('.clickdemo').sparkline();
        $('.clickdemo').bind('sparklineClick', function (ev) {
            var sparkline = ev.sparklines[0],
                region = sparkline.getCurrentRegionFields();
            value = region.y;
            alert("Clicked on x=" + region.x + " y=" + region.y);
        });

        // mouseover event demo sparkline
        $('.mouseoverdemo').sparkline();
        $('.mouseoverdemo').bind('sparklineRegionChange', function (ev) {
            var sparkline = ev.sparklines[0],
                region = sparkline.getCurrentRegionFields();
            value = region.y;
            $('.mouseoverregion').text("x=" + region.x + " y=" + region.y);
        }).bind('mouseleave', function () {
            $('.mouseoverregion').text('');
        });
    }

    /**
     ** Draw the little mouse speed animated graph
     ** This just attaches a handler to the mousemove event to see
     ** (roughly) how far the mouse has moved
     ** and then updates the display a couple of times a second via
     ** setTimeout()
     **/
    function drawMouseSpeedDemo() {
        var mrefreshinterval = 500; // update display every 500ms
        var lastmousex = -1;
        var lastmousey = -1;
        var lastmousetime;
        var mousetravel = 0;
        var mpoints = [];
        var mpoints_max = 30;
        $('html').mousemove(function (e) {
            var mousex = e.pageX;
            var mousey = e.pageY;
            if (lastmousex > -1) {
                mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
            }
            lastmousex = mousex;
            lastmousey = mousey;
        });
        var mdraw = function () {
            var md = new Date();
            var timenow = md.getTime();
            if (lastmousetime && lastmousetime != timenow) {
                var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
                mpoints.push(pps);
                if (mpoints.length > mpoints_max)
                    mpoints.splice(0, 1);
                mousetravel = 0;
                $('#mousespeed').sparkline(mpoints, {width: mpoints.length * 2, tooltipSuffix: ' pixels per second'});
            }
            lastmousetime = timenow;
            setTimeout(mdraw, mrefreshinterval);
        };
        // We could use setInterval instead, but I prefer to do it this way
        setTimeout(mdraw, mrefreshinterval);
    }
</script>
<script>
    $('#btn').on('click',function ()
    {
        $('#tit').each(function () {
            if(!$(this).val())
            {
                $(this).css('borderColor','red');
            }
        })
    });

</script>
</body>
</html>