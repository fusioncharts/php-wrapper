<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>

    <head>
        <title>FusionCharts | Angular Gauge</title>
        <!-- FusionCharts Library -->
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    <!--
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.gammel.js"></script>
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.zune.js"></script>
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.carbon.js"></script>
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.ocean.js"></script>
    -->
    </head>

    <body>

        <?php
                $gaugeData = "{
                    \"chart\": {
                        \"caption\": \"Nordstorm's Customer Satisfaction Score for 2017\",
                        \"lowerLimit\": \"0\",
                        \"upperLimit\": \"100\",
                        \"showValue\": \"1\",
                        \"numberSuffix\": \"%\",
                        \"theme\": \"fusion\",
                        \"showToolTip\": \"0\"
                    },
                    \"colorRange\": {
                        \"color\": [{
                            \"minValue\": \"0\",
                            \"maxValue\": \"50\",
                            \"code\": \"#F2726F\"
                        }, {
                            \"minValue\": \"50\",
                            \"maxValue\": \"75\",
                            \"code\": \"#FFC533\"
                        }, {
                            \"minValue\": \"75\",
                            \"maxValue\": \"100\",
                            \"code\": \"#62B58F\"
                        }]
                    },
                    \"dials\": {
                        \"dial\": [{
                            \"value\": \"81\"
                        }]
                    }
                }";

      // chart object
      $Chart = new FusionCharts("angulargauge", "angulargauge-1" , "600", "400", "angulargauge-container", "json", $gaugeData);

      // Render the chart
      $Chart->render();

?>
        <h3>Angular Gauge</h3>
        <div id="angulargauge-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

    </html>