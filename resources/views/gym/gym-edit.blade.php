@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Terem hozzáadása
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('save-gyms') }}" method="post">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <span class="input-group-addon">Edzőterem neve</span>
                                <input type="hidden" value="{{$gym->gid}}" name="gid">
                                <input class="form-control" name="name" type="text" placeholder="Arnold Gym" required value="{{ $gym->gym_name }}">
                            </div>
                            <br>
                            <label for="basic-url">Címe</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Város</span>
                                        <input class="form-control" name="city" type="text" placeholder="Budapest" required value="{{ $gym->city }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Utca</span>
                                        <input class="form-control" name="street" type="text" placeholder="Sáfrány utca" required value="{{ $gym->street }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Irányítószám</span>
                                        <input class="form-control" name="zipcode" type="number" placeholder="1001" required value="{{ $gym->zip_code }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Házszám</span>
                                        <input class="form-control" name="number" type="text" placeholder="15" required value="{{ $gym->number }}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <label for="basic-url">Egyéb adatok</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Pályák száma</span>
                                        <input class="form-control" name="courts" type="number" placeholder="2" required value="{{ $gym->number_of_courts }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Kedvezmény típus</span>
                                        <input class="form-control" name="discount" type="text" placeholder="AYCM | Sportkártya | Bérlet" required value="{{ $gym->discount_type }}">
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
@endsection
