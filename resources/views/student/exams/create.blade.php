<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Starter</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
          href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
          href="{{asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.min.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <style>
        *{padding:0;margin:0;}

        body{
            font-family:Verdana, Geneva, sans-serif;
            font-size:18px;
            background-color:#CCC;
        }

        .float{
            position:fixed;

            height:99px;
            bottom:56px;
            right:84%;
            left: 0px;
            background-color: #222d32;
            color:#FFF;

            text-align:center;
            box-shadow: 2px 2px 3px #222d32;
        }

        .my-float{
            margin-top:22px;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script type="text/javascript" src="{{asset('lib/jquery-1.4.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('jquery-timeRangePicker.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#timePicker").timePicker({
                required: true,
                minutesStep: 10,
                include24: false
            });
            $("#timeRangePicker").timeRangePicker({
                required: false,
                minutesStep: 10,
                include24: true
            });
        });
    </script>
</head>


<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>E</b>IO</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Exam</b>-IO</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->

        </nav>
    </header>




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
                    <form role="form" method="post" action="/eexams/public/student/exams/{{$exam->id_Exam}}">
                        {{method_field('PATCH')}}
                        {{csrf_field()}}
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


</div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Version 1.0
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2019 <a href="#">ExamIO Inc</a>.</strong> All rights reserved.
        <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
        <a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
        <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->


    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    <!-- date-range-picker -->
    <script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- bootstrap color picker -->
    <script src="{{asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
    <!-- bootstrap time picker -->
    <script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- CK Editor -->
    <script src="{{asset('bower_components/ckeditor/ckeditor.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- jQuery Knob -->
    <script src="{{asset('bower_components/jquery-knob/js/jquery.knob.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. -->

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true, startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(2, 'hour'),
                locale: {
                    format: 'MM/DD/YYYY HH:mm '
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            })
        })
    </script>
    <script type="text/javascript">

        $(document).ready(function () {

            var postURL = "<?php echo url('addmore'); ?>";

            var i = 0;
            var b = 1;

            $('#add1').click(function () {

                i++;

                $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="choice[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                $('#dynamic_field2').append('<option id="op" value="' + i + '">' + i + '</option>');


            });
            $('#add').click(function () {

                b++;


                $('#dynamic_field3').append('<tr id="row' + b + '" class="dynamic-added"><td><div class="col-lg-12"><div class="input-group"><span class="input-group-addon"><input type="checkbox" name="is_correct[]" value="1"><input type="hidden" name="is_correct[]" value="0"></span><input type="text" name="choice[]" class="form-control"></div><!-- /input-group --></div></td><td><button type="button" name="remove" id="' + b + '" class="btn btn-danger btn_remove">X</button></td></tr>');

            });

            $(document).on('click', '.btn_remove', function () {

                var button_id = $(this).attr("id");
                var op_id=$(this).attr("op")

                $('#row' + button_id + '').remove();
                $('#op' ) .remove();

            });


            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });


            $('#submit').click(function () {

                $.ajax({

                    url: postURL,

                    method: "POST",

                    data: $('#add_name').serialize(),

                    type: 'json',

                    success: function (data) {

                        if (data.error) {

                            printErrorMsg(data.error);

                        } else {

                            i = 1;

                            $('.dynamic-added').remove();

                            $('#add_name')[0].reset();

                            $(".print-success-msg").find("ul").html('');

                            $(".print-success-msg").css('display', 'block');

                            $(".print-error-msg").css('display', 'none');

                            $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');

                        }

                    }

                });

            });


            function printErrorMsg(msg) {

                $(".print-error-msg").find("ul").html('');

                $(".print-error-msg").css('display', 'block');

                $(".print-success-msg").css('display', 'none');

                $.each(msg, function (key, value) {

                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');

                });

            }

        });

    </script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
    <script>
        $(function () {
            /* jQueryKnob */

            $(".knob").knob({
                /*change : function (value) {
                 //console.log("change : " + value);
                 },
                 release : function (value) {
                 console.log("release : " + value);
                 },
                 cancel : function () {
                 console.log("cancel : " + this.value);
                 },*/
                draw: function () {

                    // "tron" case
                    if (this.$.data('skin') == 'tron') {

                        var a = this.angle(this.cv)  // Angle
                            , sa = this.startAngle          // Previous start angle
                            , sat = this.startAngle         // Start angle
                            , ea                            // Previous end angle
                            , eat = sat + a                 // End angle
                            , r = true;

                        this.g.lineWidth = this.lineWidth;

                        this.o.cursor
                        && (sat = eat - 0.3)
                        && (eat = eat + 0.3);

                        if (this.o.displayPrevious) {
                            ea = this.startAngle + this.angle(this.value);
                            this.o.cursor
                            && (sa = ea - 0.3)
                            && (ea = ea + 0.3);
                            this.g.beginPath();
                            this.g.strokeStyle = this.previousColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                            this.g.stroke();
                        }

                        this.g.beginPath();
                        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                        this.g.stroke();

                        this.g.lineWidth = 2;
                        this.g.beginPath();
                        this.g.strokeStyle = this.o.fgColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                        this.g.stroke();

                        return false;
                    }
                }
            });
            /* END JQUERY KNOB */

            //INITIALIZE SPARKLINE CHARTS
            $(".sparkline").each(function () {
                var $this = $(this);
                $this.sparkline('html', $this.data());
            });

            /* SPARKLINE DOCUMENTATION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
            drawDocSparklines();
            drawMouseSpeedDemo();

        });
        function drawDocSparklines() {

            // Bar + line composite charts
            $('#compositebar').sparkline('html', {type: 'bar', barColor: '#aaf'});
            $('#compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
                {composite: true, fillColor: false, lineColor: 'red'});


            // Line charts taking their values from the tag
            $('.sparkline-1').sparkline();

            // Larger line charts for the docs
            $('.largeline').sparkline('html',
                {type: 'line', height: '2.5em', width: '4em'});

            // Customized line chart
            $('#linecustom').sparkline('html',
                {
                    height: '1.5em', width: '8em', lineColor: '#f00', fillColor: '#ffa',
                    minSpotColor: false, maxSpotColor: false, spotColor: '#77f', spotRadius: 3
                });



            // Tri-state charts using inline values
            $('.sparktristate').sparkline('html', {type: 'tristate'});
            $('.sparktristatecols').sparkline('html',
                {type: 'tristate', colorMap: {'-2': '#fa7', '2': '#44f'}});

            // Composite line charts, the second using values supplied via javascript
            $('#compositeline').sparkline('html', {fillColor: false, changeRangeMin: 0, chartRangeMax: 10});
            $('#compositeline').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
                {composite: true, fillColor: false, lineColor: 'red', changeRangeMin: 0, chartRangeMax: 10});

            // Line charts with normal range marker
            $('#normalline').sparkline('html',
                {fillColor: false, normalRangeMin: -1, normalRangeMax: 8});
            $('#normalExample').sparkline('html',
                {fillColor: false, normalRangeMin: 80, normalRangeMax: 95, normalRangeColor: '#4f4'});

            // Discrete charts
            $('.discrete1').sparkline('html',
                {type: 'discrete', lineColor: 'blue', xwidth: 18});
            $('#discrete2').sparkline('html',
                {type: 'discrete', lineColor: 'blue', thresholdColor: 'red', thresholdValue: 4});

            // Bullet charts
            $('.sparkbullet').sparkline('html', {type: 'bullet'});

            // Pie charts
            $('.sparkpie').sparkline('html', {type: 'pie', height: '1.0em'});

            // Box plots
            $('.sparkboxplot').sparkline('html', {type: 'box'});
            $('.sparkboxplotraw').sparkline([1, 3, 5, 8, 10, 15, 18],
                {type: 'box', raw: true, showOutliers: true, target: 6});

            // Box plot with specific field order
            $('.boxfieldorder').sparkline('html', {
                type: 'box',
                tooltipFormatFieldlist: ['med', 'lq', 'uq'],
                tooltipFormatFieldlistKey: 'field'
            });

            // click event demo sparkline
            $('.clickdemo').sparkline();
            $('.clickdemo').bind('sparklineClick', function (ev) {
                var sparkline = ev.sparklines[0],
                    region = sparkline.getCurrentRegionFields();
                value = region.y;
                alert("Clicked on x=" + region.x + " y=" + region.y);
            });

            // mouseover event demo sparkline
            $('.mouseoverdemo').sparkline();
            $('.mouseoverdemo').bind('sparklineRegionChange', function (ev) {
                var sparkline = ev.sparklines[0],
                    region = sparkline.getCurrentRegionFields();
                value = region.y;
                $('.mouseoverregion').text("x=" + region.x + " y=" + region.y);
            }).bind('mouseleave', function () {
                $('.mouseoverregion').text('');
            });
        }

        /**
         ** Draw the little mouse speed animated graph
         ** This just attaches a handler to the mousemove event to see
         ** (roughly) how far the mouse has moved
         ** and then updates the display a couple of times a second via
         ** setTimeout()
         **/
        function drawMouseSpeedDemo() {
            var mrefreshinterval = 500; // update display every 500ms
            var lastmousex = -1;
            var lastmousey = -1;
            var lastmousetime;
            var mousetravel = 0;
            var mpoints = [];
            var mpoints_max = 30;
            $('html').mousemove(function (e) {
                var mousex = e.pageX;
                var mousey = e.pageY;
                if (lastmousex > -1) {
                    mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
                }
                lastmousex = mousex;
                lastmousey = mousey;
            });
            var mdraw = function () {
                var md = new Date();
                var timenow = md.getTime();
                if (lastmousetime && lastmousetime != timenow) {
                    var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
                    mpoints.push(pps);
                    if (mpoints.length > mpoints_max)
                        mpoints.splice(0, 1);
                    mousetravel = 0;
                    $('#mousespeed').sparkline(mpoints, {width: mpoints.length * 2, tooltipSuffix: ' pixels per second'});
                }
                lastmousetime = timenow;
                setTimeout(mdraw, mrefreshinterval);
            };
            // We could use setInterval instead, but I prefer to do it this way
            setTimeout(mdraw, mrefreshinterval);
        }
    </script>
    <script>

        $('.fixed-action-btn').floatingActionButton({
            toolbarEnabled: true
        });
    </script>
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
            // document.getElementById('btns').click();
        }


    }, 1000);
</script>
    </body>
    </html>
