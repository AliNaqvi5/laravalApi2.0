@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    {{ $temperature }}
                    {{ $humidity }}
                    {{ $lux }}
                    {{ $soilMoisture }}
                    {{ $rain }}

                    <canvas id="my-chart" width="400" height="400"></canvas>

                </div>


            </div>
        </div>
    </div>
</div>
    <script>
        //js file
        // import Chart from 'chart.js'

        const ctx = document.getElementById('my-chart').getContext('2d');
        const chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 5, 2, 20, 30, 45]
                }]
            },

            // Configuration options go here
            options: {}
        });

    </script>
@endsection
