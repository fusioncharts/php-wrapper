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
                \"chart\": {
                    \"caption\": \"سوبرماركت هاري\",
                    \"subCaption\": \"الإيرادات الشهرية للعام الماضي\",
                    \"xAxisName\": \"الشهر\",
                    \"yAxisName\": \"كمية\",
                    \"numberPrefix\": \"$\",
                    \"theme\": \"fusion\",
                    \"rotateValues\": \"1\",
                    \"exportEnabled\": \"1\"
                },
                \"data\": [
                    {
                        \"label\": \"يناير\",
                        \"value\": \"420000\"
                    },
                    {
                        \"label\": \"فبراير\",
                        \"value\": \"810000\"
                    },
                    {
                        \"label\": \"مارس\",
                        \"value\": \"720000\"
                    },
                    {
                        \"label\": \"أبريل\",
                        \"value\": \"550000\"
                    },
                    {
                        \"label\": \"مايو\",
                        \"value\": \"910000\"
                    },
                    {
                        \"label\": \"يونيو\",
                        \"value\": \"510000\"
                    },
                    {
                        \"label\": \"يوليو\",
                        \"value\": \"680000\"
                    },
                    {
                        \"label\": \"أغسطس\",
                        \"value\": \"620000\"
                    },
                    {
                        \"label\": \"سبتمبر\",
                        \"value\": \"610000\"
                    },
                    {
                        \"label\": \"أكتوبر\",
                        \"value\": \"490000\"
                    },
                    {
                        \"label\": \"نوفمبر\",
                        \"value\": \"900000\"
                    },
                    {
                        \"label\": \"ديسمبر\",
                        \"value\": \"730000\"
                    }
                ]
        }";

      // chart object
      $Chart = new FusionCharts("column2d", "chart-1" , "600", "400", "chart-container", "json", $chartData);

      // Render the chart
      $Chart->render();

?>
    <h3>Different language example</h3>
    <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>

    </body>

    </html>