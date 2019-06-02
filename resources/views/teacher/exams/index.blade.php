@extends('layouts.teacher')

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


                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Date</th>

                                <th>Status</th>
                                <th>Download</th>
                                <th>Edite</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                        <tbody>

                        @foreach($exams as $e)
                                <tr>
                                    <td>{{$e->id_Exam}}</td>
                                    <td>{{$e->title}}</td>
                                    <td>{{$e->Description}}</td>
                                    <td>{{$e->created_at}}</td>
                                    <td><span class="label label-success">Approved</span></td>
                                    <td><i class="glyphicon glyphicon-download-alt"></i></td>
                                    <td>
                                        <a href="/eexams/public/teacher/exams/{{$e->id_Exam}}">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form role="form" method="post"
                                              action="/eexams/public/teacher/exams/{{$e->id_Exam}}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="glyphicon glyphicon-trash"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
