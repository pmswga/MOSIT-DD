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
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Работа в приемной комиссии (в том числе ответственный секретарь, член отборочной комиссии и т.д.)',
                    'subCaption' => '',
                    'maxHours' => -1,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Участие в работе Ученого совета Университета (института) и диссертационных советах:',
                    'subCaption' => 'членам совета',
                    'maxHours' => 40,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Участие в работе Ученого совета Университета (института) и диссертационных советах:',
                    'subCaption' => 'ученым секретарям советов',
                    'maxHours' => 100,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Участие в заседаниях:',
                    'subCaption' => 'кафедры',
                    'maxHours' => 25,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Участие в заседаниях:',
                    'subCaption' => 'учебно-методических и научно-технических семинарах',
                    'maxHours' => 40,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Организационно-методическая работа по заданиям',
                    'subCaption' => 'Минобрнауки России',
                    'maxHours' => 240,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Организационно-методическая работа по заданиям',
                    'subCaption' => 'ректората',
                    'maxHours' => 150,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Организационно-методическая работа по заданиям',
                    'subCaption' => 'директоров институтов и заведующих кафедрами',
                    'maxHours' => 100,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Руководство студенческими курсами (группами)',
                    'subCaption' => '',
                    'maxHours' => 120,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Участие в работе научно- методических советов и комиссиях при органах по управлению высшей школой',
                    'subCaption' => '',
                    'maxHours' => 15,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Руководство студенческими школами, кружками, клубами, секциями',
                    'subCaption' => '',
                    'maxHours' => 100,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Подготовка и проведение «Дня открытых дверей»',
                    'subCaption' => '',
                    'maxHours' => 18,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Дежурство на кафедре',
                    'subCaption' => '',
                    'maxHours' => 6,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Участие в проведении университетских (институтских) мероприятиях по учебно- воспитательной работе',
                    'subCaption' => '',
                    'maxHours' => 3,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Руководство кафедрой',
                    'subCaption' => '',
                    'maxHours' => 80,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Работа в Научно-техническом совете Университета',
                    'subCaption' => '',
                    'maxHours' => 30,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Организация воспитательных, культурно-массовых и спортивно- оздоровительных мероприятий, в том числе:',
                    'subCaption' => 'организация и проведение внутривузовских мероприятий и спортивных соревнований',
                    'maxHours' => 40,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Организация воспитательных, культурно-массовых и спортивно- оздоровительных мероприятий, в том числе:',
                    'subCaption' => 'подготовка команд обучающихся к участию в межвузовских мероприятиях',
                    'maxHours' => 40,
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'workCaption' => 'Организация воспитательных, культурно-массовых и спортивно- оздоровительных мероприятий, в том числе:',
                    'subCaption' => 'прочие мероприятия',
                    'maxHours' => 1,
                ],
            ]);
        }
    }
}
