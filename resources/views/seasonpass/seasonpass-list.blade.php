@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Bérletek</h4>
                        <div class="input-group pull-right">
                            <a href="{{ route('create-season-pass') }}" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Bérlet hozzáadása">
                                <i class="glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Bérlet neve</th>
                                <th>Edzőterem</th>
                                <th>Alkalmak</th>
                                <th>Létrehozva</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($passes as $pass)
                                    <tr>
                                        <th scope="row">{{ $pass->tid }}</th>
                                        <td>{{ $pass->ticket_name }}</td>
                                        <td>{{ $pass->gym }}</td>
                                        <td>{{ $pass->occasions }}</td>
                                        <td>{{ $pass->created_at }}</td>
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
