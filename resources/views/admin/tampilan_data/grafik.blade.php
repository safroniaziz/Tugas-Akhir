@extends('layouts.layout')
@section('menu')
    @include('admin/menu')
@endsection
@section('content-title')
    Tampilan Data Dalam Grafik
@endsection
@section('data-title')
    <i class="fa fa-info"></i>&nbsp;Informasi Data Dalam Diagram
@endsection
@push('styles')
    <style>
        #chartdiv {
            width: 90%;
            height: 450px;
        }
        #chartdiv2 {
            width: 70%;
            height: 380px;
        }
        #chartdiv3 {
            width: 100%;
            height: 500px;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h6 class="text-center text-bold">Tampilan Dalam Diagram Batang</h6>
                @section('chart_data')
            chart.data = [
                @foreach ($datas as $data)
                    {
                        "country": "Cluster {{ $data['kelompok_cluster'] }}",
                        "visits": {{ $data['jumlah'] }}
                    },
                @endforeach
            ];
            @endsection
            <div id="chartdiv"></div>
        </div>
        <div class="col-md-6">
            <h6 class="text-center text-bold">Tampilan Dalam Diagram Lingkaran</h6>
            @section('chart_data2')
            chart.data = [
                @foreach ($datas as $data)
                    {
                        "country": "Cluster {{ $data['kelompok_cluster'] }}",
                        "litres": {{ $data['jumlah'] }}
                    },
                    
                @endforeach
            ];
            @endsection
            <div id="chartdiv2"></div>
        </div>

    </div>
@endsection
@push('scripts')
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script>
    
    am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.XYChart);
    chart.scrollbarX = new am4core.Scrollbar();

    // Add data
    @yield('chart_data')

    // Create axes
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "country";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 30;
    categoryAxis.renderer.labels.template.horizontalCenter = "right";
    categoryAxis.renderer.labels.template.verticalCenter = "middle";
    categoryAxis.renderer.labels.template.rotation = 270;
    categoryAxis.tooltip.disabled = true;
    categoryAxis.renderer.minHeight = 110;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.renderer.minWidth = 50;

    // Create series
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.sequencedInterpolation = true;
    series.dataFields.valueY = "visits";
    series.dataFields.categoryX = "country";
    series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
    series.columns.template.strokeWidth = 0;

    series.tooltip.pointerOrientation = "vertical";

    series.columns.template.column.cornerRadiusTopLeft = 10;
    series.columns.template.column.cornerRadiusTopRight = 10;
    series.columns.template.column.fillOpacity = 0.8;

    // on hover, make corner radiuses bigger
    var hoverState = series.columns.template.column.states.create("hover");
    hoverState.properties.cornerRadiusTopLeft = 0;
    hoverState.properties.cornerRadiusTopRight = 0;
    hoverState.properties.fillOpacity = 1;

    series.columns.template.adapter.add("fill", function(fill, target) {
    return chart.colors.getIndex(target.dataItem.index);
    });

    // Cursor
    chart.cursor = new am4charts.XYCursor();

    }); // end am4core.ready()
    </script>

    
    <!-- Resources -->
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    
    <!-- Chart code -->
    <script>
    am4core.ready(function() {
    
    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end
    
    // Create chart instance
    var chart = am4core.create("chartdiv2", am4charts.PieChart);
    
    // Add data
    @yield('chart_data2')
    
    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "litres";
    pieSeries.dataFields.category = "country";
    pieSeries.slices.template.stroke = am4core.color("#fff");
    pieSeries.slices.template.strokeOpacity = 1;
    
    // This creates initial animation
    pieSeries.hiddenState.properties.opacity = 1;
    pieSeries.hiddenState.properties.endAngle = -90;
    pieSeries.hiddenState.properties.startAngle = -90;
    
    chart.hiddenState.properties.radius = am4core.percent(0);
    
    
    }); // end am4core.ready()
    </script>
    
    
@endpush