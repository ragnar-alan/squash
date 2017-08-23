@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Bérlet hozzáadása
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('save-session-pass') }}" method="post">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <span class="input-group-addon">Bérlet neve</span>
                                <input class="form-control" name="name" type="text" placeholder="10 alkalmas bérlet" required>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Alkalmak</span>
                                        <input class="form-control" name="occasions" type="number" placeholder="10" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Ára</span>
                                        <input class="form-control" name="street" type="number" placeholder="29500" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group date" id="datetimepicker6">
                                        <span class="input-group-addon">
                                            Érvényes ettől
                                        </span>
                                        <input type="text" class="form-control" name="valid_from" readonly="readonly"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group date" id="datetimepicker7">
                                        <span class="input-group-addon">
                                            Érvényes eddig
                                        </span>
                                        <input type="text" class="form-control" name="valid_to" readonly="readonly"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Edzőterem</span>
                                        <select class="form-control">
                                        @if (!empty($gyms) && count($gyms) > 0)
                                            <option>Válassz edzőtermet</option>
                                            
                                            @foreach($gyms as $gym)
                                                <option value="{{ $gym->gid }}">{{ $gym->gym_name }}</option>
                                            @endforeach
                                        @else
                                            <option>Nincs elérhető edzőterem</option>
                                        @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="pull-right">
                                <a href="{{ URL::previous() }}" class="btn btn-default">Vissza</a>
                                <button type="submit" class="btn btn-success">Mentés</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section("scripts")
<script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
<script>
    $(function () {
        $('#datetimepicker6').datetimepicker({
            format: "YYYY-MM-DD HH:mm",
            sideBySide: true,
            focusOnShow: true,
            stepping: 10,
            ignoreReadonly: true
        });
        $('#datetimepicker7').datetimepicker({
            useCurrent: false,
            format: "YYYY-MM-DD HH:mm",
            sideBySide: true,
            focusOnShow: true,
            stepping: 10,
            ignoreReadonly: true
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
@stop
