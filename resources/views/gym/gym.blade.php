@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">{{ $gym->gym_name }}</h4>
                        <div class="input-group pull-right"></div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">Neve:</div>
                                    <div class="col-lg-6">{{ $gym->gym_name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">Címe:</div>
                                    <div class="col-lg-6">{{ $gym->zip_code }} {{ $gym->city }}, {{ $gym->street }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">Elérhető kedvezmények:</div>
                                    <div class="col-lg-6">{{ $gym->discount_type }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">Pályák száma:</div>
                                    <div class="col-lg-6">{{ $gym->number_of_courts }}</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2694.0482309628774!2d19.033809057279818!3d47.52792400037416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741d956964d2ddd%3A0x762d433d965427a8!2sArnold+Gym!5e0!3m2!1shu!2shu!4v1506273938034" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
