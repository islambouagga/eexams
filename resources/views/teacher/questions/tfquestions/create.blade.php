@extends('layouts.teacher')

@section('content')

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->


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
