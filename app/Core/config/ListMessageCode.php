<?php
namespace App\Core\Config;


/**
 * @class ListMessageCode
 * @brief Содержит набор констант с наименованием видов сообщений.
 * Используется при вызове исключений
 *
 * @package App\Core\Config
 */
class ListMessageCode
{
    public const ERROR   = -2;  ///< Сообщение - ошибка
    public const WARNING = -1;  ///< Сообщение - предупреждение
    public const INFO    = 0;   ///< Сообщение - уведомление
    public const SUCCESS = 1;   ///< Сообщение - подтверждение

    /**
     * @param int $code - код ошибки
     * @brief  Метод возвращает текстовое соответствие кода ошибки для последующего вывода сообщения в представлении message.blade.php
     * @return string
     */
    static public function getType($code)
    {
        switch ($code)
        {
            case self::ERROR:
            {
                return 'error';
            }
            case self::WARNING:
            {
                return 'warning';
            }
            case self::INFO:
            {
                return 'info';
            }
            case self::SUCCESS:
            {
                return 'success';
            }
            default:
                return 'message';
        }
    }

}
