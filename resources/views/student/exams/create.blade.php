@extends('layouts.student')

@section('content')

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->

        <h1>{{$exam->title}}
            <small> {{$exam->questions()->count()}} Q</small>
        </h1>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">

                {{--                    {{$Q->questiontable->correct_answer}}--}}
                <tr>
                    <form role="form" method="post" action="{{route('student.exams.store')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @foreach ($exam->questions()->orderBy('order')->get() as $Q)
                            <h3><input type="hidden" name="id_Question{{$Q->id_Question}}" value="{{$Q->id_Question}}">
                            </h3>

                            <!-- text input -->
                            <div class="form-group">
                                <label><h3>{{$Q->expression}}</h3></label>

                            </div>

                            <!-- radio -->

                            <div class="radio">
                                <label>
                                    <input type="radio" name="answer{{$Q->id_Question}}" id="optionsRadios2" value="1">
                                    True
                                </label>
                                <label>
                                    <input type="radio" name="answer{{$Q->id_Question}}" id="optionsRadios2" value="0">
                                    False
                                </label>
                            </div>




                        @endforeach
                        <h3><input type="hidden" name="id_Exam" value="{{$exam->id_Exam }}"> </h3>

                        <div class="box-footer">

                            <button type="submit" class="btn btn-info pull-right">

                                Submit

                            </button>

                        </div>

                    </form>
                </tr>


            </table>

        </div>
    </section>
    <!-- /.content -->

@endsection
