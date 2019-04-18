@extends('layouts.teacher')

@section('content')

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">HEADER</li>
                <!-- Optionally, you can add icons to the links -->
                <li><a href="{{url('/admin')}}"><i class="fa fa-link"></i> <span>Home</span></a></li>
                <li><a href="{{route('teacher.exams.create')}}"><i class="fa fa-link"></i> <span>Create Exam</span></a>
                </li>
                <li><a href="{{route('teacher.exams.index')}}"><i class="fa fa-link"></i> <span>Exams List</span></a>
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
        <h1>
            Create your Exam
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
                    {{$Q->id_Question}}
                    <tr>
                        <!-- text input -->
                        <form role="form" method="post"
                              action="/eexams/public/teacher/questions/tfquestions/{{$Q->id_Question}}">
                            {{method_field('PATCH')}}
                            {{csrf_field()}}
                            <h3><input type="hidden" name="id_Exam" value="{{ $exams->id_Exam }}"> </h3>
                            <div class="form-group">
                                <label><h3>{{$Q->expression}}</h3></label>
                                <input type="text" name="expression" class="form-control"
                                       value="{{$Q->expression}}">
                            </div>
                            <h3><input type="hidden" name="id_Question"
                                       value="{{ $Q->id_Question }}"></h3>
                            <!-- radio -->
                            <div class="form-group">
                                <label><h3>correct_answer</h3></label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="correct_answer" id="optionsRadios2"
                                               value="1"
                                               @if($Q->questiontable->correct_answer==1)
                                               checked
                                                @endif
                                        >
                                        True
                                    </label>
                                    <label>
                                        <input type="radio" name="correct_answer" id="optionsRadios2"
                                               value="0"
                                               @if($Q->questiontable->correct_answer==0)
                                               checked
                                                @endif
                                        >
                                        False
                                    </label>
                                </div>
                                <div class="form-group">

                                    <input type="hidden"  name="order" class="form-control" value="{{$Q->pivot->score}}">
                                </div>
                                <div class="form-group">
                                    <label>Score : {{$Q->pivot->score}}</label>
                                    <input type="number" name="score" class="form-control"
                                           value="{{$Q->pivot->score}}">
                                </div>
                                <div class="form-group">
                                    <label>estimated time : {{$Q->estimated_time}}</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="time" min="00:00:00" max="01:30:00"
                                               name="estimated_time"
                                               class="form-control pull-right" value="{{$Q->estimated_time}}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-info pull-right">
                                edit
                            </button>
                        </form>
                    </tr>
                @endforeach

            </table>
            </br>
            <div>
                <button class="btn-lg pull-right">
                    <a href="/eexams/public/teacher/exams/{{$exams->id_Exam}}">
                        make edit
                    </a>
                </button>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection