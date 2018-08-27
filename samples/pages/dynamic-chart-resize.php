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
                            changeSize(this.value);
                        };
                    }
                }
            });
            
            function changeSize(size) {
                document.getElementById('chartContainer').style.width =  size.split('x')[0] + 'px';
                document.getElementById('chartContainer').style.height = size.split('x')[1] + 'px';
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
      $Chart = new FusionCharts("column2d", "chart-1" , "100%", "100%", "chartContainer", "json", $mapData);

      // Render the chart
      $Chart->render();

?>

        <h3>Chart Auto-Resise Sample</h3>
        <div align="center">
            <label style="padding: 0px 5px !important;">Select Chart Container Size (in pixels)</label>
        </div>
        <br/>
        <div id="controllers" align="center" style="font-family:'Helvetica Neue', Arial; font-size: 14px;">
            <label style="padding: 0px 5px !important;">
                <input type="radio" name="div-size" checked value="400x300"/>400x300 
            </label>
            <label style="padding: 0px 5px !important;">
                <input type="radio" name="div-size" value="600x500"/>600x500
            </label>
            <label style="padding: 0px 5px !important;">
                    <input type="radio" name="div-size" value="800x600"/>800x600
            </label>
        </div>
        <br/>
        <br/>
        <br/>
        <div style="width: 100%; display: block;" align="center">
            <div id="chartContainer" style="border-style: solid;border-color:#5a5a5a;width: 400px; height: 300px;">Chart will render here!</div>
        </div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

    </html>