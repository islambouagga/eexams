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

                            </tr>
                            @foreach($exams as $e)
                                <tr>
                                    <td>{{$e->id_Exam}}</td>
                                    <td>
                                        <a href="/eexams/public/student/exams/create?id={{$e->id_Exam}}">
                                        {{$e->title}}
                                        </a>
                                    </td>
                                    <td>{{$e->Description}}</td>
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
