@extends('layouts.teacher')

@section('content')

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <div class="box-body">
            <form role="form" method="post" action="{{route('teacher.exams.store')}}">
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
{{--                <div class="form-group">--}}
{{--                    <label>Limited Time:</label>--}}

{{--                    <div class="input-group">--}}
{{--                        <div class="input-group-addon">--}}
{{--                            <i class="fa fa-clock-o"></i>--}}
{{--                        </div>--}}
{{--                        <input type="time" min="00:00:00" max="01:30:00" name="Time_limited"--}}
{{--                               class="form-control pull-right">--}}

{{--                    </div>--}}
{{--                    <!-- /.input group -->--}}
{{--                </div>--}}
                <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Create</button>
                </div>

            </form>
        </div>
    </section>
    <!-- /.content -->

@endsection
