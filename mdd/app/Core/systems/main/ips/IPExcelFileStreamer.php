<?php

namespace App\Core\Systems\Main\IPS;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

/**
 * @class IPExcelFileStreamer
 * @brief Абстрактный класс описывающий методы обработки EXCEL-файла индивидуального плана из системы Тандем.
 * В дальнейшем используется в классах IPExcelFileReader и IPExcelFileWriter для считывания и записи данных соответственно.
 *
 * @package App\Core\System\Main\IPS;
 */
abstract class IPExcelFileStreamer
{
    protected $excelFile;       ///< Экземпляр класса Spreadsheet
    protected $cellCoordinates; ///< Координаты ячеек для считывания/записи
    protected $streamData;      ///< Считываемые/записываемые данные

    /**
     * Конструктор.
     * @param $excelFilename - путь к файлу
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function __construct($excelFilename)
    {
        $this->excelFile = IOFactory::load($excelFilename);
    }

    /**
     * @return mixed
     */
    abstract public function streamSheet1();

    /**
     * @return mixed
     */
    abstract public function streamSheet2();

    /**
     * @return mixed
     */
    abstract public function streamSheet3();

    /**
     * @return mixed
     */
    abstract public function streamSheet4();

    /**
     * @return mixed
     */
    abstract public function streamSheet5();

    /**
     * @return mixed
     */
    abstract public function getResult();
}
