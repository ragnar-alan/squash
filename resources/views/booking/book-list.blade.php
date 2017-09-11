@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Foglalások</h4>
                        <div class="input-group pull-right">
                            <a href="{{ route('create-booking') }}" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Foglalás hozzáadása">
                                <i class="glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Hely neve</th>
                                <th>Pálya száma</th>
                                <th>Edzés időpontja</th>
                                <th>Létrehozva</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $reservation)
                                    <tr>
                                        <th scope="row">{{ $reservation->rid }}</th>
                                        <td>{{ $reservation->gym }}</td>
                                        <td>{{ $reservation->court_number }}</td>
                                        <td>{{ $reservation->rdate }}</td>
                                        <td>{{ $reservation->created_at->format("Y-m-d H:i") }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
