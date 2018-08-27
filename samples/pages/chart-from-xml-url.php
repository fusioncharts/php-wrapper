<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>

    <head>    
        <title>FusionCharts | Chart using data from XML URL</title>
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

      // chart object
      $Chart = new FusionCharts("column2d", "chart-1" , "700", "400", "chart-container", "xmlurl", "data/data.xml");

      // Render the chart
      $Chart->render();

?>
        <h3>Chart using data from XML URL</h3>
        <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

    </html>