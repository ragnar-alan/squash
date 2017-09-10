@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Foglalás</h4>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('store-reservation') }}">
                            <div class="form-group">
                                <label for="gym">Helyszín</label>
                                <select class="form-control" name="gym" id="gym">
                                    @foreach($data->gyms as $gym)
                                        <option value="{{ $gym->gid }}">{{ $gym->gym_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="datetime">Időpont</label>
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('header')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@stop
@section('footer')
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
@stop
