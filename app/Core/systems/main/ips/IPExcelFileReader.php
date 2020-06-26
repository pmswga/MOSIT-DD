<?php

namespace App\Core\Systems\Main\IPS;

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Exception;

/**
 * @class IPExcelFileReader
 * @brief Класс реализующий методы обработки EXCEL-файла индивидуального плана из системы Тандем для чтения.
 * Считывает данные из EXCEL-файла
 *
 * @package App\Core\Systems\Main\IPS;
 */
class IPExcelFileReader extends IPExcelFileStreamer
{

    /**
     * Конструктор.
     * @param $excelFilename - путь к файлу
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function __construct($excelFilename)
    {
        if (isset($excelFilename) && !empty($excelFilename)) {
            parent::__construct($excelFilename);
        }

        $this->cellCoordinates = [
            0 => [
                'startYearA' => 'BW12',
                'startYearB' => 'CA12',
                'endYearA' => 'FE12',
                'endYearB' => 'FI12',

                'institute' => 'A26',
                'faculty'   => 'CJ26',
                'teacherPost' => 'Q27',
                'degree'    => 'AH28',
                'initials'  => 'A29'
            ],
            1 => [
                'subjects' => '6'
            ],
            2 => [
                'subjects' => '5'
            ],
            3 => [
                'work' => '24',
                'columns' => ['A', 'B', 'D', 'E', 'G', 'N', 'T'],
                'sum' => 'Y29'
            ],
            4 => [
                'work' => '4',
                'columns' => ['A', 'B', 'C', 'D', 'E', 'F']
            ],
            6 => [
                'workSum1' => 0,
                'workSum2' => 0,
                'workSum3' => 0,
                'sum' => 0
            ]
        ];

    }

    /**
     * Обрабатывает первый лист ИП
     * @return void
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function streamSheet1()
    {
        $this->excelFile->setActiveSheetIndex(0);

        $startYearA = $this->excelFile->getActiveSheet()->getCell($this->cellCoordinates[0]['startYearA'])->getValue();
        $startYearB = $this->excelFile->getActiveSheet()->getCell($this->cellCoordinates[0]['startYearB'])->getValue();
        $endYearA = $this->excelFile->getActiveSheet()->getCell($this->cellCoordinates[0]['endYearA'])->getValue();
        $endYearB = $this->excelFile->getActiveSheet()->getCell($this->cellCoordinates[0]['endYearB'])->getValue();

        $this->streamData[0]['educationYear'] =
            $startYearA.$startYearB.'/'.
            $endYearA.$endYearB;

        $this->streamData[0]['institute'] = $this->excelFile->getActiveSheet()->getCell('A26')->getValue();
        $this->streamData[0]['faculty'] = $this->excelFile->getActiveSheet()->getCell('CJ26')->getValue();

        $post = $this->excelFile->getActiveSheet()->getCell('Q27')->getValue();

        preg_match('/Старший преподаватель|Ассистент|Преподаватель|Доцент|Профессор/i', $post, $matches); // #fixme Add check from list_teacher_post
        if ($matches) {
            $this->streamData[0]['teacherPost'] = $matches[0];
        }

        preg_match('/штатный|внешний|внутренний/', $post, $matches);
        if ($matches) {
            $this->streamData[0]['rateType'] = $matches[0];
        }

        preg_match('/[0|1][,|.][0-9][0|5]/', $post, $matches);
        if ($matches) {
            $this->streamData[0]['rateValue'] = str_replace(',', '.', $matches[0]);
        }

        $initials = $this->excelFile->getActiveSheet()->getCell('A29')->getValue();
        $this->streamData[0]['initials'] = $initials;

        $initials = explode(' ', $initials);

        $this->streamData[0]['secondName']  = $initials[0];
        $this->streamData[0]['firstName']  = $initials[1];
        if (array_key_exists(2, $initials)) {
            $this->streamData[0]['patronymic'] = $initials[2];
        }
    }

    /**
     * Обрабатывает второй лист ИП
     * @return void
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function streamSheet2()
    {
        $this->excelFile->setActiveSheetIndex(1);

        $highestRow = $this->excelFile->getActiveSheet()->getHighestRow('A');

        $subjects = [];
        for ($row = $this->cellCoordinates[1]['subjects']; $row < $highestRow-1; $row++) {
            $value = $this->excelFile->getActiveSheet()->getCell('A' . $row)->getValue();

            if ($value) {
                $subjects[] = $value;
            }
        }

        $this->streamData[1]['subjects'] = $subjects;
    }

    /**
     * Обрабатывает третий лист ИП
     * @return void
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function streamSheet3()
    {
        $this->excelFile->setActiveSheetIndex(2);
        $highestRow = $this->excelFile->getActiveSheet()->getHighestRow('A');

        $subjects = [];
        for ($row = $this->cellCoordinates[2]['subjects']; $row < $highestRow-1; $row++) {
            $value = $this->excelFile->getActiveSheet()->getCell('A' . $row)->getValue();

            if ($value) {
                $subjects[] = $value;
            }
        }

        $this->streamData[2]['subjects'] = $subjects;
    }

    /**
     * Обрабатывает четвёртый лист ИП
     * @return void
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function streamSheet4()
    {
        $this->excelFile->setActiveSheetIndex(3);
        $highestRow = $this->excelFile->getActiveSheet()->getHighestRow('A');

        $works = [];
        for ($row = $this->cellCoordinates[3]['work'], $column = $row; $row < $highestRow; $row++, $column++) {
            $work = [];

            $work['num'] = $this->excelFile->getActiveSheet()->getCell('A' . $column)->getValue();
            $work['caption'] = $this->excelFile->getActiveSheet()->getCell('B' . $column)->getValue();
            $work['plan'] = $this->excelFile->getActiveSheet()->getCell('D' . $column)->getValue();
            $work['real'] = $this->excelFile->getActiveSheet()->getCell('E' . $column)->getValue();
            $work['finish'] = $this->excelFile->getActiveSheet()->getCell('G' . $column)->getValue();
            $work['finishDatePlan'] = $this->excelFile->getActiveSheet()->getCell('N' . $column)->getFormattedValue();
            $work['finishDateReal'] = $this->excelFile->getActiveSheet()->getCell('T' . $column)->getFormattedValue();

            if (
                $work['caption'] and
                $work['plan'] and
                $work['finish']
            ) {
                $works[] = $work;
            }
        }

        $this->streamData[3]['eduWorkSum'] = $this->excelFile->getActiveSheet()->getCell('Y19')->getCalculatedValue() ?? 0;
        $this->streamData[3]['eduMetWorkSum'] = $this->excelFile->getActiveSheet()->getCell('D' . $highestRow)->getCalculatedValue() ?? 0;
        $this->streamData[3]['work'] = $works;
    }

    /**
     * Обрабатывает пяттый лист ИП
     * @return void
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function streamSheet5()
    {
        $this->excelFile->setActiveSheetIndex(4);

        $highestRow = $this->excelFile->getActiveSheet()->getHighestRow('A');

        $sciWorks = [];
        $orgWorks = [];
        $isOrgWork = false;
        $checkWork = function ($work) {
            return
                ((is_int(intval($work['num'])) and intval($work['num']) !== 0) or empty($work['num'])) and
                $work['caption'] and
                ((is_int(intval($work['plan'])) or intval($work['plan']) === 0));
        };

        for ($row = $this->cellCoordinates[4]['work'], $column = $row, $i = 0; $row < $highestRow; $row++, $column++) {
            $work = [];

            $work['num'] = $this->excelFile->getActiveSheet()->getCell('A' . $column)->getValue();
            $work['caption'] = $this->excelFile->getActiveSheet()->getCell('B' . $column)->getValue();
            $work['plan'] = $this->excelFile->getActiveSheet()->getCell('C' . $column)->getValue();
            $work['real'] = $this->excelFile->getActiveSheet()->getCell('D' . $column)->getValue() ?? 0;
            $work['finishDatePlan'] = $this->excelFile->getActiveSheet()->getCell('E' . $column)->getFormattedValue()
                ? $this->excelFile->getActiveSheet()->getCell('E' . $column)->getFormattedValue() : '-';
            $work['finishDateReal'] =
                $this->excelFile->getActiveSheet()->getCell('F' . $column)->getFormattedValue()
                ? $this->excelFile->getActiveSheet()->getCell('F' . $column)->getFormattedValue() : '-';

            if (preg_match('/ИТОГО/i', $work['num'])) {
                if ($isOrgWork) {
                    if (!isset($this->streamData[4]['orgWorkSum'])) {
                        $this->streamData[4]['orgWorkSum'] = $this->excelFile->getActiveSheet()->getCell('C' . $row)->getFormattedValue() ?? 0;
                    }
                } else {
                    if (!isset($this->streamData[4]['sciWorkSum'])) {
                        $this->streamData[4]['sciWorkSum'] = $this->excelFile->getActiveSheet()->getCell('C' . $row)->getFormattedValue() ?? 0;
                    }
                }
            }

            if (preg_match('/Раздел IV/i', $work['num'])) {
                $isOrgWork = true;
            }

            if ($isOrgWork) {
                if ($checkWork($work)) {
                    $orgWorks[] = $work;
                }
            } else {
                if ($checkWork($work)) {
                    $sciWorks[] = $work;
                }
            }
        }

        $reCounter = function ($array) {
            $i = 1;
            foreach ($array as &$item) {
                if (empty($item['num'])) {
                    $item['num'] = $i;
                }

                $i++;
            }

            return $array;
        };

        $sciWorks = $reCounter($sciWorks);
        $orgWorks = $reCounter($orgWorks);

        $this->streamData[4]['work_1'] = $sciWorks;
        $this->streamData[4]['work_2'] = $orgWorks;
    }

    /**
     * Вызывает методы для чтения содержимого из файла
     * @return array
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function getResult()
    {
        $this->streamSheet2();
        $this->streamSheet1();
        $this->streamSheet3();
        $this->streamSheet4();
        $this->streamSheet5();

        $this->streamData[4]['workSum1'] = $this->streamData[3]['eduWorkSum'];
        $this->streamData[4]['workSum2'] = $this->streamData[3]['eduMetWorkSum'];
        $this->streamData[4]['workSum3'] = $this->streamData[4]['sciWorkSum'];
        $this->streamData[4]['workSum4'] = $this->streamData[4]['orgWorkSum'];
        $this->streamData[4]['sum'] =
            $this->streamData[3]['eduWorkSum'] + $this->streamData[3]['eduMetWorkSum'] +
            $this->streamData[4]['sciWorkSum'] + $this->streamData[4]['orgWorkSum'];

        return $this->streamData;
    }

}
