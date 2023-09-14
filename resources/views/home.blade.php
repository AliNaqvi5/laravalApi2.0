@extends('layouts.app')

@section('content')
    <div class="modal fade" id="alarmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alarmModalTitle">Alarm</h5>
{{--                    <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close">--}}
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="alarmModalBody" style="color:red">

                </div>
                <div class="modal-footer">
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="button" class="btn btn-danger" id="alarmModalBtn" onclick="Acknowledge()">Acknowledge</button>
                </div>
            </div>
        </div>
    </div>

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
{{--            <img src="..." class="rounded mr-2" >--}}
            <strong class="mr-auto">Bootstrap</strong>
            <small class="text-muted">just now</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            See? Just like this.
        </div>
    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="sensor col-md-8">
                    <div class="card" >
                        <div class="card-header">{{ __('Temperature Sensor') }}</div>
                        <div class="card-body">
                            <div class="gaugeTemp" data-digit={{ round($temperature->value) }}>
                                <div class="gauge-outerTemp"></div>
                                <div class="gauge-innerTemp"></div>
                                <div class="gauge-digitsTemp"></div>
                            </div>
                            <h3 class="headingSensorGuage">Temperature (Celcius)</h3>
                        </div>
                    </div>
                </div>
                <div class="sensor col-md-4">
                    <div class="card" >
                        <div class="card-header">{{ __('Rain Sensor') }}</div>
                        <div class="card-body" style="background: #233043;">
                            @if($rain->value === "Dry" )
                                <img src="{{ asset('img/noRainDark.png') }}" style=" width: 56%;">
                                <h3 class="headingSensorGuage dark" style="display: inline;">No Rain</h3>
                            @else
                                <img src="{{ asset('img/rainDark1.png') }}" style=" width: 56%;">
                                <h3 class="headingSensorGuage dark" style="display: inline;">Raining</h3>
                            @endif
                        </div>
                    </div>
                    <div class="card" >
                        <div class="card-header">{{ __('Solar Intensity') }}</div>
                        <div class="card-body">
                            {{--                            @if($lux->value <= 0 )--}}
{{--                            {{ date_sunset(time(),SUNFUNCS_RET_STRING,24.8,67.0011,90,5) }}--}}
                            @php $createdAtPST = date('Y-m-d H:i:s', strtotime(($lux->created_at). ' +5 hours'));
                                $sunset = date_sunset(time(),SUNFUNCS_RET_STRING,24.8,67.0011,90,5) ; $sunrise =date_sunrise(time(),SUNFUNCS_RET_STRING,24.8,67.0011,90,5) ;
                                $createdAtPST = explode(" ",$createdAtPST)[1];
                            @endphp
{{--                            {{explode(" ",$createdAtPST)[1]}}--}}
                            @if($sunrise < $createdAtPST && $sunset > $createdAtPST)
                                @if($lux->value <= 1000 && $lux->value >= 500)
                                    <img src="{{ asset('img/cloudy.png') }}" style=" width: 54%;">
                                    <h3 class="headingSensorGuage" style="display: inline;">{{$lux->value.' lux ' }} <br>{{"(Overcast DayLight)"}}</h3>
                                @elseif($lux->value > 10000 && $lux->value < 25000)
                                    <img src="{{ asset('img/ambientDay.png') }}" style=" width: 54%;">
                                    <h3 class="headingSensorGuage" style="display: inline;">{{$lux->value.' lux ' }}<br>{{"(Ambient DayLight)"}}</h3>
                                @elseif($lux->value > 25000 )
                                    <img src="{{ asset('img/directSunlight.png') }}" style=" width: 54%;">
                                    <h3 class="headingSensorGuage" style="display: inline;">{{$lux->value.' lux ' }}<br>{{"(Direct SunLight)"}}</h3>
                                @else
                                    <img src="{{ asset('img/Sun.jpg') }}" style=" width: 54%;">
                                    <h3 class="headingSensorGuage" style="display: inline;">{{$lux->value.' lux' }}</h3>
                                @endif
                            @elseif($sunrise == $createdAtPST || $sunset == $createdAtPST)
                                <img src="{{ asset('img/rise.png') }}" style=" width: 54%;">
                                <h3 class="headingSensorGuage" style="display: inline;">{{$lux->value.' lux ' }}<br>{{"(Sun at horizon)"}}</h3>
                            @elseif($sunrise > $createdAtPST || $sunset > $createdAtPST)
                                <img src="{{ asset('img/Night.png') }}" style=" width: 54%;">
                                <h3 class="headingSensorGuage" style="display: inline;"> {{$lux->value.' lux' }}<br>{{("Night")}}</h3>

                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="sensor col-md-8">
                    <div class="card" >
                        <div class="card-header">{{ __('Humidity Sensor') }}</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                                <div class="gaugeHum" data-digit={{ round($humidity->value) }}>
                                    <div class="gauge-outerHum"></div>
                                    <div class="gauge-innerHum"></div>
                                    <div class="gauge-digitsHum"></div>
                                </div>
                                <h3 class="headingSensorGuage">Humidity (%)</h3>
                        </div>
                    </div>

                </div>

                <div class="sensor col-md-4">
                    <div class="card" >
                        <div class="card-header">{{ __('Soil Moisture Sensor') }}</div>
                        <div class="card-body">
                    <div class="outer-wrapper" style="margin-top: 101px;margin-left: 91px;margin-right: auto;">
                        <div class="column-wrapper">
                            <div class="column"></div>
                        </div>
                        <div class="percentage">{{ $soilMoisture->value }}</div>
                        <div class="value">soil moisture</div>
                    </div>
                    <h3 class="headingSensorGuage">Soil Moisture (%)</h3>
                        </div></div>
                </div>

            </div>


        </div>
    </div>
</div>
@endsection
