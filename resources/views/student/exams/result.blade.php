@extends('layouts.student')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">




                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">HEADER</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li><a href="{{url('/student')}}"><i class="fa fa-link"></i> <span>Home</span></a></li>

                    <li><a href="{{route('student.exams.index')}}"><i class="fa fa-link"></i> <span>Exams List</span></a>
                    </li>

                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Link in level 2</a></li>
                            <li><a href="#">Link in level 2</a></li>
                        </ul>
                    </li>

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-circle-o text-red"></i><span>
                    {{ __('Logout') }}
               </span> </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->


        <div class="col-xs-6 col-md-3 text-centeri">
            <input type="text" class="knob" value="{{($mark*100)/20}}" data-skin="tron" data-thickness="0.2" data-width="240" data-height="240" data-fgColor="#3c8dbc" data-readonly="true">

            <div class="knob-label">
                <p> <strong>your score is {{$mark}} / 20
                    </strong>
                </p>
            </div>
        </div>

        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <input type="hidden"  {{$c=1}}>
                <input type="hidden"  {{$cc=1}}>
                <tr>
                    <form role="form" >

                        @foreach($order as $o)

                            @foreach($exam->questions()->where('order',$o)->get() as $Q)




                                <h3><input type="hidden" name="id_Question{{$Q->id_Question}}" value="{{$Q->id_Question}}">
                                </h3>
                                <!-- text input -->
                                <div class="form-group">
                                    <h2>Question {{$c}} :<samp style="font-style: italic;">{{$Q->expression}}</samp></h2>
                                </div>
                                @if($Q->questiontable_type=="TFQuestion")
                                <!-- radio -->
                                @foreach($Q->students->where('id_student',$id_student) as $s)

                                    <div @if($Q->questiontable->correct_answer!=$s->pivot->answer)class="callout callout-danger"
                                    @else class="callout callout-success" @endif>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answer{{$Q->id_Question}}" id="optionsRadios2"@if($s->pivot->answer=="1")
                                                        checked
                                                        @endif disabled>
                                                True
                                            </label>
                                            <label>
                                                <input type="radio" name="answer{{$Q->id_Question}}" id="optionsRadios2" @if($s->pivot->answer=="0")
                                                checked
                                                       @endif disabled>
                                                False
                                            </label>
                                        </div>
                                    </div>

                                    @endforeach
                                @endif
                                @if($Q->questiontable_type=="MCQuestion")

                                    @foreach($Q->students->where('id_student',$id_student) as $s)
                                        <div @if($Q->questiontable->correct_answer!=$s->pivot->answer)class="callout callout-danger"
                                             @else class="callout callout-success" @endif>

                                        <h3>Answer Options</h3>
{{--                                        <input type="hidden" value="{{$z=0}}">--}}
  {{--                                    @foreach ($Q->questiontable->choices()->get() as $mc)--}}
   {{--                                        <input type="hidden" value="{{$z++}}">--}}
     {{--                                        @endforeach--}}
                                        {{--                                {{',omber z:'.$z}}--}}
                                        {{--                                            <input type="hidden" value="{{$i=1}}">--}}
                                        {{--                                            <input type="hidden" value="{{$aqw=1}}">--}}
                                        {{--                                            <input type="hidden" value="{{$st=''}}">--}}

                                        {{--                                    {{$numbers = range(1, $z)}}--}}
                                        {{--                                    {{shuffle($numbers)}}--}}
                                        {{--                                    {{$order=[]}}--}}
                                        {{--                                    @foreach ($numbers as $number) {--}}
                                        {{--                                    {{$order[]=$number}};--}}
                                        {{--                                    @endforeach--}}
                                        {{--                                {{dd($order)}}--}}

                                        {{--                                @for($i;$i<=$z;$i++)--}}
                                        {{--                                        <input type="hidden" value=" {{$ra=rand(1, $z)}}">--}}
                                        {{--                                    @while(true)--}}
                                        {{--                                    @if(strpos($st,'c'.$ra.'-')>=0 and strpos($st,'c'.$ra.'-')<$z )--}}
                                        {{--                                            <input type="hidden" value="  {{$ra=rand(1, $z)}}">--}}
                                        {{--                                        @else--}}
                                        {{--                                        {{'o'.$ra.' in '.$st.' ='.strpos($st,'c'.$ra.'-')}}--}}
                                        {{--                                        @break--}}
                                        {{--                                            @endif--}}
                                        {{--                                    @endwhile--}}

                                        {{--                                        <input type="hidden" value=" {{$st=$st.'c'.$ra.'-'}}">--}}
                                        {{--                                        {{'('.$ra.')---'.$st}}--}}

                                        @foreach ($Q->questiontable->choices()->get() as $mc)
                                            {{--                                                @if($aqw==$ra)--}}
                                            <h4 style="margin-right: 10px;font-size: larger;"> {{$mc->choice}}</h4>

                                            {{--                                                    @break--}}
                                            {{--                                                 @endif--}}
                                            {{--                                                    <input type="hidden" value="{{$aqw++}}">--}}
                                        @endforeach

                                        {{--                                @endfor--}}


                                            <div class="box box-default"
                                                 style="border-top-color: #00a65a;background-color: #00a65a;">
                                                <div class="col-md-6">
                                                    <h4>your answer :{{$s->pivot->answer}}</h4>
                                                </div>

                                                <div class="col-md-6">
                                                    <h4>Right options :{{$Q->questiontable->correct_answer}}</h4>
                                                </div>
                                            </div>
                                    </div>
                                    @endforeach
                                @endif
                                @if($Q->questiontable_type=="SAQuestion")
                                    <input type="hidden" value="{{$m}}">
                                    <input type="hidden" value="{{$az=0}}">
                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                        @foreach($Q->students->where('id_student',$id_student) as $s)
                                       <input type="hidden" value="{{$lentghco=strlen($mc->choice)}}">

                                       <input type="hidden" value="{{$cost= levenshtein($mc->choice, $s->pivot->answer, 1, 1, 1)}}">

                                        @if(($cost*100)/$lentghco<=$m)

                                            <input type="hidden" value="{{$az++}}">
                                            @break
                                        @endif
                                    @endforeach
                                    @endforeach

                                    <div @if($az==0)class="callout callout-danger"
                                         @else class="callout callout-success" @endif>

                                    <div class="form-group " >
                                        <h4>Right options :</h4>

                                        @foreach ($Q->questiontable->choices()->get() as $mc)
                                            <h3 style="margin-right: 10px;font-size: larger;"> {{$mc->choice}}</h3>
                                        @endforeach

                                        @foreach($Q->students->where('id_student',$id_student) as $s)

                                            <h4>your answer :{{$s->pivot->answer}}</h4>
                                        @endforeach

                                    </div>
                                    </div>

                                    <br>
                                    <br>
                                    <br>
                                @endif
                                @if($Q->questiontable_type=="MRQuestion")
                                    <div class="callout callout-success " style="background-color: aqua;margin-right: -30px;margin-left: -23px;">
                                        <div class="col-lg-12 callout callout-success">
                                            @foreach ($Q->questiontable->choices()->get() as $mc)
                                                <div class="input-group">
                                                    <span class="input-group-addon"
                                                          style="border-color: #00a65a;background-color: #00a65a;">
                                                      <input style="border-color: #f39c12;background-color: #f39c12;"
                                                             type="checkbox" @if($mc->is_correct==1)
                                                             checked
                                                             @endif
                                                             disabled>
                                                    </span>
                                                    <h4 style="margin-top: 7px;"> {{$mc->choice}}</h4>
                                                </div>
                                        @endforeach
                                        <!-- /input-group -->
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                    <input type="hidden" {{$c++}}>
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
    </div>
@endsection
