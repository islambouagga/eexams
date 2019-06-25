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
                                <h2>Question {{$c}} :<samp style="font-style: italic;">{{$Q->expression}}</samp></h2>
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
                                        <h3>choose right answer </h3>
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
                                    <h4 style="margin-right: 10px;font-size: larger;" class="col-md-3">write the answer</h4>
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
                                            <label> {{$mc->choice}}</label>
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
