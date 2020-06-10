@extends('layout.app')
@section('title', 'Добавление сотрудника')

@section('content')
    <form style="margin: 0; padding: 0;" class="ui form" method="POST" action="{{ route('employees.store') }}">

        <fieldset class="ui segment">
            <legend><h3>Основная информация</h3></legend>
            <div class="three fields">
                <div class="field">
                    <label>Фамилия</label>
                    <input type="text" name="secondName">
                </div>
                <div class="field">
                    <label>Имя</label>
                    <input type="text" name="firstName">
                </div>
                <div class="field">
                    <label>Отчество</label>
                    <input type="text" name="patronymic">
                </div>
            </div>
            <div class="field">
                <label>Телефон</label>
                <input type="tel" name="personalPhone">
            </div>
            <div class="field">
                <label>Почта</label>
                <input type="email" name="personalEmail">
            </div>
        </fieldset>

        <fieldset class="ui segment">
            <legend><h3>Служебная информация</h3></legend>
            <div class="field">
                <label>Должность</label>
                <select class="ui dropdown" name="employeePost">
                    @foreach($employeePosts as $employeePost)
                        <option value="{{ $employeePost->idEmployeePost }}">{{ $employeePost->getCaption() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label>Институт / Кафедра</label>
                <select class="" name="faculty">
                    @foreach($faculties as $institute => $facultyList)
                        <optgroup label="{{ $institute }}">
                            @foreach($facultyList as $faculty)
                                <option value="{{ $faculty->idFaculty }}">{{ $faculty->getCaption() }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label>Начальник</label>
                <select class="ui dropdown" name="leadership">
                    @foreach($leaderships as $leadership)
                        <option value="{{ $leadership->idEmployee }}">{{ $leadership->getPost()->getCaption() . ' / ' . $leadership->getFullInitials() }}</option>
                    @endforeach
                </select>
            </div>
        </fieldset>

        <fieldset class="ui segment">
            <legend><h3>Кадровая информация</h3></legend>
            <div class="field">
                <label>Штатная</label>
            </div>
            <div class="field">
                <label>Внутреняя</label>
            </div>
            <div class="field">
                <label>Внешняя</label>
            </div>
        </fieldset>

        <div class="field">
            <button class="ui primary fluid button">
                Сохранить
            </button>
        </div>

        @csrf
    </form>
@endsection
