<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>

    <head>
        <title>FusionCharts | USA Map</title>
        <!-- FusionCharts Library -->
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
        <!--
            <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.gammel.js"></script>
            <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.zune.js"></script>
            <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.carbon.js"></script>
            <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.ocean.js"></script>
        -->
        <script type="text/javascript">
            FusionCharts && FusionCharts.ready(function () {
                var trans = document.getElementById("controllers").getElementsByTagName("input");
                for (var i=0, len=trans.length; i<len; i++) {                
                    if (trans[i].type == "radio"){
                        trans[i].onchange = function() {
                            changeChartType(this.value);
                        };
                    }
                }
            });
            
            function changeChartType(chartType) {
                for (var k in FusionCharts.items) {
                    if (FusionCharts.items.hasOwnProperty(k)) {
                        FusionCharts.items[k].chartType(chartType);
                    }
                }
            };
        </script>
    </head>

    <body>

        <?php
                $mapData = "{
                    \"chart\":
                    {  
                        \"caption\": \"Countries With Most Oil Reserves [2017-18]\",
                        \"subcaption\": \"In MMbbl = One Million barrels\",
                        \"xaxisname\": \"Country\",
                        \"yaxisname\": \"Reserves (MMbbl)\",
                        \"numbersuffix\": \"K\",
                        \"theme\": \"fusion\"
                        },
                        \"data\": [{
                        \"label\": \"Venezuela\",
                        \"value\": \"290\"
                    }, {
                        \"label\": \"Saudi\",
                        \"value\": \"260\"
                    }, {
                        \"label\": \"Canada\",
                        \"value\": \"180\"
                    }, {
                        \"label\": \"Iran\",
                        \"value\": \"140\"
                    }, {
                        \"label\": \"Russia\",
                        \"value\": \"115\"
                    }, {
                        \"label\": \"UAE\",
                        \"value\": \"100\"
                    }, {
                        \"label\": \"US\",
                        \"value\": \"30\"
                    }, {
                        \"label\": \"China\",
                        \"value\": \"30\"
                    }]
                  }";

      // chart object
      $Chart = new FusionCharts("column2d", "chart-1" , "600", "350", "chartContainer", "json", $mapData);

      // Render the chart
      $Chart->render();

?>

        <h3>Dynamic Chart Type Change</h3>
        <div align="center">
            <label style="padding: 0px 5px !important;">Select The Chart Type</label>
        </div>
        <br/>
        <div id="controllers" align="center" style="font-family:'Helvetica Neue', Arial; font-size: 14px;">
            <label style="padding: 0px 5px !important;">
                <input type="radio" name="div-size" checked value="column2d"/>Column 2D 
            </label>
            <label style="padding: 0px 5px !important;">
                <input type="radio" name="div-size" value="pie3d"/>Pie 3D
            </label>
            <label style="padding: 0px 5px !important;">
                    <input type="radio" name="div-size" value="bar2d"/>Bar 2D
            </label>
        </div>
        <br/>
        <br/>
        <br/>
        <div style="width: 100%; display: block;" align="center">
            <div id="chartContainer">Chart will render here!</div>
        </div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

    </html>