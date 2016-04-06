@extends('admin_template')

@section('content')


    <div class="row">
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Glückwunsch!</h3>
                </div>



                <form role="form" action="{{ url('/fileentry/add') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">
                        <Span>
                            Deine Datei wurde erfolgreich hochgeladen.
                            <br><br>
                            Hier ist der Link zu deiner Datei:

                            <a href="{{ URL::route('getfile', $params) }}">{{ URL::route('getfile', $params) }}</a>
                        </Span>
                    </div>

                    <div class="box-footer">
                        <a class="btn  btn-default" href="{{ url('/') }}"> Zum Dashboard</a>
                        <a class="btn  btn-default" href="{{ url('/upload') }}"> Zum Upload</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection