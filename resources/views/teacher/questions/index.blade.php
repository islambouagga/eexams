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
                        <p>Alexander Pierce</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">HEADER</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li><a href="{{url('/teacher')}}"><i class="fa fa-link"></i> <span>Home</span></a></li>
                    <li><a href="{{route('teacher.exams.create')}}"><i class="fa fa-link"></i>
                            <span>Create a new exam</span></a>
                    </li>
                    <li class="active"><a href="{{route('teacher.exams.index')}}"><i class="fa fa-link"></i>
                            <span>Exams' list</span></a>
                    </li>
                    <li><a href="{{route('teacher.groups.create')}}"><i class="fa fa-link"></i>
                            <span>Create a new group</span></a>
                    </li>
                    <li><a href="{{route('teacher.groups.index')}}"><i class="fa fa-link"></i> <span>Groups' List</span></a>
                    </li>

                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Link in level 2</a></li>
                            <li><a href="#">Link in level 2</a></li>
                        </ul>
                    </li>

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-circle-o text-red"></i><span>
                    {{ __('Logout') }}
               </span> </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

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
                <li class="active">Questions Bank</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>expression</th>
                                        <th>questiontable_type</th>
                                        <th>Import</th>


                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    {{$id_exam}}--}}
                                    @foreach($questions as $q)
                                        <tr>
                                            <td>{{$q->expression}}</td>

                                            @if($q->questiontable_type=="MCQuestion")
                                                <td><span class="label label-success">MCQuestion</span></td>
                                            @elseif($q->questiontable_type=="TFQuestion")
                                                <td><span class="label label-warning">TFQuestion</span></td>
                                            @elseif($q->questiontable_type=="MRQuestion")
                                                <td><span class="label label-danger">MRQuestion</span></td>
                                            @endif
                                            @if($q->questiontable_type=="MCQuestion")
                                            <td>
                                                <a href="/eexams/public/teacher/questions/mcquestions/{{$q->id_Question}}/edit?id={{$q->id_Question}}&key={{$id_exam}}&sm=0&note=0">
                                                    <i class="glyphicon glyphicon-share-alt"></i></a>
                                            </td>
                                            @elseif($q->questiontable_type=="TFQuestion")
                                                <td>
                                                    <a href="/eexams/public/teacher/questions/tfquestions/{{$q->id_Question}}/edit?id={{$q->id_Question}}&key={{$id_exam}}&sm=0&note=0">
                                                        <i class="glyphicon glyphicon-share-alt"></i></a>
                                                </td>
                                            @elseif($q->questiontable_type=="MRQuestion")
                                                <td>
                                                    <a href="/eexams/public/teacher/questions/mrquestions/{{$q->id_Question}}/edit?id={{$q->id_Question}}&key={{$id_exam}}&sm=0&note=0">
                                                        <i class="glyphicon glyphicon-share-alt"></i></a>
                                                </td>
                                            @endif
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
