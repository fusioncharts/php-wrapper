# FusionCharts PHP Wrapper

### What is FusionCharts PHP wrapper?

The FusionCharts PHP server-side wrapper lets you create charts in your PHP website without writing any JavaScript code.

### How does this wrapper work?
Conventionally, FusionCharts Suite XT uses JavaScript and HTML to generate charts in the browser. The PHP wrapper lets you generate the required JavaScript and HTML code as a string on the server. This string is then used to render charts on a browser page.

### Version
1.0

### Requirements
PHP 5 or higher

### Installation
 * Download the **[`PHP wrapper package`](http://www.fusioncharts.com/php-charts/)**
 * Unzip the archive and move to "wrappers 2/php-wrapper/" to get the main class file "fusioncharts.php"
 * Include "fusioncharts.php" in your project(Check **[the usage guide](#usage-guide)** for details).
 * Start using the methods and classes available under the **FusionCharts.Charts** namespace to generate charts in your project.. 
 
**Note : FusionCharts JS libraries should already be installed within your project in order to work with this wrapper.**

### Usage Guide

#### Installing FusionCharts JS libraries in your page where you want to display FusionCharts
There are two ways you can install FusionCharts JS libray in your project
* Using FusionCharts CDN
* Using library files placed in the folder of your project

**Using FusionCharts CDN**

Write a script tag in the <head> section of the page where you want to add the source of the FusionCharts library link from the official CDN:
```html
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
```
**Using library files placed in a folder of your project**

You can download the **[`trial version`](http://www.fusioncharts.com/download/)** of FusionCharts.

Assuming you have the FusionCharts library placed inside the folder "fusioncharts" in your project, now write a script tag in the <head> section of the page where you add the src of FusionCharts libary link from local folder
```html
<script type="text/javascript" src="fusioncharts/fusioncharts.js"></script>
```
Now, you are ready to prepare the chart using our PHP-wrapper.
#### Using the wrapper
#### Step 1:
**Include the wrapper file (`fusioncharts.php`) to your PHP page:**
```php
    include("fusioncharts.php");
```
#### Step 2:
**Create the chart object with needed info as shown below. For details about the constructor and it's parameters check [constructor parameters](#constructor-parameters)**
```php
    $columnChart = new FusionCharts(
			"column2d", 
			"ex1" , 
			"600", 
			"400", 
			"chart-1", 
			"json", 
			'{  
			   "chart":
			   {  
				  "caption":"Harry\'s SuperMart",
				  "subCaption":"Top 5 stores in last month by revenue",
				  "numberPrefix":"$",
				  "theme":"ocean"
			   },
			   "data":
			   [  
				  {  
					 "label":"Bakersfield Central",
					 "value":"880000"
				  },
				  {  
					 "label":"Garden Groove harbour",
					 "value":"730000"
				  },
				  {  
					 "label":"Los Angeles Topanga",
					 "value":"590000"
				  },
				  {  
					 "label":"Compton-Rancho Dom",
					 "value":"520000"
				  },
				  {  
					 "label":"Daly City Serramonte",
					 "value":"330000"
				  }
			   ]
		}');
```
#### Step 3:
**Add a chart container div with provided id**
```html
<div id="chart1"></div>
```
#### Step 4:
**Render the chart**
```php
$columnChart->render();
```

### **Constructor parameters:**
Following parameters can be used in a constructor in the order they are described. Some parameters are optional. This function assumes that you've already included the FusionCharts JavaScript library to your page.

| Parameter | Type | Description |
|:-------|:----------:| :------|
| chartType | `String` | The type of chart that you intend to plot. e.g. `Column3D`, `Column2D`, `Pie2D` etc.|
|chartId | `String` | Id for the chart, using which it will be recognized in the HTML page. Each chart on the page should have a unique Id.|
|chartWidth | `String` | Intended width for the chart (in pixels). e.g. `400`|
|chartHeight | `String` | Intended height for the chart (in pixels). e.g. `300`|
|containerId | `String` | The id of the chart container. e.g. `chart-1`|
|dataFormat | `String` | Type of data used to render the chart. e.g. `json`, `jsonurl`, `xml`, `xmlurl`|
|dataSource | `String` | Actual data for the chart. e.g. `{"chart":{},"data":[{"label":"Jan","value":"420000"}]}`|

##### Methods under Chart class
###### **Render**
Public method to generate html code for rendering chart. This function assumes that you've already included the FusionCharts JavaScript library to your page.


### License

**FUSIONCHARTS:**

Copyright (c) FusionCharts Technologies LLP  
License Information at [http://www.fusioncharts.com/license](http://www.fusioncharts.com/license)


