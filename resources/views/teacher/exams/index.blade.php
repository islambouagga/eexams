@extends('layouts.teacher')
{{--@section('title',"Exam's List")--}}
@section('content')
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
                    <li class="active"><a href="{{route('teacher.exams.index')}}"><i class="fa fa-files-o"></i>
                            <span>View exams list</span></a>
                    </li>
                    <li><a href="{{route('teacher.groups.create')}}"><i class="fa fa-group"></i>
                            <span>Create a new group</span></a>
                    </li>
                    <li><a href="{{route('teacher.groups.index')}}"><i class="fa fa-group"></i> <span>View groups list</span></a>
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

                    <li>  <a href="{{ route('logout') }}"
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
                <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Exams List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$ecount}}</h3>

                            <p>Total</p>
                        </div>
                        <div class="icon">
                            <i class="fa  fa-file-text-o"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$epassed}}<sup style="font-size: 20px"></sup></h3>

                            <p>Passed Exams</p>
                        </div>
                        <div class="icon">
                            <i class="fa  fa-file-text-o"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$eschu}}</h3>

                            <p>Scheduled Exams</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-clock-o"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$ecount-$eschu-$epassed}}</h3>

                            <p>Created Exams</p>
                        </div>
                        <div class="icon">
                            <i class="fa  fa-file-text-o"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Creation date</th>
                                        <th>Status</th>
                                        <th>Download</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($exams as $e)
                                        <tr>
                                            <td>{{$e->title}}</td>
                                            <td>{{$e->Description}}</td>
                                            <td>{{$e->created_at}}</td>
                                            @if(count($e->students)!=0)
                                            <td><span class="label label-success">Passed</span></td>
                                            @elseif(count($e->groupes)!=0)
                                            <td><span class="label label-warning">Schedule</span></td>
                                            @else
                                            <td><span class="label label-danger">Created</span></td>
                                            @endif
                                            <td><i class="glyphicon glyphicon-download-alt"></i></td>
                                            <td>
                                                <a href="/eexams/public/teacher/exams/{{$e->id_Exam}}">
                                                    <i class="fa fa-fw fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form role="form" method="post"
                                                      action="/eexams/public/teacher/exams/{{$e->id_Exam}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="fa fa-trash-o"></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
