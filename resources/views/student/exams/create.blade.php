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
                <tr>
                    <form role="form" method="post" action="{{route('student.exams.store')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @foreach($order as $o)

                        @foreach($exam->questions()->where('order',$o)->get() as $Q)




                            <h3><input type="hidden" name="id_Question{{$Q->id_Question}}" value="{{$Q->id_Question}}">
                            </h3>
                            <!-- text input -->
                            <div class="form-group">
                                <label><h3>{{$Q->expression}}</h3></label>
                            </div>
                            @if($Q->questiontable_type=="TFQuestion")
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
                            @endif
                            @if($Q->questiontable_type=="MCQuestion")
                                <h3>Answer Options</h3>


                                            @foreach ($Q->questiontable->choices()->get() as $mc)
                                                <label> {{$mc->choice}}</label> </br>
                                            @endforeach
                                <h3><input type="hidden" value="{{$d=1}}"></h3>

                                <select class="form-control" name="answer{{$Q->id_Question}}"  >
                                    @while(count($Q->questiontable->choices()->get())>=$d)

                                            <option value="{{$d}}">{{$d}}</option>

                                        {{$d++}}

                                    @endwhile
                                </select>

                            @endif
                        @if($Q->questiontable_type=="SAQuestion")
                                <div class="form-group " >
                                    <h3 class="col-md-3">write the answer</h3>
                                    <input type="text" name="answer{{$Q->id_Question}}" id="tit" class="form-control ">

                                </div>
                            @endif
                            @if($Q->questiontable_type=="MRQuestion")
                                <div class="col-lg-12">
                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                        <div class="input-group">

                        <span class="input-group-addon">
                          <input type="checkbox" name="answer{{$Q->id_Question}}[]" value="{{$mc->id_m_r_choices}}">
                        </span>
                                            <label> {{$mc->choice}}</label>
                                        </div>
                                @endforeach
                                <!-- /input-group -->
                                </div>
                            @endif
                        @endforeach
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
