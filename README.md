# FusionCharts PHP Wrapper

### What is FusionCharts PHP wrapper?

FusionCharts Suite XT uses JavaScript to generate charts in the browser. Where using this PHP server side wrapper you can create charts in your PHP website without writing any Javascript code. 

### How does the wrapper work?
Charts are generated in the browsers with the help of JavaScript and the HTML code.
Using this PHP wrapper we can generate the required JavaScript and HTML code as a string in the server. We can put this strings in the page to generate charts.

### Version
1.0

### Requirements
PHP 5 or higher

### Installation
 * Include FusionCharts.php in your project.
 * Start using methods and classes available under **"FusionCharts.Charts"** namespace to generate Charts in your project.
 
### Usage
##### Chart Class (FusionCharts)
Represent the FusionCharts class that can be initialized to create a chart.
###### **Constructor parameters:**
Following parameters can be used in the constructor in the order as they are described. Some parameters are optional. This function assumes that you've already included the FusionCharts JavaScript library in your page.

| Parameter | Type | Description |
|:-------|:----------:| :------|
| chartType | `String` | The type of chart that you intend to plot. e.g. `Column3D`, `Column2D`, `Pie2D` etc.|
|chartId | `String` | Id for the chart, using which it will be recognized in the HTML page. Each chart on the page needs to have a unique Id.|
|chartWidth | `String` | Intended width for the chart (in pixels). e.g. `400`|
|chartHeight | `String` | Intended height for the chart (in pixels). e.g. `300`|
|dataFormat | `String` | Type of the data that is given to the chart. e.g. `json`, `jsonurl`, `xml`, `xmlurl`|
|dataSource | `String` | Actual data for the chart. e.g. `{"chart":{},"data":[{"label":"Jan","value":"420000"}]}`|

##### Methods under Chart class
###### **Render**
Public method to generate html code for rendering chart. This function assumes that you've already included the FusionCharts JavaScript library in your page.

###License

**FUSIONCHARTS:**

Copyright (c) FusionCharts Technologies LLP  
License Information at [http://www.fusioncharts.com/license](http://www.fusioncharts.com/license)
