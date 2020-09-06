<?php


namespace App\Core\Config;

/**
 * @class ListDatabaseTable
 * @brief Содержит набор констант с наименованием таблиц базы данных.
 * Далее используется в миграциях.
 *
 * Данный класс создан для того, чтобы можно было в дальнейшем использовать наименования констант, вместо имён таблиц.
 *
 * @package App\Core\Config
 */
class ListDatabaseTable
{

    public const TABLE_FAILED_JOBS = 'failed_jobs'; ///< Службная таблица Laravel

    public const TABLE_ACCOUNTS = 'accounts'; ///< Аккаунты пользователей
    public const TABLE_PASSWORD_RESETS = 'password_reset'; ///< Записи восстановления паролей
    public const TABLE_LIST_SYSTEM_SECTION = 'list_system_section'; ///< Список категорий подсистем
    public const TABLE_LIST_SUB_SYSTEM = 'list_sub_system'; ///< Список подсистем
    public const TABLE_ACCOUNT_RIGHTS = 'account_rights'; ///< Права доступа аккаунтов
    public const TABLE_LIST_ACCOUNT_TYPE = 'list_account_type'; ///< Список типов аккаунтов
    public const TABLE_LIST_FACULTY = 'list_faculty'; ///< Список кафедр
    public const TABLE_LIST_INSTITUTE = 'list_institute'; ///< Список институтов

    public const TABLE_IPS = 'ips'; ///< Индивидуальные планы
    public const TABLE_LIST_WORKS = 'list_works'; ///< Список работ (учебных, учебно-методических, научно-исследовательских  и организационно-методических)
    public const TABLE_LIST_WORK_TYPE = 'list_work_type'; ///< Список типов работ (см. ListWorkTypeSeeder)
    public const TABLE_LIST_WORK_TIMES = 'list_work_times'; ///< Список максимального кол-во часов в зависимости от ставки

    public const TABLE_EMPLOYEES = 'employees'; ///< Информация о сотрудниках
    public const TABLE_TEACHERS = 'teachers'; ///< Информация о преподавателях
    public const TABLE_LIST_DEGREE = 'list_degree'; ///< Список учёных степеней
    public const TABLE_LIST_ACADEMIC_TITLE = 'list_academic_title'; ///< Список академических званий
    public const TABLE_LIST_SCIENCE_TYPE = 'list_science_type'; ///< Список докторских степеней
    public const TABLE_LIST_TEACHER_POST = 'list_teacher_post'; ///< Список видов должностей преподавателей
    public const TABLE_LIST_EMPLOYEE_POST = 'list_employee_post'; ///< Список видов должностей сотрудника
    public const TABLE_RATES = 'rates'; ///< Информация о ставках сотрудников
    public const TABLE_LIST_RATE_TYPE = 'list_rate_type'; ///< Список видов ставок
    public const TABLE_EMPLOYEE_HIERARCHY = 'employee_hierarchy'; ///< Иерархия сотрудников

    public const TABLE_EMPLOYEE_FILES = 'employee_files'; ///< Информация о файлах, загружаемые сотрудниками
    public const TABLE_LIST_FILE_TAG = 'list_file_tag'; ///< Список меток для назначения загружаемым файлам

    public const TABLE_TICKETS = 'tickets'; ///< Поручения
    public const TABLE_LIST_TICKET_TYPE = 'list_ticket_type'; ///< Список видов поручений
    public const TABLE_EMPLOYEE_TICKETS = 'employee_tickets'; ///< Назначенные поручения сотрудникам
    public const TABLE_LIST_TICKET_STATUS = 'list_ticket_status'; ///< Список статусов поручений
    public const TABLE_TICKET_FILES = 'ticket_files'; ///< Информация о файлах, прикреплённых к поручению
    public const TABLE_TICKET_COMMENTS = 'ticket_comments'; ///< Комментарии к порученями
    public const TABLE_TICKET_HISTORY = 'ticket_history'; ///< Информация об истории поручения
    public const TABLE_LIST_TICKET_HISTORY_TYPE = 'list_ticket_history_type'; ///< Список видов событий поручения

}
