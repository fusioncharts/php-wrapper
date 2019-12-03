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
 ** Download the **[fusioncharts-suite-xt](http://www.fusioncharts.com/)**
 * Unzip the archive and move to "fusioncharts-suite-xt > integrations > php > fusioncharts-wrapper" to get the "fusioncharts.php" file.
 * Copy this file to your project folder.
 * Start using the methods and classes available under the **FusionCharts** namespace to generate charts in your project.
 
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
|chartType | `String` | The type of chart that you intend to plot. e.g. `Column3D`, `Column2D`, `Pie2D`, `TimeSeries` etc.|
|chartId | `String` | Id for the chart, using which it will be recognized in the HTML page. Each chart on the page should have a unique Id.|
|chartWidth | `String` | Intended width for the chart (in pixels). e.g. `400`|
|chartHeight | `String` | Intended height for the chart (in pixels). e.g. `300`|
|containerId | `String` | The id of the chart container. e.g. `chart-1`|
|dataFormat | `String` | Type of data used to render the chart. e.g. `json`, `jsonurl`, `xml`, `xmlurl`|
|dataSource | `Object` | Actual data for the chart as string. e.g. `{"chart":{},"data":[{"label":"Jan","value":"420000"}]}` or FusionTime time-series object|

##### Methods under Chart class
###### **Render**
Public method to generate html code for rendering chart. This function assumes that you've already included the FusionCharts JavaScript library to your page.


### **Event parameters:**
Following parameters can be used in an event in the order they are described.

| Parameter | Type | Description |
|:-------|:----------:| :------|
|eventName | `String` | Which event you want to bind. e.g. `dataLoaded`.|
|funcName | `String` | Javascript function, which is written in your client side code|

More information: https://www.fusioncharts.com/dev/api/fusioncharts/fusioncharts-events

```php
// Creating FC Chart object
$Chart = new FusionCharts("column2d", "chart-1" , "700", "400", "chart-container", "json", $chartData);
// Attach 'dataplotClick' event
$Chart->addEvent("dataplotClick", "onDataplotClick");
// Render the chart
$Chart->render();
```

### **Message parameters:**
let you set and configure custom chart messages. Following parameters can be used in a message in the order they are described.

| Parameter | Type | Description |
|:-------|:----------:| :------|
|messageName | `String` | Message you want to customize. e.g. loadMessage|
|messageValue | `String` | Your custom message|

More information: https://www.fusioncharts.com/dev/chart-attributes/

```php
// Creating FC Chart object
$Chart = new FusionCharts("column2d", "chart-1" , "700", "400", "chart-container", "json", $chartData);
// Attach message with message string.
$Chart->addMessage("loadMessage", "please wait data is being loaded");
// Render the chart
$Chart->render();
```

### **FusionTime:**

**Create the chart object with TimeSeries chart with the required parameters as shown below.**

```php
$fusionTable = new FusionTable($schema, $data);
$timeSeries = new TimeSeries($fusionTable);

// Wrapper constructor parameters
// charttype, chartID, width, height, renderAt, data format, TimeSeries object

$Chart = new FusionCharts("timeseries", "MyFirstChart" , "700", "450", "chart-container", "json", $timeSeries);

// Render the chart
$Chart->render();
```
There are two classes that you need to use in order to create a TimeSeries chart, `FusionTable` and `TimeSeries`.

### **Constructor parameters of FusionTable :**
This class creates `timeseries` compatible `FusionTable` object which later passed to the TimeSeries class constructor.

```php
// Creating FusionTable
$fusionTable = new FusionTable($schema, $data);
```

Let you set the following parameters in FusionTable constructor.

| Parameter | Type | Description |
|:-------|:----------:| :------|
|schema | `String` | The schema which defines the properties of the columns|
|data | `String` | The actual values for each row and column of the DataTable|

### **Data operation:**

FusionTable also supports following DataTable operations:

* Select
* Sort
* Filter
* Pipe

**`Select`** operation should be used only when you want to see few specific columns of the DataTable.

```php
$fusionTable = new FusionTable($schema, $data);

// Column names as parameter
$fusionTable->Select("Country", "Sales");
```

| Parameter | Type | Description |
|:-------|:----------:| :------|
|columnName | `String` | Define multiple columns name.|

**`Sort`** one of the major requirements while working with large sets of data is to sort the data in a specific order - most commonly, ascending or descending.

```php
$fusionTable = new FusionTable($schema, $data);

//column name and orderby
$fusionTable->Sort("Sales", FusionTable.OrderBy.ASC);
```

| Parameter | Type | Description |
|:-------|:----------:| :------|
|columnName | `String` | Define column name on which sorting will be applied.|
|columnOrderBy | `Integer` | To sort the column in descending or ascending order. e.g. `FusionTable.OrderBy.ASC, FusionTable.OrderBy.DESC`|

**`Filter`** comes with a set of operations that you can use to filter data values from a large dataset, based on one or more conditions. Supported filter operations are:

* Equals
* Greater
* GreaterEquals
* Less
* LessEquals
* Between

```php
// Filter - Equal
// Creating filter statement by passing the filter type, column name and filter value
$filter1 = $fusionTable->CreateFilter(FusionTable.FilterType.Equals, "Country", "United States");

//Applying the filter on fusion table
$fusionTable->ApplyFilter($filter1);
```

```php
// Filter - Greater
// Creating filter statement by passing the filter type, column name and filter value
$filter1 = $fusionTable->CreateFilter(FusionTable.FilterType.Greater, "Quantity", 100);

//Applying the filter on fusion table
$fusionTable->ApplyFilter($filter1);
```

```php
// Filter - GreaterEquals
// Creating filter statement by passing the filter type, column name and filter value
$filter1 = $fusionTable->CreateFilter(FusionTable.FilterType.GreaterEquals, "Quantity", 100);

//Applying the filter on fusion table
$fusionTable->ApplyFilter($filter1);
```

```php
// Filter - Less
// Creating filter statement by passing the filter type, column name and filter value
$filter1 = $fusionTable->CreateFilter(FusionTable.FilterType.Less, "Quantity", 100);

//Applying the filter on fusion table
$fusionTable->ApplyFilter($filter1);
```

```php
// Filter - LessEquals
// Creating filter statement by passing the filter type, column name and filter value
$filter1 = $fusionTable->CreateFilter(FusionTable.FilterType.LessEquals, "Quantity", 100);

//Applying the filter on fusion table
$fusionTable->ApplyFilter($filter1);
```

```php
// Filter - Between
// Creating filter statement by passing the filter type, column name and filter value
$filter1 = $fusionTable->CreateFilter(FusionTable.FilterType.Between, "Quantity", 100, 1000);

//Applying the filter on fusion table
$fusionTable->ApplyFilter($filter1);
```

let you set the following parameter of `CreateFilter` method for creating filter statement.

| Parameter | Type | Description |
|:-------|:----------:| :------|
|filterType | `Integer` | Define the filter type. e.g. `FusionTable.FilterType.Equals`, `FusionTable.FilterType.Greater` etc.|
|columnName | `String` | Define column name on which the filter will be applied.|
|values | `Object` | Define filter value(s). e.g. `String`, `Integer` values.|

let you set the following parameter of `ApplyFilter` method for applying the filter on fusion table.

| Parameter | Type | Description |
|:-------|:----------:| :------|
|filter | `String` | Define the `Filter statement`|

```php
// Filter - Apply conditional filter
// Define anonymous function to filter
$fusionTable->ApplyFilterByCondition("(row, columns) => {
                   	return row[columns.Country] === 'USA' ||
                   	(row[columns.Sales] > 100 && row[columns.Shipping_Cost] < 10);
                    }");
```

**`Pipe`**  is an operation which lets you run two or more data operations in a sequence. Instead of applying multiple filters one by one to a DataTable which creates multiple DataTable(s), you can combine them in one single step using pipe and apply to the DataTable. This creates only one DataTable.

```php
$fusionTable = new FusionTable($schema, $data);

// Creating first filter statement by passing the filter type, column name and filter value
$filter1 = $fusionTable->CreateFilter(FusionTable.FilterType.Equals, "Country", "India");

// Creating second filter statement by passing the filter type, column name and filter value
$filter2 = $fusionTable->CreateFilter(FusionTable.FilterType.Greater, "Quantity", 100);

//Applying multiple filters one by one to a DataTable
$fusionTable->Pipe($filter1, $filter2);  
```

| Parameter | Type | Description |
|:-------|:----------:| :------|
|filters | `String` | Define multiple filters.|

### **Constructor parameter of TimeSeries :**
This class creates `timeseries` compatible `TimeSeries` object which later passed to the chart object.

```php
// Creating TimeSeries object
$timeSeries = new TimeSeries($fusionTable);
```

let you set the following parameter in TimeSeries constructor.

| Parameter | Type | Description |
|:-------|:----------:| :------|
|fusionTable | `FusionTable` | The Datatable which defines the schema and actual data (FusionTable).|

#### Methods ####

**`AddAttribute`** is a public method to accept data as a form of JSON string to configure the chart attributes. e.g. `caption`, `subCaption`, `xAxis` etc.

```php

$fusionTable = new FusionTable($schema, $data);
$timeSeries = new TimeSeries($fusionTable);
 
$timeSeries->AddAttribute("caption", "{
                                    	text: ' Online Sales'
                                  	}");
```

let you set the following parameter in `AddAttribute` method.

| Parameter | Type | Description |
|:-------|:----------:| :------|
|key | `String` | The attribute name.|
|value | `String` | Define json formatted value.|

### License

**FUSIONCHARTS:**

Copyright (c) InfoSoft Global Pvt. Ltd.  
License Information at [http://www.fusioncharts.com/license](http://www.fusioncharts.com/license)


