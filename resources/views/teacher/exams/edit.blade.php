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
@endsection