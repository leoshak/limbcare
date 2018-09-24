@extends('admin.layouts.admin')
<head>
    <script src="https://raw.githubusercontent.com/nnnick/Chart.js/master/dist/Chart.bundle.js"></script>
    <script>
        var year = ['2013','2014','2015', '2016'];
        var data_click = <?php echo $click; ?>;
        var data_viewer = <?php echo $viewer; ?>;


        var barChartData = {
            labels: Month,
            datasets: [{
                label: 'Click',
                backgroundColor: "rgba(220,220,220,0.5)",
                data: data_click
            }, {
                label: 'View',
                backgroundColor: "rgba(151,187,205,0.5)",
                data: data_viewer
            }]
        };


        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: 'rgb(0, 255, 0)',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Yearly Website Visitor'
                    }
                }
            });


        };
    </script>
</head>
@section('title',"Doctor Report Generate ", "Doctor")
<body>
@section('content')
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <h1>Period Report Genarate</h1>
        <form action="report" method="post">

            {{ csrf_field() }}

            <div class="form-row">


                <div class="col">
                    <label for="inputAddress">Starting From</label>
                    <input type="date" name="from_date" class="form-control" id="inputAddress" value="">
                </div>
                <div class="col">
                    <label for="inputAddress">End Date</label>
                    <input type="date" name="to_date" class="form-control" id="inputAddress" value="">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Genarate</button>
                </div>
            </div>

        </form>

<h1>Bar chart Of Doctors</h1>

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>
                        <div class="panel-body">
                            <canvas id="canvas" height="280" width="600"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
@endsection


@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}


@endsection
