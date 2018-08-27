<!DOCTYPE html>
<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>
    <head>
        <title>FusionCharts | Export Chart As Image (client-side)</title>
        <style>
            input[type=radio], input[type=checkbox] {
                display:none;
            }

            input[type=radio] + label, input[type=checkbox] + label {
                display:inline-block;
                margin:-2px;
                padding: 4px 12px;
                margin-bottom: 0;
                font-size: 14px;
                line-height: 20px;
                color: #333;
                text-align: center;
                text-shadow: 0 1px 1px rgba(255,255,255,0.75);
                vertical-align: middle;
                cursor: pointer;
                background-color: #f5f5f5;
                background-image: -moz-linear-gradient(top,#fff,#e6e6e6);
                background-image: -webkit-gradient(linear,0 0,0 100%,from(#fff),to(#e6e6e6));
                background-image: -webkit-linear-gradient(top,#fff,#e6e6e6);
                background-image: -o-linear-gradient(top,#fff,#e6e6e6);
                background-image: linear-gradient(to bottom,#fff,#e6e6e6);
                background-repeat: repeat-x;
                border: 1px solid #ccc;
                border-color: #e6e6e6 #e6e6e6 #bfbfbf;
                border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
                border-bottom-color: #b3b3b3;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff',endColorstr='#ffe6e6e6',GradientType=0);
                filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
                -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
                -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
                box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
            }

            input[type=radio]:checked + label, input[type=checkbox]:checked + label{
                background-image: none;
                outline: 0;
                -webkit-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
                -moz-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
                box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
                    background-color:#e0e0e0;
            }
        </style>
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
             track = function(){
                FusionCharts.addEventListener("dataplotclick", clickHandler);
                document.getElementById("message").innerHTML = "Click on the plot to see the value along with the label";
            };
            clickHandler = function(e){
                document.getElementById("message").innerHTML = "You have clicked on plot <b>"+  e.data.categoryLabel + "</b> whose value is <b>" + e.data.displayValue + "</b>";
            };
            reset = function(){
                FusionCharts.removeEventListener("dataplotclick", clickHandler);
                document.getElementById("message").innerHTML = "Click the below buttons to add an event dynamically to the chart";
            }
   </script>
    </head>

    <body>

        <?php
        $chartData ="{  
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
        $Chart = new FusionCharts("column2d", "chart-1" , "700", "400", "chart-container", "json", $chartData);

        // Render the chart
        $Chart->render();

?>
    <h3>Add/Remove event at runtime(Chart instance level API)</h3>
    <div align="center" id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <div>
            <p align="center" id ="message"></p>
        </div>

        <div id="controllers" align="center" style="font-family:'Helvetica Neue', Arial; font-size: 14px;">
        <input type="radio" id="radio1" name="radios" onClick="track()">
        <label for="radio1">LISTEN TO DATAPLOTCLICK EVENT</label>
        <input type="radio" id="radio2" name="radios"value="false" onClick="reset()">
        <label for="radio2">REMOVE DATAPLOTCLICK EVENT</label>
        </div> 

        <br/>
        <br/>
        <a href="../index.php">Go Back</a>

    </body>

    </html>