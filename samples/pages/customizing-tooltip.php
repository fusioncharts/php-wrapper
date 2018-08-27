<!DOCTYPE html>
<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>
    <head>
        <title>FusionCharts | Export Chart As Image (client-side)</title>
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
        $chartData ="{  
            \"chart\": {
                   \"caption\": \"Top 3 Electronic Brands in Top 3 Revenue Earning States\",
                   \"subcaption\": \"Last month\",
                   \"aligncaptiontocanvas\": \"0\",
                   \"yaxisname\": \"Statewise Sales (in %)\",
                   \"xaxisname\": \"Brand\",
                   \"numberprefix\": \"$\",
                   \"showxaxispercentvalues\": \"1\",
                   \"showsum\": \"1\",
                   \"showPlotBorder\": \"1\",
                   \"plottooltext\": \"<div id='nameDiv' style='font-size: 14px; border-bottom: 1px dashed #666666; font-weight:bold; padding-bottom: 3px; margin-bottom: 5px; display: inline-block;'>\$label :</div>{br}State: <b>\$seriesName</b>{br}Sales : <b>\$dataValue</b>{br}Market share in State : <b>\$percentValue</b>{br}Overall market share of \$label: <b>\$xAxisPercentValue</b>\",
                   \"theme\": \"fusion\"
               },
               \"categories\": [
                   {
                       \"category\": [
                           {
                               \"label\": \"Bose\"
                           },
                           {
                               \"label\": \"Dell\"
                           },
                           {
                               \"label\": \"Apple\"
                           }
                       ]
                   }
               ],
               \"dataset\": [
                   {
                       \"seriesname\": \"California\",
                       \"data\": [
                           {
                               \"value\": \"335000\"
                           },
                           {
                               \"value\": \"225100\"
                           },
                           {
                               \"value\": \"164200\"
                           }
                       ]
                   },
                   {
                       \"seriesname\": \"Washington\",
                       \"data\": [
                           {
                               \"value\": \"215000\"
                           },
                           {
                               \"value\": \"198000\"
                           },
                           {
                               \"value\": \"120000\"
                           }
                       ]
                   },
                   {
                       \"seriesname\": \"Nevada\",
                       \"data\": [
                           {
                               \"value\": \"298000\"
                           },
                           {
                               \"value\": \"109300\"
                           },
                           {
                               \"value\": \"153600\"
                           }
                       ]
                   }
               ]
       }";
       
      // chart object
      $Chart = new FusionCharts("marimekko", "chart-1" , "600", "400", "chart-container", "json", $chartData);

      // Render the chart
      $Chart->render();

?>
    <h3>Customizing tooltip</h3>
    <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>

    </body>

    </html>