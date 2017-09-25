@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Foglalás - {{ $reservation->rdate }}</h4>
                        <div class="input-group pull-right">
                            <a href="{{ route('create-booking') }}" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Foglalás hozzáadása">
                                <i class="glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <dl class="dl-horizontal">
                                        <dt>Résztvevők</dt>
                                        <dd>
                                            <ul class="list-unstyled">
                                                @foreach($participants as $participant)
                                                    <li>{{ $participant->name }}</li>
                                                @endforeach
                                            </ul>
                                        </dd>
                                        <dt>Időpont</dt>
                                        <dd>
                                            {{  $reservation->rdate }}
                                        </dd>
                                    </dl>
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
