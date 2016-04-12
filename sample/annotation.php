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
	$annotationChart = new FusionCharts("column2d", "ex1" , "100%", "300", "chart-1", "json", '{
            "chart": {
                "caption": "Top 4 Chocolate Brands Sold",
                "subCaption": "Last Year",
                "xAxisName": "Brand",
                "yAxisName": "Amount (In USD)",
                "yAxisMaxValue": "120000",
                "numberPrefix": "$",
                "theme": "fint",
                "PlotfillAlpha" :"0",
                "placeValuesInside" : "0",
                "rotateValues" : "0",
                "valueFontColor" : "#333333"
                
            },
            "annotations": {
                "width": "500",
                "height": "300",
                "autoScale": "1",
                "groups": [
                    {
                        "id": "user-images",
                        "xScale_" : "20",
                        "yScale_" : "20",
                        "items": [
                            {
                                "id": "butterFinger-icon",
                                "type": "image",
                                "url": "http://static.fusioncharts.com/sampledata/images/butterFinger.png",
                                "x": "$xaxis.label.0.x - 30",
                                "y": "$canvasEndY - 150",
                                "xScale" : "50",
                                "yScale" : "40",
                            },
                            {
                                "id": "tom-user-icon",
                                "type": "image",
                                "url": "http://static.fusioncharts.com/sampledata/images/snickrs.png",
                                "x": "$xaxis.label.1.x - 26",
                                "y": "$canvasEndY - 141",
                                "xScale" : "48",
                                "yScale" : "38"
                            },
                            {
                                "id": "Milton-user-icon",
                                "type": "image",
                                "url": "http://static.fusioncharts.com/sampledata/images/coffee_crisp.png",
                                "x": "$xaxis.label.2.x - 22",
                                "y": "$canvasEndY - 134",
                                "xScale" : "43",
                                "yScale" : "36"
                            },
                            {
                                "id": "Brian-user-icon",
                                "type": "image",
                                "url": "http://static.fusioncharts.com/sampledata/images/100grand.png",
                                "x": "$xaxis.label.3.x - 22",
                                "y": "$canvasEndY - 131",
                                "xScale" : "43",
                                "yScale" : "35"
                            }
                        ]
                    }
                ]
            },
            "data": [
                {
                    "label": "Butterfinger",
                    "value": "92000"
                }, 
                {
                    "label": "Snickers",
                    "value": "87000"
                }, 
                {
                    "label": "Coffee Crisp",
                    "value": "83000"
                }, 
                {
                    "label": "100 Grand",
                    "value": "80000"
                }
            ]
        }');
	// Render the chart
	$annotationChart->render();
?>
<div class="live-chart-wrapper">
<span id="chart-1" class="chart" style="height:500px"><!-- Fusion Charts will render here--></span>

</div>

</body>
</html>


