@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Bérletek</h4>
                        <div class="input-group pull-right">
                            <a href="{{ route('create-session-pass') }}" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Bérlet hozzáadása">
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
                            </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
