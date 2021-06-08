<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

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

//chart 1
$chart1 = new FusionCharts("overlappedcolumn2d", "chart-id-1", "600", "400", "chart-1", "json", $chartData1);

//chart 2
$chart2 = new FusionCharts("column2d", "chart-id-2", "600", "400", "chart-2", "json", $chartData2);

//render the chart 1
$chart1->render();

//render the chart 2
$chart2->render();
