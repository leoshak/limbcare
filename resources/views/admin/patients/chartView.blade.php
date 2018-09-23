<!DOCTYPE html>
<html>
<head>
    <title>Chart View Of Patients</title>
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
<body>
<br />
<div class="container">
    <h3 align="center">Chart View Of Patients </h3><br />

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
</body>
</html>
