<?php

use Illuminate\Database\Seeder;




class  DataSeeder {

    static public $employees = [
        //Учебно-вспомогательный персонал
        [
            'idEmployee' => 1,
            'secondName' => 'Михайлова',
            'firstName' => 'Евгения',
            'patronymic' => 'Константиновна',
            'personalPhone' => '+79036233166',
            'personalEmail' => 'michaylova1996@mail.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 2,
        ],
        [
            'idEmployee' => 2,
            'secondName' => 'Трушин',
            'firstName' => 'Степан',
            'patronymic' => 'Михайлович',
            'personalPhone' => '',
            'personalEmail' => 'stepan@mail.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 2,
        ],
        //Профессорско-преподавательский состав
        [
            'idEmployee' => 3,
            'secondName' => 'Аншина',
            'firstName' => 'Марина',
            'patronymic' => 'Львовна',
            'personalPhone' => '',
            'personalEmail' => 'anshina@mail.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 4,
            'secondName' => 'Басок',
            'firstName' => 'Борис',
            'patronymic' => 'Моисеевич',
            'personalPhone' => '',
            'personalEmail' => 'vm_e@mail.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 5,
            'secondName' => 'Бескин',
            'firstName' => 'Андрей',
            'patronymic' => 'Леонидович',
            'personalPhone' => '',
            'personalEmail' => 'albeskin@gmail.com',
            'idFaculty' => 1,
            'idEmployeePost' => 6,
        ],
        [
            'idEmployee' => 6,
            'secondName' => 'Баранова',
            'firstName' => 'Ирина',
            'patronymic' => 'Андреевна',
            'personalPhone' => '',
            'personalEmail' => 'baranova_i@mirea.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 7,
            'secondName' => 'Головин',
            'firstName' => 'Сергей',
            'patronymic' => 'Анатольевич',
            'personalPhone' => '',
            'personalEmail' => 'sgolovin@itstandard.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 9,
        ],
        [
            'idEmployee' => 8,
            'secondName' => 'Григорьев',
            'firstName' => 'Виктор',
            'patronymic' => 'Карлович',
            'personalPhone' => '',
            'personalEmail' => 'grigoriev@mirea.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 9,
            'secondName' => 'Гусев',
            'firstName' => 'Кирилл',
            'patronymic' => 'Вячеславович',
            'personalPhone' => '',
            'personalEmail' => 'g.kirill.73@mail.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 3,
        ],
        [
            'idEmployee' => 10,
            'secondName' => 'Данилкин',
            'firstName' => 'Фёдор',
            'patronymic' => 'Алексеевич',
            'personalPhone' => '',
            'personalEmail' => 'fdanilkin@yandex.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 11,
            'secondName' => 'Зубарев',
            'firstName' => 'Игорь',
            'patronymic' => 'Витальевич',
            'personalPhone' => '',
            'personalEmail' => 'zubarev-i@bk.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 12,
            'secondName' => 'Кораблин',
            'firstName' => 'Юрий',
            'patronymic' => 'Прокофьевич',
            'personalPhone' => '',
            'personalEmail' => 'y.p.k@mail.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 13,
            'secondName' => 'Леонтьев',
            'firstName' => 'Александр',
            'patronymic' => 'Савельевич',
            'personalPhone' => '',
            'personalEmail' => 's.leontyev.s@mail.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 14,
            'secondName' => 'Лоскутников',
            'firstName' => 'Орест',
            'patronymic' => 'Валентинович',
            'personalPhone' => '',
            'personalEmail' => 'orest.loskutnikov@gmail.com',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 15,
            'secondName' => 'Миронов',
            'firstName' => 'Антон',
            'patronymic' => 'Николаевич',
            'personalPhone' => '',
            'personalEmail' => 'amironov1993@yandex.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 8,
        ],
        [
            'idEmployee' => 16,
            'secondName' => 'Синицын',
            'firstName' => 'Иван',
            'patronymic' => 'Васильевич',
            'personalPhone' => '+79151078294',
            'personalEmail' => 'ivsin@mail.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 4,
        ],
        [
            'idEmployee' => 17,
            'secondName' => 'Скворцова',
            'firstName' => 'Людмила',
            'patronymic' => 'Анатольевна',
            'personalPhone' => '',
            'personalEmail' => 'myscvorec@ya.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 18,
            'secondName' => 'Смольянинова',
            'firstName' => 'Валерия',
            'patronymic' => 'Аполлоновна',
            'personalPhone' => '',
            'personalEmail' => 'valerysmol@mail.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 19,
            'secondName' => 'Сыромятников',
            'firstName' => 'Владислав',
            'patronymic' => 'Петрович',
            'personalPhone' => '',
            'personalEmail' => 'vladislav.syromyatnikov@gmail.com',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 20,
            'secondName' => 'Бирюкова',
            'firstName' => 'Анна',
            'patronymic' => 'Алексеевна',
            'personalPhone' => '',
            'personalEmail' => 'biryukova@mirea.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 21,
            'secondName' => 'Баранюк',
            'firstName' => 'Валентина',
            'patronymic' => 'Валентиновна',
            'personalPhone' => '',
            'personalEmail' => 'valentina_bar@mail.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 22,
            'secondName' => 'Петренко',
            'firstName' => 'Александр',
            'patronymic' => 'Анатольевич',
            'personalPhone' => '',
            'personalEmail' => 'alexspetr@yandex.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 23,
            'secondName' => 'Колесников',
            'firstName' => 'Сергей',
            'patronymic' => 'Николаевич',
            'personalPhone' => '',
            'personalEmail' => 'win0err@gmail.com',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 24,
            'secondName' => 'Аввакумов',
            'firstName' => 'Георгий',
            'patronymic' => 'Евгеньевич',
            'personalPhone' => '',
            'personalEmail' => 'madskills700@gmail.com',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 25,
            'secondName' => 'Грушицын',
            'firstName' => 'Александр',
            'patronymic' => 'Степанович',
            'personalPhone' => '',
            'personalEmail' => 'nicifor@bk.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 26,
            'secondName' => 'Володина',
            'firstName' => 'Анна',
            'patronymic' => 'Михайловна',
            'personalPhone' => '',
            'personalEmail' => 'a.kholopova@mail.ru',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ],
        [
            'idEmployee' => 27,
            'secondName' => 'Овчинников',
            'firstName' => 'Михаил',
            'patronymic' => 'Андреевич',
            'personalPhone' => '',
            'personalEmail' => 'mikalovtch@gmail.com',
            'idFaculty' => 1,
            'idEmployeePost' => 1,
        ]
    ];

