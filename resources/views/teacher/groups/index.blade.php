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
                                <th>Schedule</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                            @foreach($groups as $g)
                                <tr>
                                    <td>{{$g->id_Group}}</td>
                                    <td>{{$g->title}}</td>
                                    <td>{{$g->Description}}</td>
                                    <td><i class="glyphicon glyphicon-time"></i></td>
                                    <td>
                                        <a href="/eexams/public/teacher/groups/{{$g->id_Group}}">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form role="form" method="post" action="/eexams/public/teacher/groupes/{{$g->id_Group}}">
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
