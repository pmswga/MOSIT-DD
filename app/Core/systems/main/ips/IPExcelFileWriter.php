<?php

namespace App\Core\Systems\Main\IPS;

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class IPExcelFileWriter extends IPExcelFileStreamer
{
    private $excelFilename;
    private $data;

    public function __construct($excelFilename, $data = [])
    {
        if (isset($excelFilename) && !empty($excelFilename)) {
            parent::__construct($excelFilename);
            $this->excelFilename = $excelFilename;
            $this->data = $data;
        }

        $this->cellCoordinates = [
            3 => [
                'work' => '24'
            ],
            4 => [
                'sciWork' => '4',
                'orgWork' => '14'
            ],
            5 => [
                'work' => '3'
            ]
        ];

    }

    /**
     * @inheritDoc
     */
    public function streamSheet1()
    {

    }

    /**
     * @inheritDoc
     */
    public function streamSheet2()
    {

    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function streamSheet3()
    {

    }

    /**
     * @inheritDoc
     */
    public function streamSheet4()
    {
        $this->excelFile->setActiveSheetIndex(3);

        $columns = ['A', 'B', 'D', 'E', 'G', 'N', 'T'];
        $row = $this->cellCoordinates[3]['work'];
        $column = 0;
        foreach ($this->data[3] as $array) {
            $work['num'] = $this->excelFile->getActiveSheet()->getCellByColumnAndRow(1, $column)->getValue();
            if (!preg_match('/ИТОГО/i', $work['num'])) {
                foreach ($array as $value) {
                    $this->excelFile->getActiveSheet()->setCellValue($columns[$column].$row, $value);

                    #print_r($value."-> Coords: ".$columns[$column].$row."<br>");

                    $column++;
                }
            }

            $column = 0;
            $row++;
        }

    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function streamSheet5()
    {
        $this->excelFile->setActiveSheetIndex(4);

        if (count($this->data[4]) > 5) {
            $this->excelFile->getActiveSheet()->insertNewRowBefore(9, count($this->data[4]) - 5);
        }


        $columns = ['A', 'B', 'C', 'D', 'E', 'F'];
        $row = $this->cellCoordinates[4]['sciWork'];
        $column = 0;
        foreach ($this->data[4] as $array) {
            $work['num'] = $this->excelFile->getActiveSheet()->getCellByColumnAndRow(1, $column)->getValue();
            if (!preg_match('/ИТОГО/i', $work['num'])) {
                foreach ($array as $value) {
                    $this->excelFile->getActiveSheet()->setCellValue($columns[$column].$row, $value);

                    print_r($value."-> Coords: ".$columns[$column].$row."<br>");

                    $column++;
                }
            }

            $column = 0;
            $row++;
        }

        echo "<hr>";

        if ( count($this->data[4]) > 5 ) {
            $row = $this->cellCoordinates[4]['sciWork'] + count($this->data[4]) + 5;
        } else {
            $row = $this->cellCoordinates[4]['orgWork'];
        }

        $column = 0;
        foreach ($this->data[5] as $array) {
            $work['num'] = $this->excelFile->getActiveSheet()->getCellByColumnAndRow(1, $column)->getValue();
            if (!preg_match('/ИТОГО/i', $work['num'])) {
                foreach ($array as $value) {
                    $this->excelFile->getActiveSheet()->setCellValue($columns[$column].$row, $value);

                    print_r($value."-> Coords: ".$columns[$column].$row."<br>");

                    $column++;
                }
            }

            $column = 0;
            $row++;
        }


        #dd([]);
    }

    /**
     * @inheritDoc
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function getResult()
    {
        $this->streamSheet4();
        $this->streamSheet5();

        $writer = new Xlsx($this->excelFile);
        $writer->save($this->excelFilename);
    }
}
