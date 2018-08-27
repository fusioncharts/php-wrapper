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
        <script>
            function onRenderComplete(eventObj) {
                var formattedNumber = eventObj.sender.formatNumber(1234.5);
                document.getElementById("rendered").innerHTML = "Number format of 1234.5 : " + formattedNumber;
                
            }
        </script>
    </head>

    <body>

        <?php
        $chartData ="{  
            \"chart\":
             {  
                \"caption\": \"Countries With Most Oil Reserves [2017-18]\",
                \"subCaption\": \"In MMbbl = One Million barrels\",
                \"xAxisName\": \"Country\",
                \"yAxisName\": \"Reserves (MMbbl)\",
                \"numberSuffix\": \"K\",
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
        $Chart = new FusionCharts("column2d", "chart-1" , "700", "400", "chart-container", "json", $chartData);

        // Attach message with message string.
        $Chart->addEvent("renderComplete", "onRenderComplete");

        // Render the chart
        $Chart->render();

?>
    <h3>Example of event(Number format)</h3>
    <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <div>
            <p id ="rendered"></p>
        </div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>

    </body>

    </html>