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
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Create Exam</li>
            </ol>
        </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->


        <h1>{{$exams->title}}
            <small> {{$exams->questions()->count()}} Q</small>
        </h1>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                @foreach ($exams->questions()->orderBy('order')->get() as $Q)

                    @if($Q->questiontable_type=="TFQuestion")
                        <tr>
                            <form role="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!-- text input -->
                                <div class="form-group">
                                    <h2>{{$Q->expression}}</h2>

                                </div>

                                <!-- radio -->
                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="correct_answer" id="optionsRadios2" value="1"
                                                   @if($Q->questiontable->correct_answer==1)

                                                   checked
                                                   @endif
                                                   disabled
                                            >
                                            True
                                        </label>
                                        <label>
                                            <input type="radio" name="correct_answer" id="optionsRadios2" value="0"
                                                   @if($Q->questiontable->correct_answer==0)

                                                   checked
                                                   @endif disabled>

                                            False
                                        </label>
                                    </div>


                                    <div class="form-group">
                                        <label>Score : {{$Q->pivot->score}}</label>

                                    </div>
                                    <div class="form-group">
                                        <label>estimated time : {{$Q->estimated_time}}</label>

                                    </div>

                                </div>


                            </form>
                        </tr>
                    @endif
                    @if($Q->questiontable_type=="MCQuestion")

                        <tr>
                            <form role="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!-- text input -->
                                <div class="form-group">
                                    <h2> {{$Q->expression}}</h2>

                                </div>

                                <h3>Answer Options</h3>

                                @foreach ($Q->questiontable->choices()->get() as $mc)

                                    <label> {{$mc->choice}}</label> </br>

                                @endforeach
                                <h3>Right Answer</h3>

                                <select class="form-control" name="correct_answer" id="dynamic_field2" disabled>
                                    <option>{{$Q->questiontable->correct_answer}}</option>
                                </select>


                                <div class="form-group">
                                    <label>Score : {{$Q->pivot->score}}</label>

                                </div>
                                <div class="form-group">
                                    <label>estimated time : {{$Q->estimated_time}}</label>

                                </div>

                            </form>

                        </tr>

                    @endif
                    @if($Q->questiontable_type=="MRQuestion")
                        <tr>
                            <form role="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!-- text input -->
                                <div class="form-group">
                                    <h2>{{$Q->expression}}</h2>

                                </div>
                                <div class="col-lg-12">
                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                        <div class="input-group">

                        <span class="input-group-addon">
                          <input type="checkbox" @if($mc->is_correct==1)

                          checked
                                 @endif
                                 disabled>
                        </span>


                                            <label> {{$mc->choice}}</label>


                                        </div>
                                @endforeach
                                <!-- /input-group -->
                                </div>
                                </br>
                                </br>
                                </br>
                                <div class="form-group">
                                    <label>Score : {{$Q->pivot->score}}</label>

                                </div>
                                <div class="form-group">
                                    <label>estimated time : {{$Q->estimated_time}}</label>

                                </div>


                            </form>
                        </tr>
                    @endif
                @endforeach
                <div class="box-footer">

                    <button type="submit" class="btn btn-info pull-right">
                        <a href="/eexams/public/teacher/exams/{{$exams->id_Exam}}/edit">
                            Edit
                        </a>
                    </button>
                    <form role="form" method="post" action="/eexams/public/teacher/exams/{{$exams->id_Exam}}">

                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-default btn-danger">Delete</button>
                    </form>
                </div>
            </table>

        </div>
    </section>
    <!-- /.content -->
    </div>
@endsection