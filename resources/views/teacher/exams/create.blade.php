@extends('layouts.teacher')

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
                    <li class="active"><a href="{{route('teacher.exams.create')}}"><i class="fa fa-file-text"></i>
                            <span>Create a new exam</span></a>
                    </li>
                    <li><a href="{{route('teacher.exams.index')}}"><i class="fa fa-files-o"></i>
                            <span>View exams list</span></a>
                    </li>
                    <li><a href="{{route('teacher.groups.create')}}"><i class="fa fa-group"></i>
                            <span>Create a new group</span></a>
                    </li>
                    <li><a href="{{route('teacher.groups.index')}}"><i class="fa fa-group"></i> <span>View groups List</span></a>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-solid">

                        <!-- /.box-header -->
                        <div class="box-body " style="margin: 10px ">
                            <div font="19px" class="box-group" id="accordion">
                                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                Create a new exam
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse in">
                                        <div class="box-body">
                                       This page allows you to create a new exam
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <ol class="breadcrumb">
                <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Create Exam</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <div class="box-body">
                <form role="form" method="post" action="{{route('teacher.exams.store')}} ">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!-- text input -->
                    <div class="form-group {{$errors->has('title') ? 'has-error ' : ''}}" >
                        <h2 class="col-md-3">Title</h2>
                        <input type="text" name="title" id="tit" class="form-control "  placeholder="Enter title" >
                       @if($errors->has('title'))
                        <span class="invalid-feedback help-block" role="alert">
                            <strong>{{$errors->first('title')}}</strong>
                        </span>
                           @endif
                    </div>

                    <!-- textarea -->
                    <div class="form-group {{$errors->has('Description') ? 'has-error ' : ''}}">
                        <h2 class="col-md-3">Description</h2>
                        <textarea type="text" name="Description" class="form-control" rows="3"
                                  placeholder="Enter description"></textarea>
                        @if($errors->has('Description'))
                            <span class="invalid-feedback help-block" role="alert">
                            <strong>{{$errors->first('Description')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-info btn-flat pull-right">Create</button>
                        <button type="button" id="btn" class="btn btn-danger" data-toggle="modal" data-target="#modal-warning">
                            Cancel
                        </button>
                    </div>
                </form>


                <div class="modal modal-warning fade" id="modal-warning">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Cancel creation of exam </h4>
                            </div>
                            <div class="modal-body">
                                <p>Do you want cancel creation of exam !!!</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
                                </button>
                                <a href="{{url('/')}}"> <button type="button" class="btn btn-outline">Go Ahead
                                </button></a>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
