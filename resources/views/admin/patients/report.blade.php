@extends('admin.layouts.admin')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style type="text/css">
        .box{
            width:800px;
            margin:0 auto;
        }
    </style>
    <script type="text/javascript">
        var analytics = <?php echo $gender; ?>

        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);

        function drawChart()
        {
            var data = google.visualization.arrayToDataTable(analytics);
            var options = {
                title : 'Percentage of Male and Female Patients'
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            chart.draw(data, options);
        }
    </script>
</head>
@section('title',"Patient Report Generate ", "Patient")
<body>
@section('content')
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <h1>Period Report Genarate</h1>
        <form action="patientsreport" method="post">

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
<h1>Overal presentage of Patient by Pie-chart</h1>
        <br />
        <div class="container">


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Percentage of Male and Female Patient</h3>
                </div>
                <div class="panel-body" align="center">
                    <div id="pie_chart" style="width:750px; height:450px;">

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
