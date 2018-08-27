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
            plotClickHandler = function(event){
                clickedPlot = (event.data.categoryLabel).toLowerCase();
                    if (selectedItem !== clickedPlot) {
                        selectedItem = clickedPlot;
                    } else{
                        selectedItem = 'none';
                    }
            };
            selectedItem = "none";
            getFusionChart = function(){
                return FusionCharts("chart-1");
            }

            noneChecked = function(){
                    getFusionChart().slicePlotItem(0,false);
                    getFusionChart().slicePlotItem(1,false);
                    getFusionChart().slicePlotItem(2,false);
                    getFusionChart().slicePlotItem(3,false);
            }
            apacheChecked = function(){
                    getFusionChart().slicePlotItem(0,true);
            }
            microsoftChecked = function(){
                    getFusionChart().slicePlotItem(1,true);
            }
            zeusChecked = function(){
                    getFusionChart().slicePlotItem(2,true);
            }
            otherChecked = function(){
                    getFusionChart().slicePlotItem(3,true);
            }
   </script>
    </head>

    <body>

        <?php
        $chartData ="{  
            \"chart\": 
            { 
                \"caption\": \"Market Share of Web Servers\",
                \"plottooltext\": \"<b>\$percentValue</b> of web servers run on \$label servers\",
                \"showLegend\": \"0\",
                \"enableMultiSlicing\": \"0\",
                \"showPercentValues\": \"1\",
                \"legendPosition\": \"bottom\",
                \"useDataPlotColorForLabels\": \"1\",
                \"theme\": \"fusion\"
            },
            \"data\": [{ 
                    \"label\": \"Apache\",
                    \"value\": \"32647479\"
                }, { 
                    \"label\": \"Microsoft\", 
                    \"value\": \"22100932\" 
                }, { 
                    \"label\": \"Zeus\", 
                    \"value\": \"14376\" 
                }, { 
                    \"label\": \"Other\",
                    \"value\": \"18674221\" 
            }]
       }";
       
        // chart object
        $Chart = new FusionCharts("pie2d", "chart-1" , "700", "400", "chart-container", "json", $chartData);

        // Attach message with message string.
        $Chart->addEvent("dataplotClick", "plotClickHandler");

        // Render the chart
        $Chart->render();

?>
    <h3>Example of event(SpecialChartType API)</h3>
    <div align="center" id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <div id="controllers" align="center" style="font-family:'Helvetica Neue', Arial; font-size: 14px;">
            <label style="padding: 0px 5px !important;">
                <input type="radio" name="rdGrp-options" checked onClick="noneChecked()"/> None
            </label>
            <label style="padding: 0px 5px !important;">
                <input type="radio" name="rdGrp-options" onClick="apacheChecked()"/> Apache
            </label>
            <label style="padding: 0px 5px !important;">
                    <input type="radio" name="rdGrp-options" onClick="microsoftChecked()"/> Microsoft
            </label>
            <label style="padding: 0px 5px !important;">
                <input type="radio" name="rdGrp-options" onClick="zeusChecked()"/> Zeus
            </label>
            <label style="padding: 0px 5px !important;">
                <input type="radio" name="rdGrp-options" onClick="otherChecked()"/> Other
            </label>        
        </div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>

    </body>

    </html>