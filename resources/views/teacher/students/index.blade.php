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
                                <th>#</th>
                                <th>Full Name</th>



                            </tr>
                            @foreach($group->students()->get() as $s)
                                <tr>
                                    <td>{{$s->id_student}}</td>
                                    <td>{{$s->name}}</td>

                                </tr>
                            @endforeach
                            <tr>
                                <form role="form" method="post" action="/eexams/public/teacher/groups/{{$group->id_Group}}">
                                    {{method_field('PATCH')}}
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label>students</label>
                                    <select class="form-control select2" name="students[]"  multiple="multiple"  data-placeholder="Select a State"
                                    >

                                        @foreach($students as $ss)
{{--                                            {{$exist=$group->students()->where('id_student', $s->id_student)}}--}}
                                            {{$exist=$group->students()->
                                            where('students.id_student', $ss->id_student)->exists()
}}
                                            <option @if($exist==true) disabled="disabled" @endif value="{{$ss->id_student}}">{{$ss->name}} @if($exist==true)is already exist @endif </option>
                                        @endforeach
                                    </select>


                                </div>

                                    <div class="box-footer">

                                        <button type="submit" name="submitbtn" value="add" class="btn btn-info pull-right">
                                            make edit
                                        </button>

                                    </div>

                                </form>
                            </tr>
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
