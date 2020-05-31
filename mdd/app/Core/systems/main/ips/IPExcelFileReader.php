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
                'sum' => 'Y29'
            ],
            4 => [
                'work' => '4'
            ],
            5 => [
                'work' => '3'
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

        preg_match('/штатный|внешний/', $post, $matches);
        if ($matches) {
            $this->streamData[0]['rateType'] = $matches[0];
        }

        preg_match('/[0|1][,|.][0-9][0|5]/', $post, $matches);
        if ($matches) {
            $this->streamData[0]['rateValue'] = $matches[0];
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

        $value = '';
        $cell = '6';

        while (!preg_match('/ИТОГО/i', $value)) {
            $value = $this->excelFile->getActiveSheet()->getCellByColumnAndRow(1, $cell)->getValue();
            if (!empty($value) && $value != 'ИТОГО ЗА ОСЕННИЙ СЕМЕСТР') {
                $this->streamData[1]['subjects'][] = $value;
            }

            $cell += 2;
        }

    }

    /**
     * Обрабатывает третий лист ИП
     * @return void
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function streamSheet3()
    {
        $this->excelFile->setActiveSheetIndex(2);

        $value = '';
        $cell = '5';

        while (!preg_match('/ИТОГО/i', $value)) {
            $value = $this->excelFile->getActiveSheet()->getCellByColumnAndRow(1, $cell)->getValue();
            if (!empty($value) && $value != 'ИТОГО ЗА ВЕСЕННИЙ СЕМЕСТР') {
                $this->streamData[2]['subjects'][] = $value;
            }

            $cell += 2;
        }
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
        for ($row = 24, $column = $row; $row <= $highestRow; $row++, $column++) {
            $work = [];

            $work['num'] = $this->excelFile->getActiveSheet()->getCellByColumnAndRow(1, $column)->getValue();
            $work['caption'] = $this->excelFile->getActiveSheet()->getCellByColumnAndRow(2, $column)->getValue();
            $work['plan'] = $this->excelFile->getActiveSheet()->getCell('D' . $column)->getValue();
            $work['real'] = $this->excelFile->getActiveSheet()->getCell('E' . $column)->getValue();
            $work['finish'] = $this->excelFile->getActiveSheet()->getCell('G' . $column)->getValue();
            $work['finishDatePlan'] = $this->excelFile->getActiveSheet()->getCell('N' . $column)->getFormattedValue();
            $work['finishDateReal'] = $this->excelFile->getActiveSheet()->getCell('T' . $column)->getFormattedValue();


            if ($work['caption']) {
                $works[] = $work;
            }


            if (preg_match('/ИТОГО/i', $work['num'])) {
                $this->streamData[3]['eduMetWorkSum'] = $this->excelFile->getActiveSheet()->getCell('D' . $column)->getCalculatedValue();
            }
        }

        $this->streamData[3]['eduWorkSum'] = $this->excelFile->getActiveSheet()->getCell('Y19')->getCalculatedValue();
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

        $works = [];
        for ($row = 4, $column = $row, $i = 0; $row < $highestRow; $row++, $column++) {
            $work = [];

            $work['num'] = $this->excelFile->getActiveSheet()->getCellByColumnAndRow(1, $column)->getValue();
            $work['caption'] = $this->excelFile->getActiveSheet()->getCellByColumnAndRow(2, $column)->getValue();
            $work['plan'] = $this->excelFile->getActiveSheet()->getCell('C' . $column)->getValue();
            $work['real'] = $this->excelFile->getActiveSheet()->getCell('D' . $column)->getValue();
            $work['finishDatePlan'] = $this->excelFile->getActiveSheet()->getCell('E' . $column)->getFormattedValue();
            $work['finishDateReal'] = $this->excelFile->getActiveSheet()->getCell('F' . $column)->getFormattedValue();


            if (preg_match('/\d/i', $work['num']) and $work['caption']) {
                $works[] = $work;
            }

            if (preg_match('/ИТОГО/i', $work['num']) and $i < 2) {
                if ($i == 0) {
                    $this->streamData[4]['sciWorkSum'] = $this->excelFile->getActiveSheet()->getCell('C' . $column)->getCalculatedValue();
                } else {
                    $this->streamData[4]['orgWorkSum'] = $this->excelFile->getActiveSheet()->getCell('C' . $column)->getCalculatedValue();
                }
                $this->streamData[4]['work_'.($i+1)] = $works;
                $i++;
                $works = [];
            }
        }

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
