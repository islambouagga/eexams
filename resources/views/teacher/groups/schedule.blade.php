@extends('layouts.teacher')

@section('content')

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <form role="form" method="post" action="{{route('teacher.groups.doschedule')}}">
            @csrf
            <h3><input type="hidden" name="id_Group" value="{{$group->id_Group}}"> </h3>


            <div class="form-group">
                <label>Select exam please </label>
                <select class="form-control select2" name="exam"  style="width: 100%;">
                    @foreach($exams as $e)
                    <option value="{{$e->id_Exam}}">{{$e->title}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Date and time range:</label>

                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" name="date_scheduling" class="form-control pull-right" id="reservationtime">
                </div>
{{--                <span id="timeRangePicker"></span>--}}
                <!-- /.input group -->
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Create</button>
            </div>
        </form>

    </section>
    <!-- /.content -->

@endsection
