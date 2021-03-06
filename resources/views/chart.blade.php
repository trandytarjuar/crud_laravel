@extends('layout.app')
@section('content')

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Line graph<small>Sessions</small></h2>
        
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <canvas id="lineChartz"></canvas>
        </div>
    </div>
</div>

              
@endsection
@section('js')
<script>
if ($('#lineChartz').length ){	
			
    var ctx = document.getElementById("lineChartz");
    var lineChartz = new Chart(ctx, {
        type: 'line',
        data: {
        labels: ["datetime"],
        datasets: [{
            label: "value1",
            backgroundColor: "rgba(38, 185, 154, 0.31)",
            borderColor: "rgba(38, 185, 154, 0.7)",
            pointBorderColor: "rgba(38, 185, 154, 0.7)",
            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointBorderWidth: 1,
            data: [31, 74, 6, 39, 20, 85, 7]
        }, {
            label: "My Second dataset",
            backgroundColor: "rgba(3, 88, 106, 0.3)",
            borderColor: "rgba(3, 88, 106, 0.70)",
            pointBorderColor: "rgba(3, 88, 106, 0.70)",
            pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(151,187,205,1)",
            pointBorderWidth: 1,
            data: [82, 23, 66, 9, 99, 4, 2]
        }]
        },
    });
    
    }
</script>
@endsection
