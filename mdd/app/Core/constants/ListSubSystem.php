<?php

namespace App\Core\Constants;

/**
 * @class ListSubSystem
 * @brief Содержит список констант идентификаторов подсистем
 * Далее используется в классах ListSubSystemSeeder
 *
 * @package App\Core\Constants
 */
class ListSubSystem
{
    public const IPS = 1;       ///< Идентификатор подсистемы - Индивидуальные планы
    public const Storage = 2;   ///< Идентификатор подсистемы - Хранение материалов
    public const Orders  = 3;   ///< Идентификатор подсистемы - Приказы
    public const Tickets = 4;   ///< Идентификатор подсистемы - Поручения
    public const Protocols = 5; ///< ИДентификатор подсистемы - Протоколы
}
