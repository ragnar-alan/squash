@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Termek</h4>
                        <div class="input-group pull-right">
                            <a href="{{ route('create-gyms') }}" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Terem hozzáadása">
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
                                <th>Pályák száma</th>
                                <th>Kedvezmény típusa/i</th>
                                <th>Létrehozva</th>
                                <th>Műveletek</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($gyms as $gym)
                                    <tr>
                                        <th scope="row">{{ $gym->gid }}</th>
                                        <td>{{ $gym->gym_name }}</td>
                                        <td>{{ $gym->number_of_courts }}</td>
                                        <td>{{ $gym->discount_type }}</td>
                                        <td>{{ $gym->created_at->format("Y-m-d H:i") }}</td>
                                        <td>
                                            <a href="{{ route('details-gyms', $gym->gid) }}" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Terem részletei">
                                                <i class="fa fa-info"></i>
                                            </a>
                                            <a href="{{ route('edit-gyms', $gym->gid) }}" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Terem szerkesztése">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
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
