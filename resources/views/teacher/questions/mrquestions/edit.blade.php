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
                    <li class="active"><a href="{{route('teacher.exams.create')}}"><i class="fa fa-link"></i>
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
                <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Create Exam</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <!-- /.box-header -->
            <div class="panel box box-body">

                <p><strong>description for Multiple Choices Question</strong></p>
            </div>

            <div class="box-body">
                <form role="form" method="post" action="{{route('teacher.mrquestions.store')}} ">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <h3><input type="hidden" name="id_Exam" value="{{ $id_exam }}"></h3>
                        <ul></ul>

                    </div>
                    @if($sm!=0)
                        <div class="alert alert-danger">
                            <h3>you can't add this question with score {{$note}} your exam note still {{20-$sm}}</h3>
                        </div>
                @endif
                    <!-- text input -->
                    <div class="form-group">
                        <label><h2>Question</h2></label>
                        <input type="text" name="expression" class="form-control {{$errors->has('expression') ? 'has-error ' : ''}} " value="{{$question->expression}}">
                        @if($errors->has('expression'))
                            <span class="invalid-feedback help-block" style="color: red;" role="alert">
                            <strong>{{$errors->first('expression')}}</strong>
                        </span>
                        @endif
                    </div>

                    <!-- /.box -->
                    <h2>Answer Options</h2>

                    <div class="table-responsive">

                        <table class="table table-bordered" id="dynamic_field3">
                            <button type="button" name="add" id="add"
                                    class="btn btn-success">Add More
                            </button>
                            @foreach ($question->questiontable->choices()->get() as $mc)
                                <tr>

                                    <td style="float: left">
                                        <div class="col-lg-12">
                                            <div class="input-group"><span
                                                        class="input-group-addon"><input
                                                            type="checkbox"
                                                            name="is_correct[]"
                                                            value="1" @if($mc->is_correct==1)

                                                            checked
                                 @endif><input
                                                            type="hidden"
                                                            name="is_correct[]"
                                                            value="0"></span><input
                                                        type="text"
                                                        name="choice[]"
                                                        value="{{$mc->choice}}"
                                                        class="form-control" style="width: 500px"></div>
                                            <!-- /input-group -->
                                        </div>
                                    </td>


                                    <td style="float: left">
                                        <button type="button" name="remove" id="0" class="btn btn-danger btn_remove">X
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="box box-default" style="border-top-color: #ecf0f5">
                        <div class="col-md-1">
                            <div class="form-group">
                                <h2>Order</h2>
                                <input type="number" name="order" class="form-control" value="{{$ecount+1}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <h2>Score</h2>
                                <input type="number" name="score" class="form-control {{$errors->has('score') ? 'has-error ' : ''}}">
                                @if($errors->has('score'))
                                    <span class="invalid-feedback help-block" style="color: red;" role="alert">
                            <strong>{{$errors->first('score')}}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="progress col-md-3" style="margin-top: 69px;padding-left: 0px ;padding-right: 0px">
                            <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width: {{$sumS*5}}%">

                            </div>
                        </div>
                        <div class="col-md-1"
                             style="margin-top: 69px;padding-left: 0px ;padding-right: 0px;margin-left: 50px">
                            <p class="text-red"><strong>rest:{{20-$sumS}}/20</strong></p>
                        </div>
                        <div class="col-md-3">
                            <h2> Estimated Time:</h2>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" name="estimated_time" class="form-control" placeholder="00H:00M"
                                       data-inputmask="'mask': ['99H:99M]', '00H:00M']" data-mask>
                            </div>

                        </div>
                        <!-- /.input group -->
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="box-footer"
                         style="margin-top: 26px;border-top-color: #ecf0f5;background-color: #ecf0f5  ">
                        <a href="{{url('/teacher/questions/mrquestions/create?id='.$id_exam.'&key=0')}}">
                            <button type="button" class="btn btn-danger">
                                Cancel
                            </button>
                        </a>

                            <button type="submit" name="submitbtn" value="add" class="btn btn-info pull-center">
                                Create Question
                            </button>
                            <button type="submit" name="submitbtn" value="submit" class="btn btn-info pull-right">Submit
                                Exam
                            </button>



                    </div>

                </form>
            </div>
            <!-- /.box-body -->
        </section>

    </div>
@endsection
