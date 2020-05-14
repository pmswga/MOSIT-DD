<?php


namespace App\Core\ips;
use PhpOffice\PhpSpreadsheet\IOFactory;

class IPExcelFile
{
    private $ipExcelConfig = [
        0 => [
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
        ]
    ];
    private $file;
    private $data;

    public function __construct($file)
    {
        $this->file = $this->loadFile($file);
        $this->data = [
            0 => [],
            1 => []
        ];

        $this->parseData();
        $this->prepareData();
    }

    private function loadFile($file) {
        $tmpFile = null;

        $fp = tmpfile();
        fputs($fp, $file);
        $tmpFile = IOFactory::load(stream_get_meta_data($fp)['uri']);
        fclose($fp);

        return $tmpFile;
    }

    private function parseData() {
        foreach ($this->ipExcelConfig as $sheet => $cells) {
            foreach ($cells as $cellKey => $cell) {
                switch ($sheet) {
                    case 0:
                    {
                        $this->data[$sheet][$cellKey] = $this->file->getSheet($sheet)->getCell($cell)->getValue();
                    } break;
                    case 1:
                    {
                        $value = ' ';
                        $_cell = $this->ipExcelConfig[$sheet][$cellKey];

                        while ($value) {
                            $value = $this->file->getSheet($sheet)->getCellByColumnAndRow(1, $_cell)->getValue();
                            if ($value && $value != 'ИТОГО ЗА ОСЕННИЙ СЕМЕСТР') {
                                $this->data[$sheet][$cellKey][] = $value;
                            }

                            $_cell += 2;
                        }
                    } break;
                    case 2:
                        {
                            $value = ' ';
                            $_cell = $this->ipExcelConfig[$sheet][$cellKey];

                            while ($value) {
                                $value = $this->file->getSheet($sheet)->getCellByColumnAndRow(1, $_cell)->getValue();
                                if ($value && $value != 'ИТОГО ЗА ВЕСЕННИЙ СЕМЕСТР') {
                                    $this->data[$sheet][$cellKey][] = $value;
                                }

                                $_cell += 2;
                            }
                        } break;
                }
            }
        }
    }

    private function prepareData() {
        $basePost = $this->data[0]['teacherPost'];

        $post = '';
        preg_match('/Старший преподаватель|Ассистент|Преподаватель|Доцент|Профессор/i', $this->data[0]['teacherPost'], $matches);
        if ($matches) {
            $post = $matches[0];
        }

        $rateType = '';
        preg_match('/штатный|внешний/', $this->data[0]['teacherPost'], $matches);
        if ($matches) {
            $rateType = $matches[0];
        }

        $rateValue = 0;
        preg_match('/[0|1][,|.][0-9][0|5]/', $this->data[0]['teacherPost'], $matches);
        if ($matches) {
            $rateValue = $matches[0];
        }

        $initials = explode(' ', $this->data[0]['initials']);

        $secondName = $initials[0];
        $firstName = $initials[1];
        if (array_key_exists(2, $initials)) {
            $patronymic = $initials[2];
        }


        $this->data[0]['basePost'] = $basePost;
        $this->data[0]['teacherPost'] = $post;
        $this->data[0]['rateType'] = $rateType;
        $this->data[0]['rateValue'] = $rateValue;
        $this->data[0]['secondName'] = $secondName;
        $this->data[0]['firstName'] = $firstName;
        $this->data[0]['patronymic'] = $patronymic;

    }


    public function getSheet($sheet) {
        if ($sheet < count($this->data)) {
            return $this->data[$sheet];
        }
    }

    public function getData() {
        return $this->data;
    }

}
