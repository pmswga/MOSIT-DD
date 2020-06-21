<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListWorksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_WORKS)->count() === 0) {
            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_WORKS)->insert([
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::SIC_WORK,
                    'workCaption' => 'Подготовка к изданию:',
                    'subCaption' => 'монографии',
                    'comment' => 'на один печатный лист',
                    'maxHours' => 150,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::SIC_WORK,
                    'workCaption' => 'Подготовка к изданию:',
                    'subCaption' => 'научной статьи в индексируемых изданиях Web of Science и Scopus',
                    'comment' => 'на один печатный лист',
                    'maxHours' => 200,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::SIC_WORK,
                    'workCaption' => 'Подготовка к изданию:',
                    'subCaption' => 'научной статьи в журнале из списка ВАК',
                    'comment' => 'на один печатный лист',
                    'maxHours' => 100,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::SIC_WORK,
                    'workCaption' => 'Подготовка к изданию:',
                    'subCaption' => 'научной статьи в индексируемых изданиях РИНЦ',
                    'comment' => 'на один печатный лист',
                    'maxHours' => 50,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::SIC_WORK,
                    'workCaption' => 'Подготовка к изданию:',
                    'subCaption' => 'научной статьи в прочих изданиях',
                    'comment' => 'на один печатный лист',
                    'maxHours' => 30,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::SIC_WORK,
                    'workCaption' => 'Выступление с докладом на научных конференциях, конгрессах, симпозиумах, «круглых столах», чтениях, семинарах, школах',
                    'subCaption' => '',
                    'comment' => 'в год',
                    'maxHours' => 60,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::SIC_WORK,
                    'workCaption' => 'Выполнение плановых инициативных НИР',
                    'subCaption' => '',
                    'comment' => 'по решению НТС (решение прикладывается к отчету); при условии, что преподаватель не получает заработную плату за участие в НИР',
                    'maxHours' => 200,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::SIC_WORK,
                    'workCaption' => 'Подготовка студентов к участию в конференциях:',
                    'subCaption' => 'международных',
                    'comment' => 'на одну работу',
                    'maxHours' => 10,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::SIC_WORK,
                    'workCaption' => 'Подготовка студентов к участию в конференциях:',
                    'subCaption' => 'всероссийских',
                    'comment' => 'на одну работу',
                    'maxHours' => 5,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::SIC_WORK,
                    'workCaption' => 'Подготовка студентов к участию в конференциях:',
                    'subCaption' => 'университетских',
                    'comment' => 'на одну работу',
                    'maxHours' => 3,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::SIC_WORK,
                    'workCaption' => 'Руководство инициативной научно-исследовательской работой студентов',
                    'subCaption' => '',
                    'comment' => 'на одного студента в семестр',
                    'maxHours' => 30,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::SIC_WORK,
                    'workCaption' => 'Подготовка университетской команды для участия в международных, всероссийских или региональных студенческих олимпиадах или конкурсах',
                    'subCaption' => '',
                    'comment' => '',
                    'maxHours' => 100,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Работа в приемной комиссии (в том числе ответственный секретарь, член отборочной комиссии и т.д.)',
                    'subCaption' => '',
                    'comment' => '',
                    'maxHours' => -1,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Участие в работе Ученого совета Университета (института) и диссертационных советах:',
                    'subCaption' => 'членам совета',
                    'comment' => '',
                    'maxHours' => 40,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Участие в работе Ученого совета Университета (института) и диссертационных советах:',
                    'subCaption' => 'ученым секретарям советов',
                    'comment' => '',
                    'maxHours' => 100,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Участие в заседаниях:',
                    'subCaption' => 'кафедры',
                    'comment' => '',
                    'maxHours' => 25,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Участие в заседаниях:',
                    'subCaption' => 'учебно-методических и научно-технических семинарах',
                    'comment' => '',
                    'maxHours' => 40,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Организационно-методическая работа по заданиям',
                    'subCaption' => 'Минобрнауки России',
                    'comment' => '',
                    'maxHours' => 240,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Организационно-методическая работа по заданиям',
                    'subCaption' => 'ректората',
                    'comment' => '',
                    'maxHours' => 150,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Организационно-методическая работа по заданиям',
                    'subCaption' => 'директоров институтов и заведующих кафедрами',
                    'comment' => '',
                    'maxHours' => 100,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Руководство студенческими курсами (группами)',
                    'subCaption' => '',
                    'comment' => '',
                    'maxHours' => 120,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Участие в работе научно- методических советов и комиссиях при органах по управлению высшей школой',
                    'subCaption' => '',
                    'comment' => '',
                    'maxHours' => 15,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Руководство студенческими школами, кружками, клубами, секциями',
                    'subCaption' => '',
                    'comment' => '',
                    'maxHours' => 100,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Подготовка и проведение «Дня открытых дверей»',
                    'subCaption' => '',
                    'comment' => '',
                    'maxHours' => 18,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Дежурство на кафедре',
                    'subCaption' => '',
                    'comment' => '',
                    'maxHours' => 6,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Участие в проведении университетских (институтских) мероприятиях по учебно- воспитательной работе',
                    'subCaption' => '',
                    'comment' => '',
                    'maxHours' => 3,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Руководство кафедрой',
                    'subCaption' => '',
                    'comment' => '',
                    'maxHours' => 80,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Работа в Научно-техническом совете Университета',
                    'subCaption' => '',
                    'comment' => '',
                    'maxHours' => 30,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Организация воспитательных, культурно-массовых и спортивно- оздоровительных мероприятий, в том числе:',
                    'subCaption' => 'организация и проведение внутривузовских мероприятий и спортивных соревнований',
                    'comment' => '',
                    'maxHours' => 40,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Организация воспитательных, культурно-массовых и спортивно- оздоровительных мероприятий, в том числе:',
                    'subCaption' => 'подготовка команд обучающихся к участию в межвузовских мероприятиях',
                    'comment' => '',
                    'maxHours' => 40,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Организация воспитательных, культурно-массовых и спортивно- оздоровительных мероприятий, в том числе:',
                    'subCaption' => 'прочие мероприятия',
                    'comment' => '',
                    'maxHours' => 1,
                ],
            ]);
        }
    }
}
