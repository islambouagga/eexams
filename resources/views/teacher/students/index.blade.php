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
                    <li><a href="{{route('teacher.exams.index')}}"><i class="fa fa-link"></i>
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
                <li><a href="{{route('teacher.groups.index')}}"><i class="fa fa-dashboard"></i> Group's List</a></li>
                <li class="active">Edit Group</li>
            </ol>
        </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->


        <form role="form" method="post" action="/eexams/public/teacher/groups/{{$group->id_Group}}">
            {{method_field('PATCH')}}
            {{csrf_field()}}

            <div class="form-group">
                <h2 class="col-md-3">Group Title</h2>
                <input type="hidden" name="title" class="form-control"
                       value="222{{$group}}">
                <input type="text" name="title" class="form-control" value="{{$group->title}}">
            </div>

            <!-- textarea -->
            <div class="form-group">
                <h2 class="col-md-3">Group Description</h2>
                <textarea type="text" name="Description" class="form-control" rows="3"
                          placeholder="Enter ...">{{$group->Description}}</textarea>
            </div>
            <div class="form-group">
                <h2>students</h2>
                <select class="form-control select2" name="students[]"  multiple="multiple"  data-placeholder="Select a State"
                >

                    @foreach($students as $ss)
                        {{--                                            {{$exist=$group->students()->where('id_student', $s->id_student)}}--}}
                        {{$exist=$group->students()->
                        where('students.id_student', $ss->id_student)->exists()
}}
                        <option @if($exist==true) disabled="disabled" @endif value="{{$ss->id_student}}">{{$ss->name}} @if($exist==true)is already exist @endif </option>
                    @endforeach
                </select>


            </div>

            <div class="box-footer" style="background-color: #ecf0f5;">

                <button type="submit" name="submitbtn" value="add" class="btn btn-info pull-right">
                    Update Group
                </button>

            </div>

        </form>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>delete</th>



                            </tr>
                            </thead>
                            <tbody>
                            @foreach($group->students()->get() as $s)
                                <tr>
                                    <td>{{$s->id_student}}</td>
                                    <td>{{$s->name}}</td>
                                    <td>
                                        <form role="form" method="post"
                                              action="/eexams/public/teacher/students/{{$s->id_student}}">
                                            <input type="hidden" name="id_Group" value="{{$group->id_Group}}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="fa fa-trash-o"></button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tr>

                            </tr>

                        </table>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>


    </section>
    <!-- /.content -->
    </div>
@endsection
