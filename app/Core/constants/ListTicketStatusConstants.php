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
    public const OPENED = 1;   ///< Открыто
    public const PROGRESS = 2; ///< В процессе исполнения
    public const CLOSED = 3;   ///< Закрыто
}
