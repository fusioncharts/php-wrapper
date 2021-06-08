<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

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

//chart object
$chart = new FusionCharts("stackedColumn2DLine", "chart-1", "600", "400", "chart-container", "json", $chartData);

//render the chart
$chart->render();
