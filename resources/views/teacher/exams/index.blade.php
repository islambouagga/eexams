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

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-fw fa-filter"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Limited Time</th>
                                <th>Status</th>
                                <th>Download</th>
                                <th>Edite</th>
                                <th>Delete</th>

                            </tr>
                            @foreach($exams as $e)
                                <tr>
                                    <td>{{$e->id_Exam}}</td>
                                    <td>{{$e->title}}</td>
                                    <td>{{$e->Description}}</td>
                                    <td>{{$e->created_at}}</td>
                                    <td>{{$e->Time_limited}}</td>
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
