<script>
    $(document).ready(function () {
        $(window).on("blur focus", function(e) {



            switch (e.type) {
                case "blur":
                    alert( "Handler for .blur() called." );
                    break;
                case "focus":
                    alert( "Handler for .blddur() called." );
                    break;
            }



        })
    });
</script>
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
                    <li >


                    </li>
                    <p class="float">
                        <i class="btn btn-block btn-warning btn-lg my-float" style="background-color: rgb(34, 45, 50); border-color: rgb(34, 45, 50); font-size: 196%;" id="demo">
                        </i>
                    </p>
{{--                    <li>--}}
{{--                        dkdsksdkj--}}
{{--                    </li>--}}
{{--                    <li  > <span class="float" style="color: aliceblue;font-size: x-large;margin-left: 22px;" id="demo"></span></a>--}}
{{--                    </li>--}}
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

{{--        <input id="dd" value="{{$tl}}">--}}
        <p id="test"></p>


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
                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                        <input type="hidden" value="{{$z++}}">
                                        @endforeach

                                            <input type="hidden" value="{{$i=1}}">

                                            <input type="hidden" value="{{$st=''}}">




                                @for($i;$i<=$z;$i++)
                                            <input type="hidden" value="{{$aqw=1}}">
                                        <input type="hidden" value=" {{$ra=rand(1, $z)}}">
                                    @while(true)
                                        @if(strpos($st,'c'.$ra.'-')!==false)
                                            <input type="hidden" value="  {{$ra=rand(1, $z)}}">
                                        @else

                                        @break
                                            @endif
                                    @endwhile

                                        <input type="hidden" value=" {{$st=$st.'c'.$ra.'-'}}">


                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                                @if($aqw==$ra)
                                         <h4 style="margin-right: 10px;font-size: larger;"> {{$mc->choice}}</h4>

                                                    @break
                                                 @endif
                                                    <input type="hidden" value="{{$aqw++}}">
                                    @endforeach

                                @endfor

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
                                   <h3 style="margin-right: 10px;" class="col-md-3">Write your answer</h3>
                                    <input type="text" name="answer{{$Q->id_Question}}" id="tit" class="form-control ">

                                </div>

                            @endif
                            @if($Q->questiontable_type=="MRQuestion")
                                    <div class="callout callout-warning " style="background-color: aqua;margin-right: -30px;margin-left: -23px;">
                                <div class="col-lg-12 callout callout-warning">
                                    <input type="hidden" value="{{$y=0}}">
                                    @foreach ($Q->questiontable->choices()->get() as $mc)
                                        <input type="hidden" value="{{$y++}}">
                                    @endforeach
                                    <input type="hidden" value="{{$i1=1}}">

                                    <input type="hidden" value="{{$st1=''}}">
                                    @for($i1;$i1<=$y;$i1++)
                                        <input type="hidden" value="{{$aqw1=1}}">
                                        <input type="hidden" value=" {{$ra1=rand(1, $y)}}">
                                        @while(true)
                                            @if(strpos($st1,'c'.$ra1.'-')!==false)
                                                <input type="hidden" value="  {{$ra1=rand(1, $y)}}">
                                            @else

                                                @break
                                            @endif
                                        @endwhile

                                        <input type="hidden" value=" {{$st1=$st1.'c'.$ra1.'-'}}">


                                        @foreach ($Q->questiontable->choices()->get() as $mc)
                                            @if($aqw1==$ra1)
                                                <div class="input-group" style="background-color: #f39c12;">
                        <span class="input-group-addon"  style="border-color: #f39c12;background-color: #f39c12;">
                          <input type="checkbox" name="answer{{$Q->id_Question}}[]" value="{{$mc->id_m_r_choices}}">
                        </span>
                                                    <h4 style="font-size: larger;"> {{$mc->choice}}</h4>
                                                </div>

                                                @break
                                            @endif
                                            <input type="hidden" value="{{$aqw1++}}">
                                        @endforeach

                                    @endfor


                                <!-- /input-group -->
                                </div>
                            @endif
                                    </div>
                        @endforeach
                            <input type="hidden" {{$c++}}>
                        @endforeach
                        <h3><input type="hidden" name="id_Exam" value="{{$exam->id_Exam }}"> </h3>
                        <div class="box-footer">
                            <button id="btns" type="submit" class="btn btn-info pull-right" disabled>
                                Submit
                            </button>
                        </div>
                    </form>
                </tr>
            </table>
        </div>

        <!-- Code begins here -->



    </section>
    <!-- /.content -->
    </div>

    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("{{$tl}}").getTime();
        var countDownDat = countDownDate
        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDat - now;

            // Time calculations for days, hours, minutes and seconds

            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);


            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = hours + "h "
                + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 1775929) {

                document.getElementById("demo").style.color = "red";
            }    if (distance < 3421273) {

                document.getElementById("btns").disabled = false;
            }
            if (distance < 0){
                clearInterval(x)
                document.getElementById("demo").innerHTML = "EXPIRED";
                document.getElementById('btns').click();
            }


        }, 1000);
    </script>
{{--<script>--}}


{{--    // Set the name of the hidden property and the change event for visibility--}}
{{--    var hidden, visibilityChange;--}}
{{--    if (typeof document.hidden !== "undefined") { // Opera 12.10 and Firefox 18 and later support--}}
{{--        hidden = "hidden";--}}
{{--        visibilityChange = "visibilitychange";--}}
{{--    } else if (typeof document.msHidden !== "undefined") {--}}
{{--        hidden = "msHidden";--}}
{{--        visibilityChange = "msvisibilitychange";--}}
{{--    } else if (typeof document.webkitHidden !== "undefined") {--}}
{{--        hidden = "webkitHidden";--}}
{{--        visibilityChange = "webkitvisibilitychange";--}}
{{--    }--}}

{{--    var bb = document.getElementById("btns");--}}

{{--    // If the page is hidden, pause the video;--}}
{{--    // if the page is shown, play the video--}}
{{--    function handleVisibilityChange() {--}}
{{--        if (document[hidden]) {--}}
{{--            bb.pause();--}}
{{--        }--}}
{{--    }--}}

{{--    // Warn if the browser doesn't support addEventListener or the Page Visibility API--}}
{{--    if (typeof document.addEventListener === "undefined" || hidden === undefined) {--}}
{{--        console.log("This demo requires a browser, such as Google Chrome or Firefox, that supports the Page Visibility API.");--}}
{{--    } else {--}}
{{--        // Handle page visibility change--}}
{{--        document.addEventListener(visibilityChange, handleVisibilityChange, false);--}}





{{--    }--}}
{{--</script>--}}
{{--    <script>--}}
{{--        if (document.hidden) {--}}
{{--            // do what you need--}}
{{--            window.blur();--}}
{{--            alert( "Handler for .focus() called." );--}}
{{--        }--}}
{{--    </script>--}}
{{--<script>--}}
{{--    var focusFlag = 1;--}}

{{--    jQuery(document).ready(function(){--}}
{{--        jQuery(window).bind("focus",function(event){--}}
{{--            focusFlag = 1;--}}
{{--        }).bind("blur", function(event){--}}
{{--            focusFlag = 0;--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

@endsection
