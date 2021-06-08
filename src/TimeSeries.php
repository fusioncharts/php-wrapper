<?php

namespace FusionCharts\PhpWrapper;

class TimeSeries
{
    /**
     * @var null
     */
    private $fusionTableObject = null;

    /**
     * @var array
     */
    private $attributesList = [];

    /**
     * TimeSeries constructor.
     *
     * @param $fusionTable
     */
    function __construct($fusionTable)
    {
        $this->fusionTableObject = $fusionTable;
    }

    /**
     * @param $key
     * @param $value
     */
    function AddAttribute($key, $value)
    {
        $attribute = [];
        $attribute[$key] = $value;
        array_push($this->attributesList, $attribute);
    }

    /**
     * @return string
     */
    function GetDataSource()
    {
        $stringData = '';

        foreach ($this->attributesList as $attribute) {
            $attribKey = key($attribute);
            $stringData .= sprintf('%s:%s,', $attribKey, $attribute[$attribKey]) . "\r\n";
        }

        $stringData .= sprintf('%s:%s', 'data', 'fusionTable');

        return "{" . "\r\n" . $stringData . "\r\n" . "}";
    }

    /**
     * @return mixed
     */
    function GetDataStore()
    {
        return $this->fusionTableObject->GetDataTable();
    }
}
