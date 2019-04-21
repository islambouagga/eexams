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
{{--                    {{$Q->id_Question}}--}}
                    <tr>
                        <form role="form" method="post" action="/eexams/public/teacher/exams/{{$exams->id_Exam}}">
                        {{method_field('PATCH')}}
                        {{csrf_field()}}
                            <h3><input type="hidden" name="id_Exam" value="{{ $exams->id_Exam }}"> </h3>
                        <!-- text input -->
                            <div class="form-group">
                                <label><h3>{{$Q->expression}}</h3></label>
                                <input type="text" name="expression{{$Q->id_Question}}" class="form-control"
                                       value="{{$Q->expression}}">

                            </div>
                            <h3><input type="hidden" name="id_Question{{$Q->id_Question}}" value="{{ $Q->id_Question }}"> </h3>
                            <!-- radio -->
                            <div class="form-group">
                                <label><h3>correct_answer</h3></label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="correct_answer{{$Q->id_Question}}" id="optionsRadios2" value="1"
                                               @if($Q->questiontable->correct_answer==1)

                                               checked
                                                @endif
                                        >
                                        True
                                    </label>
                                    <label>
                                        <input type="radio" name="correct_answer{{$Q->id_Question}}" id="optionsRadios2" value="0"
                                               @if($Q->questiontable->correct_answer==0)

                                               checked
                                                @endif
                                        >
                                        False
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label>Score : {{$Q->pivot->score}}</label>
                                    <input type="number" name="score{{$Q->id_Question}}" class="form-control" value="{{$Q->pivot->score}}">

                                </div>
                                <div class="form-group">
                                    <label>Order : {{$Q->pivot->order}}</label>
                                    <input type="number" name="order{{$Q->id_Question}}" class="form-control" value="{{$Q->pivot->order}}">

                                </div>
                                <div class="form-group">
                                    <label>estimated time : {{$Q->estimated_time}}</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">32
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="time" min="00:00:00" max="01:30:00" name="estimated_time{{$Q->id_Question}}"
                                               class="form-control pull-right" value="{{$Q->estimated_time}}">

                                    </div>

                                </div>
                                @endforeach
                            </div>
                            <div class="box-footer">

                                <button type="submit" name="submitbtn" value="add" class="btn btn-info pull-right">
                                    make edit
                                </button>
                                <button class="btn btn-info " >

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
@endsection