    static public $teachers = [
        [
            'idTeacher' => 3,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::HIGHER_TEACHER
        ],
        [
            'idTeacher' => 4,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::DOCENT
        ],
        [
            'idTeacher' => 5,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::DOCENT
        ],
        [
            'idTeacher' => 6,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::ASSISTANT
        ],
        [
            'idTeacher' => 7,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::HEAD_DEPARTMENT
        ],
        [
            'idTeacher' => 8,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::DOCENT
        ],
        [
            'idTeacher' => 9,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::HIGHER_TEACHER
        ],
        [
            'idTeacher' => 10,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::PROFESSOR
        ],
        [
            'idTeacher' => 11,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::PROFESSOR
        ],
        [
            'idTeacher' => 12,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::PROFESSOR
        ],
        [
            'idTeacher' => 13,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::PROFESSOR
        ],
        [
            'idTeacher' => 14,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::DOCENT
        ],
        [
            'idTeacher' => 15,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::TEACHER
        ],
        [
            'idTeacher' => 16,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::DOCENT
        ],
        [
            'idTeacher' => 17,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::HIGHER_TEACHER
        ],
        [
            'idTeacher' => 18,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::DOCENT
        ],
        [
            'idTeacher' => 19,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::DOCENT
        ],
        [
            'idTeacher' => 20,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::DOCENT
        ],
        [
            'idTeacher' => 21,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::DOCENT
        ],
        [
            'idTeacher' => 22,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::DOCENT
        ],
        [
            'idTeacher' => 23,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::ASSISTANT
        ],
        [
            'idTeacher' => 24,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::ASSISTANT
        ],
        [
            'idTeacher' => 25,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::HIGHER_TEACHER
        ],
        [
            'idTeacher' => 26,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::HIGHER_TEACHER
        ],
        [
            'idTeacher' => 27,
            'idDegree' => 0,
            'idAcademicTitle' => 0,
            'idScienceType' => 0,
            'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::ASSISTANT
        ]
    ];

}
