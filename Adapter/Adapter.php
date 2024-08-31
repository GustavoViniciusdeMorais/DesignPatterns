<?php

class DataProvider
{
	public function exportData():array
	{
		return ['data'];
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

interface ChartInterface
{
	public function buildChart():mixed;
}

class AnalyticsAdapter implements ChartInterface
{
	protected $adaptee;
	protected DataProvider $dataProvider;

	public function __construct($adaptee, $dataProvider)
	{
		$this->adaptee = $adaptee;
		$this->dataProvider = $dataProvider;
	}

	public function convertData($data)
	{
		// code...
		return $data;
	}

	public function buildChart():mixed
	{
		$data = $this->dataProvider->exportData();
		$data = $this->convertData($data);
		return $this->adaptee->buildChart($data);
	}
}

class BusinessClass
{
	protected $chartBuilder;
	
	public function __construct(ChartInterface $chartBuilder)
	{
		$this->chartBuilder = $chartBuilder;
	}
	
	public function buildChart()
	{
		return $this->chartBuilder->buildChart();
	}
}

$analyticsAdapter = new AnalyticsAdapter(new AnalyticsLibrary(), new DataProvider());
$businessClass = new BusinessClass($analyticsAdapter);
$chart = $businessClass->buildChart();
var_dump($chart);
