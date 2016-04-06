@extends('admin_template')

@section('content')
    <section class="content-header">
        <h4>
            {{ $page_title or "Verlauf" }}
            <small>{{ $page_description or null }}</small>
        </h4>
        {{--  <!-- You can dynamically generate breadcrumbs here -->
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
              <li class="active">Here</li>
          </ol>--}}

        <ul class="timeline">
            @foreach($entries as $entry)

            <!-- timeline time label -->
            <li class="time-label">
        <span class="bg-red">
            {{ $entry->created_at->format('F') }}
        </span>
            </li>
            <!-- /.timeline-label -->

            <!-- timeline item -->
            <li>
                <!-- timeline icon -->
                <i class="fa fa-envelope bg-green"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{ $entry->created_at->format('d.m.y - H:i:s') }}</span>

                    <h3 class="timeline-header"><a href="#"></a> {{ $entry->subject }} </h3>

                    <div class="timeline-body">
                        Du hast folgende Datei hochgeladen: <b>{{ $entry->original_filename }} </b>
                    </div>

                    <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs" href="">Vorschau</a>
                    </div>
                </div>
            </li>
            <!-- END timeline item -->
@endforeach


        </ul>


@endsection