@extends('layouts.teacher')

@section('content')

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <div class="box-body">
            <form role="form" method="post" action="{{route('teacher.groups.store')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- text input -->
                <div class="form-group">
                    <label class="col-md-3">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter ...">
                </div>

                <!-- textarea -->
                <div class="form-group">
                    <label class="col-md-3">Description</label>
                    <textarea type="text" name="Description" class="form-control" rows="3"
                              placeholder="Enter ..."></textarea>
                </div>
                <div class="form-group">
                    <label>students</label>
                    <select class="form-control select2" name="students[]"  multiple="multiple"  data-placeholder="Select a Student"
                            >
                        @foreach($student as $s)
                        <option  value="{{$s->id_student}}">{{$s->name}}</option>
                        @endforeach
                    </select>


                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Create</button>
                </div>

            </form>
        </div>
    </section>
    <!-- /.content -->

@endsection
