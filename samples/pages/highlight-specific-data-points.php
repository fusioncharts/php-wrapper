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
                $chartData = "{
                    \"chart\":
                    {  
                       \"caption\": \"Bakersfield Central - Total footfalls\",
                       \"subCaption\": \"Last week\",
                       \"xAxisName\": \"Day\",
                       \"yAxisName\": \"No. of Visitors (In 1000s)\",
                       \"showValues\": \"0\",
                       \"theme\": \"fusion\"
                    },
                    \"annotations\":{
                       \"groups\": [
                           {
                               \"id\": \"anchor-highlight\",
                               \"items\": [
                                   {
                                       \"id\": \"high-star\",
                                       \"type\": \"circle\",
                                       \"x\": \"\$\dataset.0.set.2.x\",
                                       \"y\": \"\$\dataset.0.set.2.y\",
                                       \"radius\": \"12\",
                                       \"color\": \"#6baa01\",
                                       \"border\": \"2\",
                                       \"borderColor\": \"#f8bd19\"
                                   },
                                   {
                                       \"id\": \"label\",
                                       \"type\": \"text\",
                                       \"text\": \"Highest footfall 25.5K\",
                                       \"fillcolor\": \"#6baa01\",
                                       \"rotate\": \"90\",
                                       \"x\": \"\$\dataset.0.set.2.x+75\",
                                       \"y\": \"\$\dataset.0.set.2.y-2\"
                                   }
                               ]
                           }
                       ]
                   },
                    \"data\": [
                       {
                           \"label\": \"Mon\",
                           \"value\": \"15123\"
                       },
                       {
                           \"label\": \"Tue\",
                           \"value\": \"14233\"
                       },
                       {
                           \"label\": \"Wed\",
                           \"value\": \"25507\"
                       },
                       {
                           \"label\": \"Thu\",
                           \"value\": \"9110\"
                       },
                       {
                           \"label\": \"Fri\",
                           \"value\": \"15529\"
                       },
                       {
                           \"label\": \"Sat\",
                           \"value\": \"20803\"
                       },
                       {
                           \"label\": \"Sun\",
                           \"value\": \"19202\"
                       }
                   ]
      }";

      // chart object
      $Chart = new FusionCharts("spline", "chart-1" , "600", "400", "chart-container", "json", $chartData);

      // Render the chart
      $Chart->render();

?>
    <h3>Highlight specific data points through API</h3>
    <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>

    </body>

    </html>