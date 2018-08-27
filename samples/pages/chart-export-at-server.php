<!DOCTYPE html>
<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>

    <head>     
        <title>FusionCharts | Export Chart As Image (server-side)</title>
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
                      \"caption\": \"Salary Hikes by Country\",
                      \"subCaption\": \"2016 - 2017\",
                      \"exportEnabled\": \"1\",
                      \"exportMode\": \"server\",
                      \"theme\": \"fusion\"
                  },
                  \"categories\": [{
                      \"category\": [{
                      \"label\": \"Australia\"
                      }, {
                      \"label\": \"New-Zealand\"
                      }, {
                      \"label\": \"India\"
                      }, {
                      \"label\": \"China\"
                      }, {
                      \"label\": \"Myanmar\"
                      }, {
                      \"label\": \"Bangladesh\"
                      }, {
                      \"label\": \"Thailand\"
                      }, {
                      \"label\": \"South Korea\"
                      }, {
                      \"label\": \"Hong Kong\"
                      }, {
                      \"label\": \"Singapore\"
                      }, {
                      \"label\": \"Taiwan\"
                      }, {
                      \"label\": \"Vietnam\"
                      }]
                  }],
                  \"dataset\": [{
                      \"seriesName\": \"2016 Actual Salary Increase\",
                      \"plotToolText\": \"Salaries increased by <b>\$dataValue</b> in 2016\",
                      \"data\": [{
                      \"value\": \"3\"
                      }, {
                      \"value\": \"3\"
                      }, {
                      \"value\": \"10\"
                      }, {
                      \"value\": \"7\"
                      }, {
                      \"value\": \"7.4\"
                      }, {
                      \"value\": \"10\"
                      }, {
                      \"value\": \"5.4\"
                      }, {
                      \"value\": \"4.5\"
                      }, {
                      \"value\": \"4.1\"
                      }, {
                      \"value\": \"4\"
                      }, {
                      \"value\": \"3.7\"
                      }, {
                      \"value\": \"9.3\"
                      }]
                  }, {
                      \"seriesName\": \"2017 Projected Salary Increase\",
                      \"plotToolText\": \"Salaries expected to increase by <b>\$dataValue</b> in 2017\",
                      \"renderAs\": \"line\",
                      \"data\": [{
                      \"value\": \"3\"
                      }, {
                      \"value\": \"2.8\"
                      }, {
                      \"value\": \"10\"
                      }, {
                      \"value\": \"6.9\"
                      }, {
                      \"value\": \"6.7\"
                      }, {
                      \"value\": \"9.4\"
                      }, {
                      \"value\": \"5.5\"
                      }, {
                      \"value\": \"5\"
                      }, {
                      \"value\": \"4\"
                      }, {
                      \"value\": \"4\"
                      }, {
                      \"value\": \"4.5\"
                      }, {
                      \"value\": \"9.8\"
                      }]
                  }, {
                      \"seriesName\": \"Inflation rate\",
                      \"plotToolText\": \"\$dataValue projected inflation\",
                      \"renderAs\": \"area\",
                      \"showAnchors\": \"0\",
                      \"data\": [{
                      \"value\": \"1.6\"
                      }, {
                      \"value\": \"0.6\"
                      }, {
                      \"value\": \"5.6\"
                      }, {
                      \"value\": \"2.3\"
                      }, {
                      \"value\": \"7\"
                      }, {
                      \"value\": \"5.6\"
                      }, {
                      \"value\": \"0.2\"
                      }, {
                      \"value\": \"1\"
                      }, {
                      \"value\": \"2.6\"
                      }, {
                      \"value\": \"0\"
                      }, {
                      \"value\": \"1.1\"
                      }, {
                      \"value\": \"2.4\"
                      }]
                  }]
                }";

      
                
      // chart object
      $Chart = new FusionCharts("mscombi3d", "chart-1" , "700", "400", "chart-container", "json", $chartData);

      // Render the chart
      $Chart->render();
?>



    <h3>Export Chart As Image (server-side)</h3>
    <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

</html>