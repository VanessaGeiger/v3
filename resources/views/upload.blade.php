@extends('admin_template')

@section('content')


    <!-- Main content -->
        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upload</h3>
                    </div>

                    {{--Upload mit Email--}}

                    <form role="form" action="{{ url('/fileentry/add') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">

                           {{--<form method="post">
                                <input type="checkbox" name="sendemail"  value="yes" checked>   E-Mail versenden<br>
                                </form>--}}
                            <div class="form-group">
                                <label for="exampleInputEmpfaenger">Empfänger</label>
                                <input id="exampleInputEmail1" class="form-control" type="email" name="recipient" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBetreff1">Betreff</label>
                                <input id="exampleInputBetreff1" class="form-control" type="text" name="subject" placeholder="Betreff">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMailtext1">Nachricht</label>
                            <textarea class="form-control" name="mailcontent" placeholder="Enter ..." rows="3"></textarea>
                            </div>




                            <div class="form-group">
                                <label>Gültigkeitsdauer:</label>
                                <input id="datepicker" class="form-control" type="hidden" name="datepicker">
                                <div class="input-group">
                                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                        <span></span> <b class="caret"></b>
                                        </div>
                                  </div>
                              </div><!-- /.form group -->


                            <div class="form-group">
                                <label for="exampleInputFile">Datei hochladen</label>
                                <input id="exampleInputFile" type="file" name="filefield">

                            </div>

                        </div>

                        </div>
                        <div class="box-footer">
                            <button class="btn btn-google" type="submit">Hochladen</button>
                        </div>
                    </form>
                </div>









        {{--    <form action="{{ url('/fileentry/add') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="file" name="filefield">
        <input type="submit">
    </form>--}}


@endsection
