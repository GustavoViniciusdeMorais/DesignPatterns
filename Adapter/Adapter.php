<?php

class DataProvider
{
	public function exportData():array
	{
		return ['data'];
	}
}

class BusinessClass
{
	protected $dataProvider;
	protected $chartBuilder;
	
	public function __construct($dataProvider,ChartInterface $chartBuilder)
	{
		$this->dataProvider = $dataProvider;
		$this->chartBuilder = $chartBuilder;
	}
	
	public function buildChart()
	{
		$data = $this->dataProvider->exportData();
		return $this->chartBuilder->buildChart($data);
	}
}

interface ChartInterface
{
	public function buildChart(array $data):mixed;
}

class AnalyticsAdapter implements ChartInterface
{
	protected $adaptee;
	public function __construct($adaptee)
	{
		$this->adaptee = $adaptee;
	}
	public function buildChart(array $data):mixed
	{
		$data = $this->convertData($data);
		return $this->adaptee->buildChart($data);
	}
	public function convertData($data)
	{
		// code...
		return $data;
	}
}

class AnalyticsLibrary
{
	public function buildChart(array $data)
	{
		// code...
		return $data;
	}
}

$dataProvider = new DataProvider();
$analyticsAdapter = new AnalyticsAdapter(new AnalyticsLibrary());
$businessClass = new BusinessClass($dataProvider, $analyticsAdapter);
$chart = $businessClass->buildChart();
var_dump($chart);
