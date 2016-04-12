<!DOCTYPE html>
<html>
<head>
<link href="css/extension-page-style.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.widgets.js"></script>

<style>

.code-block-holder pre {
      max-height: 188px;  
      min-height: 188px; 
      overflow: auto;
      border: 1px solid #ccc;
      border-radius: 5px;
}


.tab-btn-holder {
    width: 100%;
    margin: 20px 0 0;
    border-bottom: 1px solid #dfe3e4;
    min-height: 30px;
}

.tab-btn-holder a {
    background-color: #fff;
    font-size: 14px;
    text-transform: uppercase;
    color: #006bb8;
    text-decoration: none;
    display: inline-block;
    *zoom:1; *display:inline;


}

.tab-btn-holder a.active {
    color: #858585;
    padding: 9px 10px 8px;
    border: 1px solid #dfe3e4;
    border-bottom: 1px solid #fff;
    margin-bottom: -1px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    position: relative;
    z-index: 300;
}

</style>

</head>
<body>
	<?php
	include("../src/fusioncharts.php");
	$ganttChart = new FusionCharts("column2d", "ex1" , "100%", "300", "chart-1", "json", '{
            "chart": {
                "caption": "Quarterly revenue",
                "subCaption": "Last year",
                "xAxisName": "Quarter (Click to drill down)",
                "yAxisName": "Revenue (In USD)",
                "numberPrefix": "$",
                "theme": "fint"
            },

            "data": [
                {
                    "label": "Q1",
                    "value": "1950000",
                    "link": "newchart-json-q1"
                },
                {
                    "label": "Q2",
                    "value": "1970000",
                    "link": "newchart-json-q2"
                },
                {
                    "label": "Q3",
                    "value": "1910000",
                    "link": "newchart-json-q3"
                },
                {
                    "label": "Q4",
                    "value": "2120000",
                    "link": "newchart-json-q4"
                }
            ],
            
            "linkeddata": [
                {
                    "id": "q1",
                    "linkedchart": {
                        "chart": {
                            "caption": "Monthly Revenue",
                            "subcaption": "First Quarter",
                            "xAxisName": "Month",
                            "yAxisName": "Revenue (In USD)",
                            "numberPrefix": "$",
                            "theme": "fint"
                        },
                        "data": [
                            {
                                "label": "Jan",
                                "value": "420000"
                            }, {
                                "label": "Feb",
                                "value": "810000"
                            }, {
                                "label": "Mar",
                                "value": "720000"
                            }
                        ]
                    }
                },
                {
                    "id": "q2",
                    "linkedchart": {
                        "chart": {
                            "caption": "Monthly Revenue",
                            "subcaption": "Second Quarter",
                            "xAxisName": "Month",
                            "yAxisName": "Revenue (In USD)",
                            "numberPrefix": "$",
                            "theme": "fint"
                        },
                        "data": [
                            {
                                "label": "Apr",
                                "value": "550000"
                            }, {
                                "label": "May",
                                "value": "910000"
                            }, {
                                "label": "Jun",
                                "value": "510000"
                            }
                        ]
                    }
                },
                {
                    "id": "q3",
                    "linkedchart": {
                        "chart": {
                            "caption": "Monthly Revenue",
                            "subcaption": "Third Quarter",
                            "xAxisName": "Month",
                            "yAxisName": "Revenue (In USD)",
                            "numberPrefix": "$",
                            "theme": "fint"
                        },
                        "data": [
                            {
                                "label": "Jul",
                                "value": "680000"
                            }, {
                                "label": "Aug",
                                "value": "620000"
                            }, {
                                "label": "Sep",
                                "value": "610000"
                            }
                        ]
                    }
                },
                {
                    "id": "q4",
                    "linkedchart": {
                        "chart": {
                            "caption": "Monthly Revenue",
                            "subcaption": "Fourth Quarter",
                            "xAxisName": "Month",
                            "yAxisName": "Revenue (In USD)",
                            "numberPrefix": "$",
                            "theme": "fint"
                        },
                        "data": [
                            {
                                "label": "Oct",
                                "value": "490000"
                            }, {
                                "label": "Nov",
                                "value": "900000"
                            }, {
                                "label": "Dec",
                                "value": "730000"
                            }
                        ]
                    }
                }
            ]
        }');
	// Render the chart
	$ganttChart->render();
?>
<div class="live-chart-wrapper">
<span id="chart-1" class="chart" style="height:500px"><!-- Fusion Charts will render here--></span>

</div>

</body>
</html>


