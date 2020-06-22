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

    public function clearSheet5()
    {
        $columns = ['A', 'B', 'C', 'D', 'E', 'F'];
        $row = $this->cellCoordinates[4]['sciWork'];

        $countOfSciWorkCell = 0;
        $countOfOrgWorkCell = 0;

        $num = '';
        while (!preg_match('/ИТОГО/i', $num)) {
            $num = $this->excelFile->getActiveSheet()->getCell('A'.$row)->getValue();

            if (!preg_match('/ИТОГО/i', $num)) {
                foreach ($columns as $column) {
                    $this->excelFile->getActiveSheet()->setCellValue($column.$row, '');
                }

                $countOfSciWorkCell++;
            }

            $row++;
        }

        $num = '';
        $row += 4;
        while (!preg_match('/ИТОГО/i', $num)) {
            $num = $this->excelFile->getActiveSheet()->getCell('A'.$row)->getValue();

            if (!preg_match('/ИТОГО/i', $num)) {
                foreach ($columns as $column) {
                    $this->excelFile->getActiveSheet()->setCellValue($column.$row, '');
                }

                $countOfOrgWorkCell++;
            }

            $row++;
        }

        return ['sciWorks' => $countOfSciWorkCell, 'orgWorks' => $countOfOrgWorkCell];
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function streamSheet5()
    {
        $this->excelFile->setActiveSheetIndex(4);
        $counts = $this->clearSheet5();


        $highestRow = $this->excelFile->getActiveSheet()->getHighestRow();

        $isOrgWork = false;

        $countOfSciWorks = count($this->data[4]);
        $countOfOrgWorks = count($this->data[5]);

        $needAddSciWorks = 0;
        if ($countOfSciWorks > $counts['sciWorks']) {
            $needAddSciWorks = $countOfSciWorks - $counts['sciWorks'];
        }

        $needAddOrgWorks = 0;
        if ($countOfOrgWorks > $counts['orgWorks']) {
            $needAddOrgWorks = $countOfOrgWorks - $counts['orgWorks'];
        }

        for ($row = $this->cellCoordinates[4]['sciWork'], $column = $row; $row < $highestRow; $row++, $column++) {
            $work['num'] = $this->excelFile->getActiveSheet()->getCellByColumnAndRow(1, $column)->getValue();

            if (preg_match('/Раздел IV/i', $work['num'])) {
                $isOrgWork = true;
                $row += 3;
            }

            $work = $isOrgWork ? current($this->data[5]) : current($this->data[4]);

            if ($work) {

                if ($isOrgWork) {
                    if ($needAddOrgWorks > 0) {
                        $this->excelFile->getActiveSheet()->insertNewRowBefore($row, 1);
                        $needAddOrgWorks--;
                    }

                } else {
                    if ($needAddSciWorks > 0) {
                        $this->excelFile->getActiveSheet()->insertNewRowBefore($row, 1);
                        $needAddSciWorks--;
                    }

                }

                if (array_key_exists(0, $work)) {
                    $this->excelFile->getActiveSheet()->setCellValue('A'.$row, $work[0]);
                }
                if (array_key_exists(1, $work)) {
                    $this->excelFile->getActiveSheet()->setCellValue('B'.$row, $work[1]);
                }
                if (array_key_exists(2, $work)) {
                    $this->excelFile->getActiveSheet()->setCellValue('C'.$row, $work[2]);
                }
                if (array_key_exists(3, $work)) {
                    $this->excelFile->getActiveSheet()->setCellValue('D'.$row, $work[3]);
                }
                if (array_key_exists(4, $work)) {
                    $this->excelFile->getActiveSheet()->setCellValue('E'.$row, $work[4]);
                }
                if (array_key_exists(5, $work)) {
                    $this->excelFile->getActiveSheet()->setCellValue('F'.$row, $work[5]);
                }

            }

            $isOrgWork ? next($this->data[5]) : next($this->data[4]);
        }

    }

    /**
     * @inheritDoc
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     * @throws Exception
     */
    public function getResult()
    {
        $this->streamSheet4();
        $this->streamSheet5();

        $writer = new Xlsx($this->excelFile);
        $writer->save($this->excelFilename);
    }
}
