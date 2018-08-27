<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>

    <head>    
        <title>FusionCharts | Multiseries Column 2D Sample</title>
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
                $chartData = "{
                    \"chart\": {
                      \"caption\": \"App Publishing Trend\",
                      \"subCaption\": \"2012-2016\",
                      \"xAxisName\": \"Years\",
                      \"yAxisName\" : \"Total number of apps in store\",
                      \"formatnumberscale\": \"1\",
                      \"drawCrossLine\":\"1\",
                      \"plotToolText\" : \"<b>\$dataValue</b> apps on \$seriesName in \$label\",
                              \"theme\": \"fusion\"
                    },
              
                    \"categories\": [{
                      \"category\": [{
                        \"label\": \"2012\"
                      }, {
                        \"label\": \"2013\"
                      }, {
                        \"label\": \"2014\"
                      }, {
                        \"label\": \"2015\"
                      },{
                      \"label\": \"2016\"
                      }
                      ]
                    }],
                    \"dataset\": [{
                      \"seriesname\": \"iOS App Store\",
                      \"data\": [{
                        \"value\": \"125000\"
                      }, {
                        \"value\": \"300000\"
                      }, {
                        \"value\": \"480000\"
                      }, {
                        \"value\": \"800000\"
                      }, {
                        \"value\": \"1100000\"
                      }]
                    }, {
                      \"seriesname\": \"Google Play Store\",
                      \"data\": [{
                        \"value\": \"70000\"
                      }, {
                        \"value\": \"150000\"
                      }, {
                        \"value\": \"350000\"
                      }, {
                        \"value\": \"600000\"
                      },{
                        \"value\": \"1400000\"
                      }]
                    }, {
                      \"seriesname\": \"Amazon AppStore\",
                      \"data\": [{
                        \"value\": \"10000\"
                      }, {
                        \"value\": \"100000\"
                      }, {
                        \"value\": \"300000\"
                      }, {
                        \"value\": \"600000\"
                      },{
                        \"value\": \"900000\"
                      }]
                    }]
                  }";

      // chart object
      $Chart = new FusionCharts("mscolumn2d", "chart-1" , "700", "400", "chart-container", "json", $chartData);

      // Render the chart
      $Chart->render();

?>

        <h3>Multiseries Column 2D Chart</h3>
        <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

    </html>