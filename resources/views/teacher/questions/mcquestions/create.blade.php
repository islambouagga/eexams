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
                            Launch Info Modal
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                            Launch Danger Modal
                        </button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                            Launch Warning Modal
                        </button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                            Launch Success Modal
                        </button>
                    </div>
                </div>
            </div>
        </div>





        <!-- /.box-header -->

        <div class="box-body">
            <form role="form" method="post" action="{{route('teacher.mcquestions.store')}} ">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- text input -->
                <div class="form-group">
                    <label><h2>Question</h2></label>
                    <input type="text" name="expression"  class="form-control" placeholder="Enter ..."  >
                </div>

                <!-- /.box -->
                <h3>Answer Options</h3>
                <div class="form-group">
                    <label>(A)</label>
                    <input type="text" name="choice1"  class="form-control" placeholder="Enter ..."  >
                </div>
                <div class="form-group">
                    <label>(B)</label>
                    <input type="text" name="choice2"  class="form-control" placeholder="Enter ..."  >
                </div>
                <div class="form-group">
                    <label>(C)</label>
                    <input type="text" name="choice3"  class="form-control" placeholder="Enter ..."  >
                </div>
                <div class="form-group">
                    <label>(D)</label>
                    <input type="text" name="choice4"  class="form-control" placeholder="Enter ..."  >
                </div>
                <h3>Right Answer</h3>

                <h3><input type="hidden" name="id_Exam" value="{{ $id_Exam }}"></h3>
                <h3><input type="hidden" name="test" value="{{ $test }}"></h3>
                <!-- radio -->
{{--                <div class="form-group">--}}
{{--                    <div class="radio ">--}}
{{--                        <label>--}}
{{--                            <input type="radio" name="correct_answer" id="optionsRadios2" value="1">--}}
{{--                            (A)--}}
{{--                        </label>--}}
{{--                        <label>--}}
{{--                            <input type="radio" name="correct_answer" id="optionsRadios2" value="2">--}}
{{--                            (B)--}}
{{--                        </label>--}}
{{--                        <label>--}}
{{--                            <input type="radio" name="correct_answer" id="optionsRadios2" value="3">--}}
{{--                            (C)--}}
{{--                        </label>--}}
{{--                        <label>--}}
{{--                            <input type="radio" name="correct_answer" id="optionsRadios2" value="4">--}}
{{--                            (D)--}}
{{--                        </label>--}}
{{--                    </div>--}}
            <!-- select -->
                <div class="form-group">

                    <select class="form-control" name="correct_answer">
                        <option  value="1">(A)</option>
                        <option  value="2">(B)</option>
                        <option  value="3">(C)</option>
                        <option  value="4">(D)</option>
                    </select>
                </div>
                    <div class="form-group">
                        <label><h2>Order</h2></label>
                        <input type="number" name="order" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><h2>Score</h2></label>
                        <input type="number" name="score" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><h2> Estimated Time:</h2></label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="text" name="estimated_time" class="form-control" placeholder="00H:00M"
                                   data-inputmask="'mask': ['99H:99M]', '00H:00M']" data-mask>
                        </div>


                    </div>

                    <!-- /.input group -->

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
