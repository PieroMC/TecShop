@extends('layout.template')

@section('content')
<div class="row d-flex justify-content-center">

    <div class="col-md-10">
        <div class="tile">
            <h3 class="tile-title">{{$type_data}}</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="Monthly_Sales"></canvas>
            </div>
        </div>
    </div>


    <form action="" method="post" id="form-request">
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}">
        {{-- <input id="cargar" type="hidden" onclick='load()'> --}}
    </form>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="/js/chart/dashboard.js"></script>
<script type="text/javascript">

    $(document).ready(function () {

        function monthlySales(ctx) {

            new Chart(ctx,
                {
                    type: 'line',
                    data: {

                        labels: [
                    @foreach($data as $item)
            "{{$item->month}}",
                    @endforeach
                ],
            datasets: [{

                label: 'Sales',
                data: [
                        @foreach($data as $item)
            "{{$item->quantity}}",
                        @endforeach
                    ],
            borderColor: 'green',
                }]
    },
        options: {
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                }
            }]
        },
        legend: {
            position: 'bottom',
            labels: {
                padding: 20,
                boxWidth: 25,
                fontColor: 'black'
            }
        },
        tooltips: {
            backgroundColor: '#26518C',
            xPadding: 10,
            yPadding: 10
        },
        elements: {
            line: {
                borderWidth: 4,
                fill: false,
            },
            point: {
                radius: 4,
                borderWidth: 2,
                backgroundColor: 'white',
                hoverRadius: 6,
                hoverBorderWidth: 2,
            }
        }
    }
        })
    }
    function renderChart() {
        const ctx = document.querySelector('#Monthly_Sales').getContext('2d')
        monthlySales(ctx)
    }

    renderChart()
});
</script>
@endsection