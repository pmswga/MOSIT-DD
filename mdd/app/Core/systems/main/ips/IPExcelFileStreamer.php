<?php

namespace App\Core\Systems\Main\IPS;
use PhpOffice\PhpSpreadsheet\IOFactory;


abstract class IPExcelFileStreamer
{
    protected $excelFile;
    protected $cellCoordinates;
    protected $streamData;

    public function __construct($excelFilename)
    {
        $this->excelFile = IOFactory::load($excelFilename);
    }

    abstract public function streamSheet1();
    abstract public function streamSheet2();
    abstract public function streamSheet3();
    abstract public function streamSheet4();
    abstract public function streamSheet5();

    abstract public function getResult();

}
