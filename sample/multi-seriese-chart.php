<!DOCTYPE html>
<html>
<head>
<link href="css/extension-page-style.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
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
$columnChart = new FusionCharts("msbar2d", "ex1" , "100%", 400, "chart-1", "json", '{
            "chart": {
                "caption": "Split of Sales by Product Category",
                "subCaption": "In top 5 stores last month",
                "yAxisname": "Sales (In USD)",
                "numberPrefix": "$",
                "paletteColors": "#0075c2,#1aaf5d",
                "bgColor": "#ffffff",
                "showBorder": "0",
                "showHoverEffect":"1",
                "showCanvasBorder": "0",
                "usePlotGradientColor": "0",
                "plotBorderAlpha": "10",
                "legendBorderAlpha": "0",
                "legendShadow": "0",
                "placevaluesInside": "1",
                "valueFontColor": "#ffffff",
                "showXAxisLine": "1",
                "xAxisLineColor": "#999999",
                "divlineColor": "#999999",               
                "divLineIsDashed": "1",
                "showAlternateVGridColor": "0",
                "subcaptionFontBold": "0",
                "subcaptionFontSize": "14"
            },            
            "categories": [
                {
                    "category": [
                        {
                            "label": "Bakersfield Central"
                        }, 
                        {
                            "label": "Garden Groove harbour"
                        }, 
                        {
                            "label": "Los Angeles Topanga"
                        }, 
                        {
                            "label": "Compton-Rancho Dom"
                        }, 
                        {
                            "label": "Daly City Serramonte"
                        }
                    ]
                }
            ],            
            "dataset": [
                {
                    "seriesname": "Food Products",
                    "data": [
                        {
                            "value": "17000"
                        }, 
                        {
                            "value": "19500"
                        }, 
                        {
                            "value": "12500"
                        }, 
                        {
                            "value": "14500"
                        }, 
                        {
                            "value": "17500"
                        }
                    ]
                }, 
                {
                    "seriesname": "Non-Food Products",
                    "data": [
                        {
                            "value": "25400"
                        }, 
                        {
                            "value": "29800"
                        }, 
                        {
                            "value": "21800"
                        }, 
                        {
                            "value": "19500"
                        }, 
                        {
                            "value": "11500"
                        }
                    ]
                }
            ],
            "trendlines": [
                {
                    "line": [
                        {
                            "startvalue": "15000",
                            "color": "#0075c2",
                            "valueOnRight": "1",
                            "displayvalue": "Avg. for{br}Food"
                        },
                        {
                            "startvalue": "22000",
                            "color": "#1aaf5d",
                            "valueOnRight": "1",
                            "displayvalue": "Avg. for{br}Non-food"
                        }
                    ]
                }
            ]
        }');
// Render the chart
$columnChart->render();
?>
<div id="chart-1"><!-- Fusion Charts will render here--></div>
 
</body>
</html>