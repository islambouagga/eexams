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
                            <span>View Exams' list</span></a>
                    </li>
                    <li><a href="{{route('teacher.groups.create')}}"><i class="fa fa-group"></i>
                            <span>Create a new group</span></a>
                    </li>
                    <li><a href="{{route('teacher.groups.index')}}"><i class="fa fa-group"></i>
                            <span>View Groups' List</span></a>
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

                    <li><a href="{{ route('logout') }}"
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
                <li><a href="/eexams/public/teacher/exams/{{$exams->id_Exam}}"><i class="fa fa-dashboard"></i>View Exam</a>
                </li>
                <li class="active">Edit Exam</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->


            <form role="form" method="post" action="/eexams/public/teacher/exams/{{$exams->id_Exam}}">
                {{method_field('PATCH')}}
                {{csrf_field()}}
                <div class="form-group">
                    <h2>Exam Tilte </h2>
                    <input type="text" name="title" class="form-control"
                           value="{{$exams->title}}">
                    <h2>Exam Description</h2>
                    <textarea type="text" name="Description" class="form-control"
                              value="{{$exams->Description}}">{{$exams->Description}} </textarea>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <input type="hidden" {{$c=1}}>
                        @foreach ($exams->questions()->orderBy('order')->get() as $Q)
                            <tr>


                                <h3><input type="hidden" name="id_Exam" value="{{ $exams->id_Exam }}"></h3>
                                <!-- text input -->
                                <div class="form-group">
                                    <label><h2>Question {{$c}} <samp style="font-style: italic;">expression</samp></h2>
                                    </label>
                                    <input type="text" name="expression{{$Q->id_Question}}" class="form-control"
                                           value="{{$Q->expression}}">

                                </div>
                                <h2><input type="hidden" name="id_Question{{$Q->id_Question}}"
                                           value="{{ $Q->id_Question }}"></h2>
                            @if($Q->questiontable_type=="TFQuestion")
                                <!-- radio -->
                                    <div class="form-group">
                                        <label><h2>Correct Answer</h2></label>
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

                                            <h2>Answer Options</h2>

                                            <div class="table-responsive">

                                                <table class="table table-bordered" id="dynamic_field00">
                                                    <button type="button" name="add00" id="add00"
                                                            class="btn btn-success">Add More
                                                    </button>
                                                    <input type="hidden" value="{{$d0=1}}">
                                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                                        <tr>


                                                            <td style="float: left"><input style="width: 500px"
                                                                                           type="text"
                                                                                           name="choice{{$Q->id_Question}}[]"
                                                                                           class="form-control name_list"
                                                                                           value="{{$mc->choice}}"/>
                                                            </td>

                                                            <td style="float: left">

                                                                <button type="button" name="remove" id="0"
                                                                        class="btn btn-danger btn_remove">X
                                                                </button>

                                                            </td>

                                                        </tr>
                                                        {{$d0++}}
                                                    @endforeach
                                                </table>
                                            </div>

                                            <h2 style="float:left ;margin-right: 25px; padding: 0px;margin-top: 40px;">
                                                Right Answer</h2>


                                            <!-- select -->
                                            <div class="form-group">
                                                <h3><input type="hidden" value="{{$d=1}}"></h3>
                                                <select style="width: 150px; float:left ;margin-top: 20px"
                                                        class="form-control" name="correct_answer{{$Q->id_Question}}"
                                                        id="dynamic_field22">
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
                                                <hr style="clear:both;"/>

                                            </div>
                                        @endif
                                        @if($Q->questiontable_type=="SAQuestion")

                                            <h2>Answer Options</h2>

                                            <div class="table-responsive">

                                                <table class="table table-bordered" id="dynamic_field11">
                                                    <button type="button" name="add2" id="add2"
                                                            class="btn btn-success">Add More
                                                    </button>

                                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                                        <tr>


                                                            <td style="float: left"><input style="width: 500px"
                                                                                           type="text"
                                                                                           name="choice{{$Q->id_Question}}[]"
                                                                                           class="form-control name_list"
                                                                                           value="{{$mc->choice}}"/>
                                                            </td>

                                                            <td style="float: left">

                                                                <button type="button" name="remove" id="0"
                                                                        class="btn btn-danger btn_remove">X
                                                                </button>

                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        @endif
                                        @if($Q->questiontable_type=="MRQuestion")
                                            <h2>Answer Options</h2>

                                            <div class="table-responsive">

                                                <table class="table table-bordered" id="dynamic_field33">
                                                    <button type="button" name="add" id="add"
                                                            class="btn btn-success">Add More
                                                    </button>
                                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                                        <tr>

                                                            <td style="float: left">
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
                                                                                class="form-control"
                                                                                style="width: 500px"></div>
                                                                    <!-- /input-group -->
                                                                </div>
                                                            </td>


                                                            <td style="float: left">
                                                                <button type="button" name="remove" id="0"
                                                                        class="btn btn-danger btn_remove">X
                                                                </button>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        @endif

                                        <div class="box box-default" style="border-top-color: #ecf0f5;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h2>Order</h2>
                                                    <input type="number" name="order{{$Q->id_Question}}"
                                                           class="form-control"
                                                           value="{{$Q->pivot->order}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h2>Score</h2>
                                                    <input type="number" name="score{{$Q->id_Question}}"
                                                           class="form-control"
                                                           value="{{$Q->pivot->score}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h2> Estimated Time:</h2>
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
                                            <!-- /.input group -->
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <input type="hidden" {{$c++}}>
                                        @endforeach
                                    </div>
                                    <div class="box-footer">

                                        <button type="submit" name="submitbtn" value="add"
                                                class="btn btn-success pull-right">
                                            Submit Exam
                                        </button>

                                        <a href="/eexams/public/teacher/questions/tfquestions/create?id={{$exams->id_Exam}}&key=2"
                                           class="btn btn-info">

                                            Create Question

                                        </a>
                                    </div>


                            </tr>


                    </table>

                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    @foreach ($exams->questions()->orderBy('order')->get() as $Q)
    <script type="text/javascript">

        $(document).ready(function () {

            var postURL = "<?php echo url('addmore'); ?>";

            var i = "{{$d0}}";
            var b = 0;
            var co = 1;

            $('#add00').click(function () {

                i++;
                co++;

                $('#dynamic_field00').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="choice[]{{$Q->id_Question}}" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                $('#dynamic_field22').append('<option id="op' + co + '" value="' + co + '">' + co + '</option>');


            });
            $('#add2').click(function () {

                i++;
                co++;

                $('#dynamic_field1').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="choice[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                $('#dynamic_field').append('<option id="op' + co + '" value="' + co + '">' + co + '</option>');


            });

            $('#add').click(function () {

                b++;


                $('#dynamic_field3').append('<tr id="row' + b + '" class="dynamic-added"><td style="float: left"><div  ><div class="input-group"><span class="input-group-addon"><input type="checkbox" name="is_correct[]" value="1"><input type="hidden" name="is_correct[]" value="0"></span><input type="text" name="choice[]" class="form-control" style="width: 500px"></div><!-- /input-group --></div></td><td style="float: left"><button type="button" name="remove" id="' + b + '" class="btn btn-danger btn_remove">X</button></td></tr>');

            });

            $(document).on('click', '.btn_remove', function () {

                var button_id = $(this).attr("id");
                var op_id = $(this).attr("op")

                $('#row' + button_id + '').remove();
                $('#op' + co + '').remove();

                co--;
            });


            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });


            $('#submit').click(function () {

                $.ajax({

                    url: postURL,

                    method: "POST",

                    data: $('#add_name').serialize(),

                    type: 'json',

                    success: function (data) {

                        if (data.error) {

                            printErrorMsg(data.error);

                        } else {

                            i = 1;
                            !
                                $('.dynamic-added').remove();

                            $('#add_name')[0].reset();

                            $(".print-success-msg").find("ul").html('');

                            $(".print-success-msg").css('display', 'block');

                            $(".print-error-msg").css('display', 'none');

                            $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');

                        }

                    }

                });

            });


            function printErrorMsg(msg) {

                $(".print-error-msg").find("ul").html('');

                $(".print-error-msg").css('display', 'block');

                $(".print-success-msg").css('display', 'none');

                $.each(msg, function (key, value) {

                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');

                });

            }

        });

    </script>
    @endforeach
@endsection