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

                    <li id="rr" class="active"><a href="{{route('student.exams.index')}}"><i class="fa fa-files-o"></i> <span>Exams List</span></a>
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

        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Exam's date and time</th>
                                <th>Mark</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exams as $e)

                                @if($e->students->where('id_Exam',$e->id_Exam) != null)

                                <tr>
                                    <input type="hidden" value="{{ $tl = $e->pivot->date_scheduling}} ">

                                    <input type="hidden" value="{{ $dt = Carbon\Carbon::create($tl)}}">

                                    <input type="hidden" value="{{ $drt = $dt->addMinutes(30)}}">

                                    @if(count($student->exams)!=$gr )



                                        <td>


                                            @if($date>=$e->pivot->date_scheduling and $date<$drt )



                                                <a class="btn btn-info" href="/eexams/public/student/exams/pass?id={{$e->id_Exam}}&key={{$e->pivot->date_scheduling}}" >
                                                    {{$e->title}}
                                                </a>




                                            @elseif($date<($e->pivot->date_scheduling) or $date>$drt )


                                                <samp class="btn btn-danger" data-toggle="modal" data-target="#modal-warning"> {{$e->title}}</samp>
                                            @endif
                                    @endif


                                        </td>

                                    @endif
                                    <td>{{$e->Description}}</td>
                                    <td>{{$e->pivot->date_scheduling}}</td>
                                    <td>Not yet passed</td>



                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Exam's date and time</th>
                                <th>Mark</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($student->exams as $ee)


                                <tr>




                                    <td><samp class="btn btn-success" data-toggle="modal" data-target="#modal-warning"> {{$ee->title}}</samp></td>




                                    <td>{{$ee->Description}}</td>
                                    <td>{{$ee->pivot->date_scheduling}}</td>
                                    <td>{{$ee->pivot->mark}}</td>



                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>


    </section>
    <!-- /.content -->
    </div>


    <script>

        <!--
        function timedRefresh(timeoutPeriod) {
            setTimeout("location.reload(true);",timeoutPeriod);
        }

        window.onload = timedRefresh(5000);

        //   -->
    </script>
@endsection
