<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>

    <head>
        <title>FusionCharts | Angular Gauge</title>
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
        updateData = function () {
           var value = document.getElementById("dial-val").value;
           FusionCharts("angulargauge-1").setDataForId("dial1",value);
       }
    </script>
    </head>

    <body>

        <?php
                $gaugeData = "{
                    \"chart\": { 
                        \"caption\": \"Customer Satisfaction Score\", 
                        \"subcaption\": \"Los Angeles Topanga\", 
                        \"plotToolText\": \"Current Score: \$value\", 
                        \"theme\": \"fint\", 
                        \"chartBottomMargin\": \"50\", 
                        \"showValue\": \"1\" 
                    }, 
                    \"colorRange\": { 
                        \"color\": [{ 
                            \"minValue\": \"0\", 
                            \"maxValue\": \"45\", 
                            \"code\": \"#e44a00\"
                        }, { 
                            \"minValue\": \"45\", 
                            \"maxValue\": \"75\", 
                            \"code\": \"#f8bd19\" 
                        }, { 
                            \"minValue\": \"75\", 
                            \"maxValue\": \"100\", 
                            \"code\": \"#6baa01\" 
                        }] 
                    }, 
                    \"dials\": { 
                        \"dial\": [{ 
                            \"value\": \"70\", 
                            \"id\": \"dial1\" 
                        }] 
                    }
                }";

      // chart object
      $Chart = new FusionCharts("angulargauge", "angulargauge-1" ,"450", "270", "angulargauge-container", "json", $gaugeData);

      // Render the chart
      $Chart->render();

?>
        <h3>Update data at runtime</h3>
        <div id="angulargauge-container">Chart will render here!</div>
        <br/>
        <div>
            <label for="dial-val">Input dial value</label>
            <input name="dial-val" id="dial-val" type= "number"/>
            <input type ="button" name ="update dial" value ="update dial"onclick ="updateData()" />
        </div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

</html>