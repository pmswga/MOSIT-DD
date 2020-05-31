<?php

namespace App\Core\Constants;

/**
 * @class ListSubSystemConstants
 * @brief Содержит список констант идентификаторов подсистем.
 * Далее используется в классе ListSubSystemSeeder
 *
 * @package App\Core\Constants
 */
class ListSubSystemConstants
{
    public const IPS = 1;       ///< Идентификатор подсистемы - Индивидуальные планы
    public const Storage = 2;   ///< Идентификатор подсистемы - Хранение материалов
    public const Orders  = 3;   ///< Идентификатор подсистемы - Приказы
    public const Tickets = 4;   ///< Идентификатор подсистемы - Поручения
    public const Protocols = 5; ///< ИДентификатор подсистемы - Протоколы
}
