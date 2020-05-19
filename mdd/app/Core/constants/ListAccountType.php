<?php

namespace App\Core\Constants;

/**
 * @class ListAccountType
 * @brief Содержит список констант идентификаторов типов пользователей
 * Далее используется в классах ListAccountTypeSeeder
 *
 * @package App\Core\Constants
 */
class ListAccountType
{
    public const TEACHER = 1;             ///< Идентификатор типа пользователя - Преподаватель
    public const METHODIST = 2;           ///< Идентификатор типа пользователя - Методист
    public const DEPUTY_EDU_WORK = 3;     ///< Идентификатор типа пользователя - Заместитель по учебной работе
    public const DEPUTY_SCI_WORK = 4;     ///< Идентификатор типа пользователя - Заместитель по научной работе
    public const DEPUTY_EDU_MET_WORK = 5; ///< Индентификатор типа пользователя - Заместитель по учебно-методической работе
    public const DEPUTY_MTO = 6;          ///<  Идентификатор типа пользователя - Ответственный за МТО
    public const DEPUTY_STUDENT_WORK = 7; ///<  Идентификатор типа пользователя - Ответственный за работу со студентами
    public const SCIENCE_SECRETARY = 8;   ///< Идентификатор типа пользователя - Учёный секретарь
    public const HEAD_DEPARTMENT = 9;     ///<  Идентификатор типа пользователя - Заведующий кафедрой
    public const ADMIN = 10;              ///<  Идентификатор типа пользователя - Администратор
}
