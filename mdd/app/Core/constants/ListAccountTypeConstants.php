<?php

namespace App\Core\Constants;

/**
 * @class ListAccountTypeConstants
 * @brief Содержит список констант идентификаторов типов пользователей
 * Далее используется в классе ListAccountTypeSeeder
 *
 * @package App\Core\Constants
 */
class ListAccountTypeConstants
{
    public const TEACHER = 1;             ///< Преподаватель
    public const METHODIST = 2;           ///< Методист
    public const DEPUTY_EDU_WORK = 3;     ///< Заместитель по учебной работе
    public const DEPUTY_SCI_WORK = 4;     ///< Заместитель по научной работе
    public const DEPUTY_EDU_MET_WORK = 5; ///< Заместитель по учебно-методической работе
    public const DEPUTY_MTO = 6;          ///< Ответственный за МТО
    public const DEPUTY_STUDENT_WORK = 7; ///< Ответственный за работу со студентами
    public const SCIENCE_SECRETARY = 8;   ///< Учёный секретарь
    public const HEAD_DEPARTMENT = 9;     ///< Заведующий кафедрой
    public const ADMIN = 10;              ///< Администратор
}
