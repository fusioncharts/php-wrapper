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
        <script type="text/javascript">
        
            function updateChart(value) {
                var chartData = "";
                switch (value) {
                    case 'Europe':
                        chartData = {
                                    "chart": {
                                        "caption": "Sales by Country",
                                        "xaxisname": "Country",
                                        "yaxisname": "Total Sales",
                                        "numbersuffix": "K",
                                        "theme": "fusion"
                                    },
                                    "data": [{
                                        "label": "Austria",
                                        "value": "139488"
                                    }, {
                                        "label": "Belgium",
                                        "value": "35132"
                                    }, {
                                        "label": "Denmark",
                                        "value": "34779"
                                    }, {
                                        "label": "Finland",
                                        "value": "19776"
                                    }]
                                }
                        break;
                
                    case 'NA':
                        chartData = {
                                    "chart": {
                                        "caption": "Sales by Country",
                                        "xaxisname": "Country",
                                        "yaxisname": "Total Sales",
                                        "numbersuffix": "K",
                                        "theme": "fusion"
                                    },
                                    "data": [{
                                        "label": "Canada",
                                        "value": "55329",
                                    }, {
                                        "label": "Mexico",
                                        "value": "24072",
                                    }, {
                                        "label": "USA",
                                        "value": "263546",
                                    }]
                                }
                        break;
                    case 'SA':
                        chartData = {
                                "chart": {
                                    "caption": "Sales by Country",
                                    "xaxisname": "Country",
                                    "yaxisname": "Total Sales",
                                    "numbersuffix": "K",
                                    "theme": "fusion"
                                },
                                "data": [{
                                    "label": "Argentina",
                                    "value": "8119"
                                }, {
                                    "label": "Brazil",
                                    "value": "114954"
                                }, {
                                    "label": "Venezuela",
                                    "value": "60806"
                                }]
                        }
                        break;
                } // switch ends
                FusionCharts.items["chartTwo"].setJSONData(chartData);
            }
    </script>
    </head>

    <body>

        <?php
            $chartData = "{
                \"chart\":
                {  
                    \"caption\": \"Sales by Region\",
                    \"xaxisname\": \"Region\",
                    \"yaxisname\": \"Total Sales\",
                    \"numbersuffix\": \"K\",
                    \"theme\": \"fusion\"
                },
                \"data\": [{
                    \"label\": \"Europe\",
                    \"value\": \"827508\",
                    \"link\": \"j-updateChart-Europe\"
                }, {
                    \"label\": \"North America\",
                    \"value\": \"342947\",
                    \"link\": \"j-updateChart-NA\"
                }, {
                    \"label\": \"South America\",
                    \"value\": \"183881\",
                    \"link\": \"j-updateChart-SA\"
                }]
            }";

            $secondChartData = "{
                \"chart\":
                {                      
                }
            }";

      // chart object
      $Chart = new FusionCharts("column2d", "ex1", '600', '400', "chart-1", "json", $chartData);

      // second chart object
      $secChart = new FusionCharts("column2d", "chartTwo", '600', '400', "chart-2", "json", $secondChartData);

      // Render the chart
      $Chart->render();
      $secChart->render();

?>
    <h3>Updating Different Chart</h3>
    <table style="width: 100%;" >
        <tr>
            <td>
                <div id="chart-1">Chart will render here!</div>
            </td>
            <td>
                <span>Click on the left chart to update this one</span>
                <div id="chart-2">Chart will render here!</div>
            </td>
        </tr>
    </table> 
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>

    </body>

    </html>