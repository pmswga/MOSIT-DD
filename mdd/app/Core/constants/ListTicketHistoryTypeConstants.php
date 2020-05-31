<?php


namespace App\Core\Constants;

/**
 * @class ListTicketHistoryTypeConstants
 * @brief Содержит список констант идентификаторов типов событий работы с поручением.
 * Далее используется в классе ListAccountTypeSeeder
 *
 * @package App\Core\Constants
 */
class ListTicketHistoryTypeConstants
{
    public const CREATE = 1;       ///< Создание
    public const COMMENT = 2;      ///< Комментирование
    public const ATTACH_FILE = 3;  ///< Прикрепление файлов
    public const DELETE = 4;       ///< Удаление
    public const CLOSE = 5;        ///< Закрытие

}
