<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>

    <head>  
        <title>FusionCharts | Simple Widget Using Array</title>
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
            // Widget appearance configuration
            $arrChartConfig = array(
                "chart" => array(
                "caption" => "Nordstorm's Customer Satisfaction Score for 2017",
                "lowerLimit" => "0",
                "upperLimit" => "100",
                "showValue" => "1",
                "numberSuffix" => "%",
                "theme" => "fusion",
                "showToolTip" => "0"
                )
            );

            // Widget color range data
            $colorDataObj = array("color" => array(
                    ["minValue" => "0", "maxValue" => "50", "code" => "#F2726F"], 
                    ["minValue" => "50", "maxValue" => "75", "code" => "#FFC533"],
                    ["minValue" => "75", "maxValue" => "100", "code" => "#62B58F"]
                ));

            // Dial array     
            $dial = array();
                    
            // Widget dial data in array format, multiple values can be separated by comma e.g. ["81", "23", "45",...]
            $widgetDialDataArray = array("81");
            for($i = 0; $i < count($widgetDialDataArray); $i++) {
                array_push($dial,array("value" => $widgetDialDataArray[$i]));
            }

            $arrChartConfig["colorRange"] = $colorDataObj;
            $arrChartConfig["dials"] = array( "dial" => $dial);

            // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
            $jsonEncodedData = json_encode($arrChartConfig);

            // Widget object
            $Widget = new FusionCharts("angulargauge", "MyFirstWidget" , "400", "250", "widget-container", "json", $jsonEncodedData);

            // Render the Widget
            $Widget->render();

?>
        <h3>Simple Widget Using Array</h3>
        <div id="widget-container">Widget will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

    </html>