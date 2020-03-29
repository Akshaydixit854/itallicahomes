<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Italica Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Bootstrap Core Css -->
    @section('css')

        {{ Html::style('bsbmd/plugins/bootstrap/css/bootstrap.css') }}
        {{ Html::style('bsbmd/plugins/node-waves/waves.css') }}
        {{ Html::style('bsbmd/plugins/animate-css/animate.css') }}
        {{ Html::style('bsbmd/plugins/morrisjs/morris.css') }}
        {{ Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') }}
        {{ Html::style('https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css') }}
        {{ Html::style('bsbmd/css/style.css') }}
        {{ Html::style('bsbmd/css/themes/all-themes.css') }}

         <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">


        @show

    @yield('extra-css')
</head>

<body class="theme-red">
    @include('layouts.partials.loader')
    <div class="overlay"></div>
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')

    <section class="content">
         @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        @if(Route::is('dashboard'))
            @include('layouts.dashboard.index')
        @endif

        @yield('content')
    </section>

    @section('script')
        {{Html::script('bsbmd/plugins/jquery/jquery.min.js')}}
        {{Html::script('bsbmd/plugins/bootstrap/js/bootstrap.js')}}
        {{Html::script('bsbmd/plugins/bootstrap-select/js/bootstrap-select.js')}}
        {{Html::script('bsbmd/plugins/jquery-slimscroll/jquery.slimscroll.js')}}
        {{Html::script('bsbmd/plugins/node-waves/waves.js')}}
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://www.amcharts.com/lib/4/core.js"></script>
        <script src="https://www.amcharts.com/lib/4/charts.js"></script>
        <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

    @show
    @yield('extra-script')
    @section('script-bottom')
        {{Html::script('bsbmd/js/admin.js')}}
        {{Html::script('bsbmd/js/demo.js')}}

    @show
    <script>
         $.extend( $.fn.dataTable.defaults, {
             responsive: true
         } );
 
         $(document).ready(function() {
              $('#example').DataTable();
         } );
    </script>
<!-- Chart code -->
<script>
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

// Increase contrast by taking evey second color
chart.colors.step = 2;

// Add data
chart.data = generateChartData();

// Create axes
var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.minGridDistance = 50;

// Create series
function createAxisAndSeries(field, name, opposite, bullet) {
  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  
  var series = chart.series.push(new am4charts.LineSeries());
  series.dataFields.valueY = field;
  series.dataFields.dateX = "date";
  series.strokeWidth = 2;
  series.yAxis = valueAxis;
  series.name = name;
  series.tooltipText = "{name}: [bold]{valueY}[/]";
  series.tensionX = 0.8;
  
  var interfaceColors = new am4core.InterfaceColorSet();
  
  switch(bullet) {
    case "triangle":
      var bullet = series.bullets.push(new am4charts.Bullet());
      bullet.width = 12;
      bullet.height = 12;
      bullet.horizontalCenter = "middle";
      bullet.verticalCenter = "middle";
      
      var triangle = bullet.createChild(am4core.Triangle);
      triangle.stroke = interfaceColors.getFor("background");
      triangle.strokeWidth = 2;
      triangle.direction = "top";
      triangle.width = 12;
      triangle.height = 12;
      break;
    case "rectangle":
      var bullet = series.bullets.push(new am4charts.Bullet());
      bullet.width = 10;
      bullet.height = 10;
      bullet.horizontalCenter = "middle";
      bullet.verticalCenter = "middle";
      
      var rectangle = bullet.createChild(am4core.Rectangle);
      rectangle.stroke = interfaceColors.getFor("background");
      rectangle.strokeWidth = 2;
      rectangle.width = 10;
      rectangle.height = 10;
      break;
    default:
      var bullet = series.bullets.push(new am4charts.CircleBullet());
      bullet.circle.stroke = interfaceColors.getFor("background");
      bullet.circle.strokeWidth = 2;
      break;
  }
  
  valueAxis.renderer.line.strokeOpacity = 1;
  valueAxis.renderer.line.strokeWidth = 2;
  valueAxis.renderer.line.stroke = series.stroke;
  valueAxis.renderer.labels.template.fill = series.stroke;
  valueAxis.renderer.opposite = opposite;
  valueAxis.renderer.grid.template.disabled = true;
}

createAxisAndSeries("visits", "Visits", false, "circle");
createAxisAndSeries("views", "Views", true, "triangle");
createAxisAndSeries("hits", "Hits", true, "rectangle");

// Add legend
chart.legend = new am4charts.Legend();

// Add cursor
chart.cursor = new am4charts.XYCursor();

// generate some random data, quite different range
function generateChartData() {
  var chartData = [];
  var firstDate = new Date();
  firstDate.setDate(firstDate.getDate() - 100);
  firstDate.setHours(0, 0, 0, 0);

  var visits = 1600;
  var hits = 2900;
  var views = 8700;

  for (var i = 0; i < 15; i++) {
    // we create date objects here. In your data, you can have date strings
    // and then set format of your dates using chart.dataDateFormat property,
    // however when possible, use date objects, as this will speed up chart rendering.
    var newDate = new Date(firstDate);
    newDate.setDate(newDate.getDate() + i);

    visits += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);
    hits += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);
    views += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);

    chartData.push({
      date: newDate,
      visits: visits,
      hits: hits,
      views: views
    });
  }
  return chartData;
}
</script>
</body>

</html>
