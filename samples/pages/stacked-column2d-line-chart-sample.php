<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>

    <head>      
        <title>FusionCharts | Stacked Column 2D Line Chart Sample</title>
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
                      \"showvalues\": \"0\",
                      \"caption\": \"Apple's Revenue & Profit\",
                      \"subCaption\": \"(2013-2016)\",
                      \"numberprefix\": \"$\",
                      \"numberSuffix\" : \"B\",
                      \"plotToolText\" : \"Sales of \$seriesName in \$label was <b>\$dataValue</b>\",
                      \"showhovereffect\": \"1\",
                      \"yaxisname\": \"$ (In billions)\",
                      \"showSum\":\"1\",
                      \"theme\": \"fusion\"
                    },
                    \"categories\": [{
                      \"category\": [{
                        \"label\": \"2013\"
                      }, {
                        \"label\": \"2014\"
                      }, {
                        \"label\": \"2015\"
                      }, {
                        \"label\": \"2016\"
                      }]
                    }],
                    \"dataset\": [{
                      \"seriesname\": \"iPhone\",
                      \"data\": [{
                        \"value\": \"21\"
                      }, {
                        \"value\": \"24\"
                      }, {
                        \"value\": \"27\"
                      }, {
                        \"value\": \"30\"
                      }]
                    }, {
                      \"seriesname\": \"iPad\",
                      \"data\": [{
                        \"value\": \"8\"
                      }, {
                        \"value\": \"10\"
                      }, {
                        \"value\": \"11\"
                      }, {
                        \"value\": \"12\"
                      }]
                    }, {
                      \"seriesname\": \"Macbooks\",
                      \"data\": [{
                        \"value\": \"2\"
                      }, {
                        \"value\": \"4\"
                      }, {
                        \"value\": \"5\"
                      }, {
                        \"value\": \"5.5\"
                      }]
                    }, {
                      \"seriesname\": \"Others\",
                      \"data\": [{
                        \"value\": \"2\"
                      }, {
                        \"value\": \"4\"
                      }, {
                        \"value\": \"9\"
                      }, {
                        \"value\": \"11\"
                      }]
                    }, {
                      \"seriesname\": \"Profit\",
                      \"plotToolText\" : \"Total profit in \$label was <b>\$dataValue</b>\",
                      \"renderas\": \"Line\",
                      \"data\": [{
                        \"value\": \"17\"
                      }, {
                        \"value\": \"19\"
                      }, {
                        \"value\": \"13\"
                      }, {
                        \"value\": \"18\"
                      }]
                    }]
                  }";

      // chart object
      $Chart = new FusionCharts("stackedColumn2DLine", "chart-1" , "600", "400", "chart-container", "json", $chartData);

      // Render the chart
      $Chart->render();

?>
        <h3>Stacked Column 2D with Line Chart</h3>
        <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

    </html>