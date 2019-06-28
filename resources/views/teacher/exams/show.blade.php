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
                    <li><a href="{{route('teacher.exams.create')}}"><i class="fa fa-file-text"></i>
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
            <ol class="breadcrumb">
                <li><a href="{{route('teacher.exams.index')}}"><i class="fa fa-dashboard"></i>Exams list</a></li>
                <li class="active">View Exam</li>
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
                            <h3>{{$qcount}}</h3>

                            <p>Questions</p>
                        </div>
                        <div class="icon">
                            <i class="fa   fa-question"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$mcq}}<sup style="font-size: 20px"></sup></h3>

                            <p>Multiple Choices</p>
                        </div>
                        <div class="icon">
                            <i class="fa  fa-question"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$mrq}}</h3>

                            <p>Multiple Response</p>
                        </div>
                        <div class="icon">
                            <i class="fa  fa-question"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$tfq}}</h3>

                            <p>True/False</p>
                        </div>
                        <div class="icon">
                            <i class="fa    fa-question"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{$saq}}</h3>

                            <p>Short Answer</p>
                        </div>
                        <div class="icon">
                            <i class="fa    fa-question"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
            </div>
            @if(count($exams->students)!=0)
                <div class="row">
                    <div class="col-lg-auto col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-fuchsia">
                            <div class="inner">
                                <h3>{{$tst}}</h3>
                                <p>Students whom will took the exam</p>
                            </div>
                            <div class="icon">
                                <i class="fa  fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-auto col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{$pst*100/$tst}}<sup style="font-size: 20px">%</sup></h3>
                                <p>Students had gotten the exam</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            @elseif(count($exams->groupes)!=0)
                <div class="row">
                    <div class="col-lg-auto col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-fuchsia">
                            <div class="inner">
                                <h3>{{$stn}}</h3>
                                <p>Students whom will pass the exam</p>
                            </div>
                            <div class="icon">
                                <i class="fa  fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-auto col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{$dsch}}<sup style="font-size: 20px"></sup></h3>
                                <p>Scheduled date and time</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            @else
            @endif
            <div class="box box-default collapsed-box ">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$exams->title}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {{$exams->Description}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box-header with-border" style="border-top-color: #0300f5">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        @foreach ($exams->questions()->orderBy('order')->get() as $Q)
                            @if($Q->questiontable_type=="TFQuestion")
                                <tr>
                                    <div class="callout callout-danger">
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
                                                        <input style="margin-top: 4px;" type="radio"
                                                               name="correct_answer"
                                                               id="optionsRadios2" value="1"
                                                               @if($Q->questiontable->correct_answer==1)
                                                               checked
                                                               @endif
                                                               disabled>
                                                        True
                                                    </label>
                                                    <label>
                                                        <input style="margin-top: 4px;" type="radio"
                                                               name="correct_answer"
                                                               id="optionsRadios2" value="0"
                                                               @if($Q->questiontable->correct_answer==0)
                                                               checked
                                                               @endif disabled>
                                                        False
                                                    </label>
                                                </div>
                                                <div class="box box-default"
                                                     style="border-top-color: #dd4b39;background-color: #dd4b39;">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h4>Score : {{$Q->pivot->score}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-auto">
                                                        <div class="form-group">
                                                            <h4>estimated time : {{$Q->estimated_time}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </tr>
                            @endif
                            @if($Q->questiontable_type=="MCQuestion")
                                <tr>
                                    <div class="callout callout-success">
                                        <form role="form">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <h2> {{$Q->expression}}</h2>
                                            </div>
                                            @foreach ($Q->questiontable->choices()->get() as $mc)
                                                <h3 style="margin-right: 10px;font-size: larger;"> {{$mc->choice}}</h3>
                                            @endforeach
                                            <br>
                                            <div class="box box-default"
                                                 style="border-top-color: #00a65a;background-color: #00a65a;">
                                                <div class="col-md-4">
                                                    <h4>Right options :{{$Q->questiontable->correct_answer}}</h4>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h4>Score : {{$Q->pivot->score}}</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <h4>estimated time : {{$Q->estimated_time}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </tr>
                            @endif
                                @if($Q->questiontable_type=="SAQuestion")
                                    <tr>
                                        <div class="callout " style="background-color: #3c8dbc">
                                            <form role="form">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <h2 style="color: white"> {{$Q->expression}}</h2>
                                                </div>
                                                <h4 style="color: white">Right options :</h4>
                                                @foreach ($Q->questiontable->choices()->get() as $mc)
                                                    <h3 style="margin-right: 10px;font-size: larger;color: white"> {{$mc->choice}}</h3>
                                                @endforeach
                                                <br>
                                                <div class="box box-default"
                                                    style="border-top-color: #3c8dbc;background-color: #3c8dbc;">

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h4 style="color: white">Score : {{$Q->pivot->score}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <h4 style="color: white">estimated time : {{$Q->estimated_time}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </tr>
                                @endif
                            @if($Q->questiontable_type=="MRQuestion")
                                <tr>
                                    <div class="callout callout-warning">
                                        <form role="form">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <h2>{{$Q->expression}}</h2>
                                            </div>
                                            <div class="col-lg-12">
                                                @foreach ($Q->questiontable->choices()->get() as $mc)
                                                    <div class="input-group">
                                                    <span class="input-group-addon"
                                                          style="border-color: #f39c12;background-color: #f39c12;">
                                                      <input style="border-color: #f39c12;background-color: #f39c12;"
                                                             type="checkbox" @if($mc->is_correct==1)
                                                             checked
                                                             @endif
                                                             disabled>
                                                    </span>
                                                        <h4 style="margin-top: 7px;"> {{$mc->choice}}</h4>
                                                    </div>
                                                 @endforeach
                                            <!-- /input-group -->
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h4 style="margin-top: 2px;">Score : {{$Q->pivot->score}}</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="form-group">
                                                    <h4>estimated time : {{$Q->estimated_time}}</h4>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </tr>
                            @endif

                                <form role="form" method="post" action="/eexams/public/teacher/questions/{{$exams->id_Exam}}">
                                    {{method_field('PATCH')}}
                                    {{csrf_field()}}
                                    <input type="hidden" name="id_Question" value="{{$Q->id_Question}}">
                                    <input type="hidden" name="id_Exam" value="{{$exams->id_Exam}}">
                                    <button style="color: white;@if(count($exams->groupes)!=0) display:none @endif "
                                            type="submit" class="btn btn-default btn-danger pull-right">Delete
                                        question
                                    </button>
                                </form>
                            <br>
                            <br>


                        @endforeach

                        <div style="background-color: #ecf0f5;" class="box-footer">

                            <a href="/eexams/public/teacher/exams/{{$exams->id_Exam}}/edit">
                                <button type="submit" class="btn btn-info pull-right" @if(count($exams->groupes)!=0)
                                style="display: none" @endif>
                                    Edit Exam
                                </button>
                            </a>
                            @if(count($exams->groupes)!=0)
{{--                                <a href="{{route('teacher.exams.schedule',$exams->id_Exam)}}">--}}
{{--                                    <button style="margin-right: 60px;" type="submit" class="btn btn-warning pull-right"@if(count($exams->students) !=0)--}}
{{--                                    style="display: none"   @endif>--}}
{{--                                        Unscheduled Exam--}}
{{--                                    </button>--}}
{{--                                </a>--}}
                            @endif
                            @if(count($exams->groupes)==0)
                                <a href="{{route('teacher.exams.schedule',$exams->id_Exam)}}">
                                    <button style="margin-right: 60px;" type="submit" class="btn btn-warning pull-right">
                                        Schedule Exam
                                    </button>
                                </a>
                            @endif

                            <form role="form" method="post" action="/eexams/public/teacher/exams/{{$exams->id_Exam}}">
                                @method('DELETE')
                                @csrf
                                <button style="color: white;@if(count($exams->groupes)!=0) display:none @endif "
                                        type="submit" class="btn btn-default btn-danger">Delete
                                    Exam
                                </button>
                            </form>

                        </div>
                    </table>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection