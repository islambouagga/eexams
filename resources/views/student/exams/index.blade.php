@extends('layouts.student')

@section('content')

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Responsive Hover Table</h3>


                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Exam's date and time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $g)
                                @foreach($g->exams as $e)
                                <tr>


                                    <td>{{$e->id_Exam}}</td>
                                    <td>
                                        @if($date>=$e->pivot->date_scheduling)
                                            @if($date>=$e->pivot->Time_limit)
                                        <a href="/eexams/public/student/exams/create?id={{$e->id_Exam}}">
                                        {{$e->title}}
                                        </a>
                                            @endif
                                            @else
                                            {{$e->title}}
                                            @endif
                                    </td>
                                    <td>{{$e->Description}}</td>
                                    <td>{{$e->pivot->date_scheduling}}</td>



                                </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Exam's date and time</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body     -->
                </div>
                <!-- /.box -->
            </div>
        </div>



    </section>
    <!-- /.content -->

@endsection
