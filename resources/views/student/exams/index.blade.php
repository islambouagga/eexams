@extends('layouts.student')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">




                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">HEADER</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li><a href="{{url('/student')}}"><i class="fa fa-link"></i> <span>Home</span></a></li>

                    <li class="active"><a href="{{route('student.exams.index')}}"><i class="fa fa-link"></i> <span>Exams List</span></a>
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

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Responsive Hover Table</h3>


                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Exam's date and time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $g)
                                @foreach($g->exams as $e)
                                <tr>


                                    <td>{{$e->id_Exam}}</td>
                                    <td>
                                        @if($date>=$e->pivot->date_scheduling)
                                            @if($date>=($e->pivot->date_scheduling))
                                        <a class="btn btn-info" href="/eexams/public/student/exams/create?id={{$e->id_Exam}}" >
                                        {{$e->title}}
                                        </a>
                                            @endif
                                            @else
                                           <samp class="btn btn-info" data-toggle="modal" data-target="#modal-warning"> {{$e->title}}</samp>
                                            @endif
                                    </td>
                                    <td>{{$e->Description}}</td>
                                    <td>{{$e->pivot->date_scheduling}}</td>



                                </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Exam's date and time</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="modal modal-warning fade" id="modal-warning">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Info Modal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>One fine body&hellip;</p>
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
                    <!-- /.box-body     -->
                </div>
                <!-- /.box -->
            </div>
        </div>



    </section>
    <!-- /.content -->
    </div>
@endsection
