@extends('layouts.teacher')

@section('content')

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modal Examples</h3>
                    </div>
                    <div class="box-body">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                            <a href="{{url('/teacher/questions/tfquestions/create?id='.$id_Exam.'&key=0')}}">   Treu & false
                            </a></button>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                            <a href="{{url('/teacher/questions/mcquestions/create?id='.$id_Exam.'&key=0')}}"> Multiple Choices
                            </a></button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                            <a href="{{url('/teacher/questions/mrquestions/create?id='.$id_Exam.'&key=0')}}"> multiple Responses
                            </a></button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                            Launch Warning Modal
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <!-- /.box-header -->

        <div class="box-body">
            <form role="form" method="post" action="{{route('teacher.tfquestions.store')}} ">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- text input -->
                <div class="form-group">
                    <label>Question</label>
                    <input type="text" name="expression"  class="form-control" placeholder="Enter ..."  >
                </div>
                <h3> Correct Answer</h3>

                <h3><input type="hidden" name="id_Exam" value="{{ $id_Exam }}"></h3>
                <h3><input type="hidden" name="test" value="{{ $test }}"></h3>
                <!-- radio -->
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="correct_answer" id="optionsRadios2" value="1">
                            True
                        </label>
                        <label>
                            <input type="radio" name="correct_answer" id="optionsRadios2" value="0">
                            False
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Order</label>
                        <input type="number" name="order" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Score</label>
                        <input type="number" name="score" class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Estimated Time:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="text" name="estimated_time" class="form-control" placeholder="00H:00M"
                                   data-inputmask="'mask': ['99H:99M]', '00H:00M']" data-mask>
                        </div>

{{--                        <div class="input-group">--}}
{{--                            <div class="input-group-addon">--}}
{{--                                <i class="fa fa-clock-o"></i>--}}
{{--                            </div>--}}
{{--                            <input type="time" min="00:00:00" max="01:30:00" name="estimated_time"--}}
{{--                                   class="form-control pull-right">--}}

{{--                        </div>--}}
                        <!-- /.input group -->
                    </div>

                        <!-- /.input group -->
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        @if($test == 2 )
                            <button type="submit" style="display: none" name="submitbtn" value="submit"
                                    class="btn btn-info pull-center">Create Questions
                            </button>
                            <button type="submit" style="display: none" name="submitbtn" value="add"
                                    class="btn btn-info pull-right">Add Another Question
                            </button>
                        @else
                            <button type="submit" name="submitbtn" value="submit" class="btn btn-info pull-center">
                                Create Questions
                            </button>
                            <button type="submit" name="submitbtn" value="add" class="btn btn-info pull-right">Add
                                Another Question
                            </button>
                        @endif
                        @if($test == 2 )
                        <button type="submit" name="submitbtn" value="mit2" class="btn btn-info pull-right">Create2
                            Questions
                        </button>
                        @endif

                    </div>



            </form>
        </div>
        <!-- /.box-body -->
    </section>



@endsection
