<?php


namespace App\Core\Constants;

/**
 * @class ListTicketStatusConstants
 * @brief Содержит список констант идентификаторов статусов поручения.
 * Далее используется в классе ListTicketStatusSeeder
 *
 * @package App\Core\Constants
 */
class ListTicketStatusConstants
{
    public const CREATE = 1;   ///< Создано
    public const PROGRESS = 2; ///< В процессе исполнения
    public const FINISH = 3;   ///< Закрыто
}
