<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>

    <head>  
        <title>FusionCharts | Chart Theme Sample</title>
        <!-- FusionCharts Library -->
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fint.js"></script>
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.carbon.js"></script>
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.ocean.js"></script>
    </head>

    <body>

        <?php
                $chartData1 = "{  
                    \"chart\": {
                    \"caption\": \"Split of Sales by Product Category\",
                    \"subCaption\": \"5 top performing stores  - last month\",
                    \"plotToolText\": \"<div><b>\$label</b><br/>Product : <b>\$seriesname</b><br/>Sales : <b>\$\$value</b></div>\",
                    \"theme\": \"fusion\"
                    },
                    \"categories\": [{
                      \"category\": [{
                        \"label\": \"Garden Groove harbour\"
                      }, {
                        \"label\": \"Bakersfield Central\"
                      }, {
                        \"label\": \"Los Angeles Topanga\"
                      }, {
                        \"label\": \"Compton-Rancho Dom\"
                      }, {
                        \"label\": \"Daly City Serramonte\"
                      }]
                    }],
                    \"dataset\": [{
                      \"seriesname\": \"Non-Food Products\",
                      \"data\": [{
                        \"value\": \"28800\"
                      }, {
                        \"value\": \"25400\"
                      }, {
                        \"value\": \"21800\"
                      }, {
                        \"value\": \"19500\"
                      }, {
                        \"value\": \"11500\"
                      }]
                    }, {
                      \"seriesname\": \"Food Products\",
                      \"data\": [{
                        \"value\": \"17000\"
                      }, {
                        \"value\": \"19500\"
                      }, {
                        \"value\": \"12500\"
                      }, {
                        \"value\": \"14500\"
                      }, {
                        \"value\": \"17500\"
                      }]
                    }]
                }";

                $chartData2 = "{  
                  \"chart\": {  
                  \"caption\": \"Harry\'s SuperMart\",
                  \"subCaption\": \"Top 5 stores in last month by revenue\",
                  \"theme\": \"fusion\"
                  },
                  \"data\":[  
                  {  
                      \"label\": \"Bakersfield Central\",
                      \"value\": \"880000\"
                  },
                  {  
                      \"label\": \"Garden Groove harbour\",
                      \"value\": \"730000\"
                  },
                  {  
                      \"label\": \"Los Angeles Topanga\",
                      \"value\": \"590000\"
                  },
                  {  
                      \"label\": \"Compton-Rancho Dom\",
                      \"value\": \"520000\"
                  },
                  {  
                      \"label\": \"Daly City Serramonte\",
                      \"value\": \"330000\"
                  }
                  ]
              }";

      // Chart 1
      $Chart1 = new FusionCharts("overlappedcolumn2d", "chart-id-1" , "600", "400", "chart-1", "json", $chartData1);
      
      // Chart 2
      $Chart2 = new FusionCharts("column2d", "chart-id-2" , "600", "400", "chart-2", "json", $chartData2);

      // Render the chart 1
      $Chart1->render();

      // Render the chart 2
      $Chart2->render();

?>
    <script type="text/javascript">
        FusionCharts && FusionCharts.ready(function () {
            var trans = document.getElementById("controllers").getElementsByTagName("input");
            for (var i=0, len=trans.length; i<len; i++) {                
                if (trans[i].type == "radio"){
                    trans[i].onchange = function() {
                        ChangeTheme(this.value);
                    };
                }
            }
        });
        function ChangeTheme(theme) {
            for (var k in FusionCharts.items) {
                if (FusionCharts.items.hasOwnProperty(k)) {
                    FusionCharts.items[k].setChartAttribute('theme', theme);
                }
            }
        };
   </script>

    <h3>Chart Theme Sample</h3>
      <div style="width: 100%; display: table;">
          <div style="display: table-row">
              <div id="chart-1" style="width: 40%; display: table-cell;"><%= getChart1.render() %></div>
              <div id="chart-2" style="width: 40%; display: table-cell;"><%= getChart2.render() %></div>
          </div>
      </div>
      <br/>
      <br/>

      <div align="center">
              <label style="padding: 0px 5px !important;">Select a theme for all charts</label>
      </div>
      <br/>
      <div id="controllers" align="center" style="font-family:'Helvetica Neue', Arial; font-size: 14px;">
          <label style="padding: 0px 5px !important;">
              <input type="radio" name="theme-options" value="fint"/> Fint
          </label>
          <label style="padding: 0px 5px !important;">
              <input type="radio" name="theme-options" value="ocean"/> Ocean
          </label>
          <label style="padding: 0px 5px !important;">
                  <input type="radio" name="theme-options" checked value="fusion"/> Fusion
          </label>
          <label style="padding: 0px 5px !important;">
              <input type="radio" name="theme-options" value="carbon"/> Carbon
          </label>
      </div>
  <br/>
  <br/>
  <a href="../index.php">Go Back</a>
    </body>

    </html>