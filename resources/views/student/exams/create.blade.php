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

                    <!-- Optionally, you can add icons to the links -->
                    <li><a href="{{url('/student')}}"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>

                    <li class="active"><a href="{{route('student.exams.index')}}"><i class="fa fa-files-o"></i> <span>Exams List</span></a>
                    </li>


                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i><span>
                    {{ __('Logout') }}
               </span> </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
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
        <div class="box box-default collapsed-box ">
            <div class="box-header with-border">
                <h3 class="box-title">{{$exam->title}}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{$exam->Description}}
            </div>
            <!-- /.box-body -->
        </div>
        <h1 style="margin-left: 43%;">01:27:00</h1>


        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <input type="hidden"  {{$c=1}}>
                <tr>
                    <form role="form" method="post" action="{{route('student.exams.store')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @foreach($order as $o)

                        @foreach($exam->questions()->where('order',$o)->get() as $Q)




                            <h3><input type="hidden" name="id_Question{{$Q->id_Question}}" value="{{$Q->id_Question}}">
                            </h3>
                            <!-- text input -->
                            <div class="form-group">
                                <h2>Question {{$c}} : </h2>
                                <h3><samp style="font-style: italic;">{{$Q->expression}}</samp></h3>
                            </div>
                            @if($Q->questiontable_type=="TFQuestion")
                            <!-- radio -->
                                <div class="callout callout-danger">
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
                                </div>
                            @endif
                            @if($Q->questiontable_type=="MCQuestion")
                                    <div class="callout callout-success">
                                <h3>Answer Options</h3>
                                    <input type="hidden" value="{{$z=0}}">
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

                                <h3><input type="hidden" value="{{$d=1}}"></h3>
                                        <h3>Choose the right answer </h3>
                                <select style="width: 20%;" class="form-control" name="answer{{$Q->id_Question}}"  >
                                    @while(count($Q->questiontable->choices()->get())>=$d)

                                            <option value="{{$d}}">{{$d}}</option>

                                        {{$d++}}

                                    @endwhile
                                </select>
                                    </div>
                            @endif
                        @if($Q->questiontable_type=="SAQuestion")
                                <div class="form-group " >
                                   <i class="fa-chevron-right" ><h3 style="margin-right: 10px;" class="col-md-3">Write your answer</h3></i>
                                    <input type="text" name="answer{{$Q->id_Question}}" id="tit" class="form-control ">

                                </div>
                            @endif
                            @if($Q->questiontable_type=="MRQuestion")
                                    <div class="callout callout-warning " style="background-color: aqua;margin-right: -30px;margin-left: -23px;">
                                <div class="col-lg-12 callout callout-warning">
                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                        <div class="input-group" style="background-color: #f39c12;">
                        <span class="input-group-addon"  style="border-color: #f39c12;background-color: #f39c12;">
                          <input type="checkbox" name="answer{{$Q->id_Question}}[]" value="{{$mc->id_m_r_choices}}">
                        </span>
                                            <h4 style="font-size: larger;"> {{$mc->choice}}</h4>
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

{{--    <script>--}}
{{--        // Set the date we're counting down to--}}
{{--        var dd = new Date({{""+$d}}).getTime();--}}

{{--        var countDownDate = dd.add(1.5, 'hour');--}}


{{--        // Update the count down every 1 second--}}
{{--        var x = setInterval(function() {--}}

{{--            // Get today's date and time--}}
{{--            var now = new Date().getTime();--}}

{{--            // Find the distance between now and the count down date--}}
{{--            var distance = countDownDate - now;--}}

{{--            // Time calculations for days, hours, minutes and seconds--}}
{{--            var days = Math.floor(distance / (1000 * 60 * 60 * 24));--}}
{{--            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));--}}
{{--            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));--}}
{{--            var seconds = Math.floor((distance % (1000 * 60)) / 1000);--}}

{{--            // Display the result in the element with id="demo"--}}
{{--            document.getElementById("demo").innerHTML = days + "d " + hours + "h "--}}
{{--                + minutes + "m " + seconds + "s ";--}}

{{--            // If the count down is finished, write some text--}}
{{--            if (distance < 0) {--}}
{{--                clearInterval(x);--}}
{{--                document.getElementById("demo").innerHTML = "EXPIRED";--}}
{{--            }--}}
{{--        }, 1000);--}}
{{--    </script>--}}
@endsection
