<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>

    <head> 
        <title>FusionCharts | Pie 3D Chart</title>
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
                      \"caption\": \"Recommended Portfolio Split\",
                      \"subCaption\" : \"For a net-worth of $1M\",
                      \"showValues\":\"1\",
                      \"showPercentInTooltip\" : \"0\",
                      \"numberPrefix\" : \"$\",
                      \"enableMultiSlicing\":\"1\",
                      \"theme\": \"fusion\"
                    },
                    \"data\": [{
                      \"label\": \"Equity\",
                      \"value\": \"300000\"
                    }, {
                      \"label\": \"Debt\",
                      \"value\": \"230000\"
                    }, {
                      \"label\": \"Bullion\",
                      \"value\": \"180000\"
                    }, {
                      \"label\": \"Real-estate\",
                      \"value\": \"270000\"
                    }, {
                      \"label\": \"Insurance\",
                      \"value\": \"20000\"
                    }]
                  }";

      // chart object
      $Chart = new FusionCharts("pie3d", "chart-1" , "600", "400", "chart-container", "json", $chartData);

      // Render the chart
      $Chart->render();

?>
        <h3>Pie 3D Chart</h3>
        <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

    </html>