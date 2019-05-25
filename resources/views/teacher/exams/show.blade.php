@extends('layouts.teacher')

@section('content')

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
                                        <option  >{{$Q->questiontable->correct_answer}}</option>
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
                                {{--                        @if($Q->questiontable_type=="MCQuestion")--}}
                                {{--                            <h3>Answer Options</h3>--}}
                                {{--                           --}}
                                {{--                            @foreach ($mcq->choices()->get() as $mc)--}}

                                {{--                            <label> {{$mc->choice}}</label>--}}

                                {{--                            @endforeach--}}
                                {{--                         --}}
                                {{--                        @endif--}}

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

@endsection