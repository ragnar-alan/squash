@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Foglalás</h4>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route("store-booking") }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="input-group">
                                <span class="input-group-addon">
                                    Edzőterem
                                </span>
                                    <select class="form-control" name="gym" id="gym">
                                        <option value="">Nincs edzőterem választva</option>
                                        @foreach($datas->gyms as $gym)
                                            @if (!empty(old('gym')) && old('gym') == $gym->gym_name)
                                                <option value="{{ $gym->gym_name }}"
                                                        selected>{{ $gym->gym_name }} </option>
                                            @else
                                                <option value="{{ $gym->gym_name }}">{{ $gym->gym_name }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if ($errors->has('gym'))
                                <div class="alert alert-danger" role="alert">{{ $errors->first('gym') }}</div>
                            @endif

                            <div class="form-group">
                                <div class="input-group">
                                <span class="input-group-addon">
                                    Bérlet
                                </span>
                                    <select class="form-control" name="ticket_id" id="ticket">
                                        <option value="">Nincs bérlet választva</option>
                                        @foreach($datas->passes as $pass)

                                            <option value="{{ $pass->getSeasonPass()->tid }}">
                                                {{ $pass->getSeasonPass()->ticket_name }} - {{ $pass->getOccasionsLeft() }} alkalom van hátra
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if ($errors->has('gym'))
                                <div class="alert alert-danger" role="alert">{{ $errors->first('gym') }}</div>
                            @endif
                            <br>
                            <div class="form-group">
                                <div class="input-group date" id="datetimepicker1">
                                    <span class="input-group-addon">
                                        Dátum
                                    </span>
                                    <input type="text" class="form-control" name="rdate" readonly="readonly"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            @if ($errors->has('rdate'))
                                <div class="alert alert-danger" role="alert">{{ $errors->first('rdate') }}</div>
                            @endif
                            <br>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        Résztvevők
                                    </span>
                                    <select multiple="multiple" class="form-control" id="participants" name="participants[]">
                                        @foreach($datas->users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            @if ($errors->has('participants'))
                                <div class="alert alert-danger" role="alert">{{ $errors->first('participants') }}</div>
                            @endif
                            <br>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Pálya száma</span>
                                    <input class="form-control" name="court" type="number"/>
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
    <script type="text/javascript" src="{{ asset('js/select2.full.js') }}"></script>
    <script>
        //option.format("YYYY-MM-DD HH:mm");
        $(function () {
            $("#datetimepicker1").datetimepicker({
                format: "YYYY-MM-DD HH:mm",
                sideBySide: true,
                focusOnShow: true,
                stepping: 10,
                ignoreReadonly: true
            });
        });

        $('#gym').on('change', function () {
            var selectValue = $(this).val();
            var csrf = $("input[name=_token]").val();
            $.ajax({
                method: "POST",
                url: '/season-pass/getpass',
                data: {"_token":csrf, "gym":selectValue}
            })
            .done(function( tickets ) {
                var option = '<option value="">Nincs bérlet választva</option>';
                console.log(tickets);
                for (var i=0;i<tickets.length;i++){
                    option += '<option value="'+ tickets[i].tid + '">' + tickets[i].ticket_name + ' - ' + tickets[i].occasions_left + ' alkalom van hátra</option>';
                }
                $('#ticket').html(option);
            });
        });
        $(document).ready(function() {
            $('#participants').select2();
        });

    </script>
@stop
