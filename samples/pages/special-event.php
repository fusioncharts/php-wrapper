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
            function onUpdate(eventObj) {
                document.getElementById("dataUpdate").innerHTML = "previous value: " + eventObj.data.prevData;          
            }
        </script>
    </head>

    <body>

        <?php
        $chartData ="{  
            \"chart\": { 
                \"caption\": \"Server CPU Utilization\", 
                \"subcaption\": \"food.hsm.com\", 
                \"lowerLimit\": \"0\", 
                \"upperLimit\": \"100\", 
                \"numberSuffix\": \"%\", 
                \"valueAbovePointer\": \"0\", 
                \"editmode\":\"1\" 
            }, 
            \"colorRange\": { 
                \"color\": [ 
                    { 
                        \"minValue\": \"0\", 
                        \"maxValue\": \"35\", 
                        \"label\": \"Low\", 
                        \"code\": \"#1aaf5d\"
                    }, { 
                        \"minValue\": \"35\", 
                        \"maxValue\": \"70\", 
                        \"label\": \"Moderate\", 
                        \"code\": \"#f2c500\"
                    }, { 
                        \"minValue\": \"70\",
                        \"maxValue\": \"100\",
                        \"label\": \"High\",
                        \"code\": \"#c02d00\" 
                    } ] 
                }, 
                \"pointers\": 
                { 
                    \"pointer\": [{
                        \"value\": \"72.5\" 
                    }]
                }
       }";
       
        // chart object
        $Chart = new FusionCharts("hlineargauge", "chart-1" , "600", "400", "chart-container", "json", $chartData);

        # Attach event with method name
        $Chart->addEvent("realtimeUpdateComplete", "onUpdate");

        // Render the chart
        $Chart->render();

?>
    <h3>Example of event(interactive event)</h3>
    <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <div>
            <p id ="dataUpdate"></p>
        </div>
        <br/>
        <a href="../index.php">Go Back</a>

    </body>

    </html>