<?php

namespace DesignPatterns;

abstract class DataMining
{
    final public function processFile($path)
    {
        $rawFile = $this->openFile($path);
        $rawData = $this->readContent($rawFile);
        $analisys = $this->analizeContent($rawData);
        $reportContent = $this->mountReport($analisys);
        return $this->sendReport($reportContent);
    }
    abstract public function openFile($path);
    abstract public function readContent($rawFile);
    abstract public function analizeContent($rawData);
    abstract public function mountReport($analisys);
    abstract public function sendReport($reportContent);
}

class PDFDataMining extends DataMining
{
    public function openFile($path)
    {
        // code ...
    }
    public function readContent($rawFile)
    {
        // code ...
    }
    public function analizeContent($rawData)
    {
        // code ...
    }
    public function mountReport($analisys)
    {
        // code ...
    }
    public function sendReport($reportContent)
    {
        // code ...
    }
}