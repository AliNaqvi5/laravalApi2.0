@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" >
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
{{--                    {{ $temperature }}--}}
                    {{ $humidity }}
{{--                    {{ $lux }}--}}
{{--                    {{ $soilMoisture }}--}}
{{--                    {{ $rain }}--}}
                        <div class="row">
                            <div class="sensor col-md-8">
                                <div class="gaugeHum" data-digit={{ round($humidity->value) }}>
                                    <div class="gauge-outerHum"></div>
                                    <div class="gauge-innerHum"></div>
                                    <div class="gauge-digitsHum"></div>
                                </div>
                                <h3 class="headingSensorGuage">Humidity (%)</h3>
                            </div>
                            <div class="sensor col-md-4">
                                <div class="outer-wrapper" style="margin-top: 101px;margin-left: 91px;margin-right: auto;">
                                    <div class="column-wrapper">
                                        <div class="column"></div>
                                    </div>
                                    <div class="percentage">{{ $soilMoisture->value }}</div>
                                    <div class="value">soil moisture</div>
                                </div>
                                <h3 class="headingSensorGuage">Soil Moisture (%)</h3>
                            </div>
                            <div class="sensor col-md-6">
                                <div class="gaugeTemp" data-digit={{ round($temperature->value) }}>
                                    <div class="gauge-outerTemp"></div>
                                    <div class="gauge-innerTemp"></div>
                                    <div class="gauge-digitsTemp"></div>
                                </div>
                                <h3 class="headingSensorGuage">Temperature (Celcius)</h3>
                            </div>
                            <div class="sensor col-md-6"></div>
                        </div>
                        <div class="row">

                        </div>
{{--                    <canvas id="my-chart" width="400" height="400"></canvas>--}}

                </div>


            </div>
        </div>
    </div>
</div>
    <script>
        //js file
        // import Chart from 'chart.js'
        //
        // const ctx = document.getElementById('my-chart').getContext('2d');
        // const chart = new Chart(ctx, {
        //     // The type of chart we want to create
        //     type: 'bar',
        //
        //     // The data for our dataset
        //     data: {
        //         labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        //         datasets: [{
        //             label: 'My First dataset',
        //             backgroundColor: 'rgb(255, 99, 132)',
        //             borderColor: 'rgb(255, 99, 132)',
        //             data: [0, 10, 5, 2, 20, 30, 45]
        //         }]
        //     },
        //
        //     // Configuration options go here
        //     options: {}
        // });

    </script>
@endsection
