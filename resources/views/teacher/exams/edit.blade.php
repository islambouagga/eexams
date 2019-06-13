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
                    <tr>
                        <form role="form" method="post" action="/eexams/public/teacher/exams/{{$exams->id_Exam}}">
                            {{method_field('PATCH')}}
                            {{csrf_field()}}
                            <h3><input type="hidden" name="id_Exam" value="{{ $exams->id_Exam }}"></h3>
                            <!-- text input -->
                            <div class="form-group">
                                <label><h3>{{$Q->expression}}</h3></label>
                                <input type="text" name="expression{{$Q->id_Question}}" class="form-control"
                                       value="{{$Q->expression}}">

                            </div>
                            <h3><input type="hidden" name="id_Question{{$Q->id_Question}}"
                                       value="{{ $Q->id_Question }}"></h3>
                        @if($Q->questiontable_type=="TFQuestion")
                            <!-- radio -->
                                <div class="form-group">
                                    <label><h3>correct_answer</h3></label>
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
                                        <h3>Answer Options</h3>

                                        <div class="table-responsive">

                                            <table class="table table-bordered" id="dynamic_field">

                                                <tr>

                                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                                        <td><input type="text" name="choice{{$Q->id_Question}}[]"
                                                                   class="form-control name_list"
                                                                   value="{{$mc->choice}}"/></td>
                                                    @endforeach
                                                        <td>

                                                            <button type="button" name="add1" id="add1"
                                                                    class="btn btn-success">Add More
                                                            </button>
                                                        </td>

                                                </tr>

                                            </table>
                                        </div>

                                        <h3>Right Answer</h3>


                                        <!-- select -->
                                        <div class="form-group">
                                            <h3><input type="hidden" value="{{$d=1}}"></h3>
                                            <select class="form-control" name="correct_answer{{$Q->id_Question}}"
                                                    id="dynamic_field2">
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
                                        </div>
                                    @endif
                                    @if($Q->questiontable_type=="MRQuestion")
                                        <h3>Answer Options</h3>

                                        <div class="table-responsive">

                                            <table class="table table-bordered" id="dynamic_field3">

                                                <tr>
                                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                                        <td>
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
                                                                            class="form-control"></div>
                                                                <!-- /input-group -->
                                                            </div>
                                                        </td>
                                                    @endforeach

                                                    <td>
                                                        <button type="button" name="add" id="add"
                                                                class="btn btn-success">Add More
                                                        </button>
                                                    </td>

                                                </tr>

                                            </table>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label>Score : {{$Q->pivot->score}}</label>
                                        <input type="number" name="score{{$Q->id_Question}}" class="form-control"
                                               value="{{$Q->pivot->score}}">

                                    </div>
                                    <div class="form-group">
                                        <label>Order : {{$Q->pivot->order}}</label>
                                        <input type="number" name="order{{$Q->id_Question}}" class="form-control"
                                               value="{{$Q->pivot->order}}">

                                    </div>
                                    <div class="form-group">
                                        <label>estimated time : {{$Q->estimated_time}}</label>

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
                                    @endforeach
                                </div>
                                <div class="box-footer">

                                    <button type="submit" name="submitbtn" value="add" class="btn btn-info pull-right">
                                        make edit
                                    </button>
                                    <button class="btn btn-info ">
                                        <a href="/eexams/public/teacher/questions/tfquestions/create?id={{$exams->id_Exam}}&key=2">
                                            Edit
                                        </a>
                                    </button>
                                </div>

                        </form>
                    </tr>


            </table>
        </div>
    </section>
    <!-- /.content -->
    </div>
@endsection