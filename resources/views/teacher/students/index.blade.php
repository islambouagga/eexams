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
                                <th>Full Name</th>
                                <th></th>


                            </tr>
                            @foreach($student as $s)
                                <tr>
                                    <td>{{$s->id_student}}</td>
                                    <td>{{$s->name}}</td>
                                    <td>
                                        <form role="form" method="post" action="{{route('teacher.students.store')}}">
                                        @csrf
                                            <h1><input type="hidden" name="id_group" value="{{$id_group}}"></h1>
                                        <button type="submit" name="id_student" class="add-on" value="{{$s->id_student}}"> add</button>
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
