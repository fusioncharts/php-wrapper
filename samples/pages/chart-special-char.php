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
        $xmlData = "<chart caption=\"Harry&apos;s SuperMart\" subcaption=\"Monthly revenue for last year\" xaxisname=\"Month\" yaxisname=\"Amount\" numberprefix=\"¥\" theme=\"fusion\" rotatevalues=\"1\" exportenabled=\"1\">";
        $xmlData .= "<set label=\"Jan\" value=\"420000\" />";
        $xmlData .= "<set label=\"Feb\" value=\"810000\" />";
        $xmlData .= "<set label=\"Mar\" value=\"720000\" />";
        $xmlData .= "<set label=\"Apr\" value=\"550000\" />";
        $xmlData .= "<set label=\"May\" value=\"910000\" />";
        $xmlData .= "<set label=\"Jun\" value=\"510000\" />";
        $xmlData .= "<set label=\"Jul\" value=\"680000\" />";
        $xmlData .= "<set label=\"Aug\" value=\"620000\" />";
        $xmlData .= "<set label=\"Sep\" value=\"610000\" />";
        $xmlData .= "<set label=\"Oct\" value=\"490000\" />";
        $xmlData .= "<set label=\"Nov\" value=\"900000\" />";
        $xmlData .= "<set label=\"Dec\" value=\"730000\" />";
        $xmlData .= "</chart>";
        
      // chart object
      $Chart = new FusionCharts("column2d", "chart-1" , "600", "400", "chart-container", "xml", $xmlData);

      // Render the chart
      $Chart->render();

?>
    <h3>Chart using special character in XML data format</h3>
    <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>

    </body>

    </html>