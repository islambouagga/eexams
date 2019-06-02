@extends('layouts.student')

@section('content')

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->

{{$mark}}
        <div class="col-xs-6 col-md-3 text-center">
            <input type="text" class="knob" value="{{($mark*100)/20}}" data-skin="tron" data-thickness="0.2" data-width="240" data-height="240" data-fgColor="#3c8dbc" data-readonly="true">

            <div class="knob-label">your score is {{$mark}} / 20</div>
        </div>
    </section>
    <!-- /.content -->

@endsection
