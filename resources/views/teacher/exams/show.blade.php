@extends('layouts.teacher')

@section('content')

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->




                <h1>{{$exams->title}}  <small> {{$exams->questions()->count()}} Q</small></h1>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
        @foreach ($exams->questions()->orderBy('order')->get() as $Q)
                    {{$Q->questiontable->correct_answer}}
            <tr>
                <form role="form" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!-- text input -->
                    <div class="form-group">
                        <label>{{$Q->expression}}</label>

                    </div>

                    <!-- radio -->
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="correct_answer" id="optionsRadios2" value="1" @if($Q->questiontable->correct_answer==1)

                                checked
                                @endif
                                disabled
                                >
                                True
                            </label>
                            <label>
                                <input type="radio" name="correct_answer" id="optionsRadios2" value="0" @if($Q->questiontable->correct_answer==0)

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

        @endforeach
            <div class="box-footer">

                <button type="submit" class="btn btn-info pull-right" >
                    <a href="/eexams/public/teacher/exams/{{$exams->id_Exam}}/edit">
                    Edit
                    </a>
                </button>
                <form role="form" method="post" action="/eexams/public/teacher/exams/{{$exams->id_Exam}}">

                    @method('DELETE')
                    @csrf
                <button type="submit"  class="btn btn-default btn-danger">Delete</button>
                </form>
            </div>
            </table>

        </div>
    </section>
    <!-- /.content -->

@endsection