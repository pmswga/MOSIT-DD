@extends('layouts.app')

@section('title') Редактирование ИП @endsection

@include('layouts.components.generate_account_menu')

@section('content')

	<div class="sixteen wide column">
		<div class="ui grid">
			<div class="row">
				<div class="one wide column"></div>
				<div class="fourteen wide column">
                    @if(\Illuminate\Support\Facades\Session::has('message'))
                        <div class="ui icon success message">
                            <i class="check icon"></i>
                            <div class="content">
                                <div class="header">
                                    {{ \Illuminate\Support\Facades\Session::get('message') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    <form class="ui form" method="POST" action="{{ route('ips.update', $ip) }}">
                        @method('PUT')
                        @csrf

                        <div class="ui styled fluid accordion">
                            <div class="title">
                                <h3>Информация о преподавателе</h3>
                            </div>
                            <div class="content">
                                <table class="ui definition table">
                                    <tbody>
                                        <tr>
                                            <td>Учебный год</td>
                                            <td>{{ $file[0]['educationYear'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Институт</td>
                                            <td>{{ $file[0]['institute'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Кафедра</td>
                                            <td>{{ $file[0]['faculty'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>ФИО</td>
                                            <td>{{ $file[0]['initials'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Должность</td>
                                            <td>{{ $file[0]['teacherPost'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Вид ставки</td>
                                            <td>{{ $file[0]['rateType'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Значение ставки</td>
                                            <td>{{ $file[0]['rateValue'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="ui styled fluid accordion">
                            <div class="title">
                                <h3>Список дисциплин за 1-й семестр</h3>
                            </div>
                            <div class="content">
                                <table class="ui table">
                                    <col width="5%">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Наименование дисциплины</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($file[1]['subjects'] as $subject)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $subject }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="ui styled fluid accordion">
                            <div class="title">
                                <h3>Список дисциплин за 2-й семестр</h3>
                            </div>
                            <div class="content">
                                <table class="ui table">
                                    <col width="5%">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Наименование дисциплины</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @empty($file[2])
                                            <tr>
                                                <td colspan="2">
                                                    <i class="massive frown icon"></i>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($file[2]['subjects'] as $subject)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $subject }}</td>
                                                </tr>
                                            @endforeach
                                        @endempty
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="ui styled fluid accordion">
                            <div class="title">
                                <h3>Учебно методическая работа</h3>
                            </div>
                            <div class="content">
                                <table class="ui table">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">№</th>
                                            <th rowspan="2">Наименование и вид работ</th>
                                            <th colspan="2">Трудоёмкость (час)</th>
                                            <th rowspan="2">Форма завершения работ</th>
                                            <th colspan="2">Срок выполнения (даты)</th>
                                        </tr>
                                        <tr>
                                            <th>Планируемая</th>
                                            <th>Фактическая</th>
                                            <th>Планируемая</th>
                                            <th>Фактическая</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($file[3]['work'] as $work)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <select>
                                                        <option>{{ $work['caption'] }}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" value="{{ $work['plan'] }}">
                                                </td>
                                                <td>
                                                    <input type="number" value="{{ $work['real'] }}">
                                                </td>
                                                <td>
                                                    <select>
                                                        <option>{{ $work['finish'] }}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="date" value="{{ $work['finishDatePlan'] }}">
                                                </td>
                                                <td>
                                                    <input type="date" value="{{ $work['finishDateReal'] }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="ui styled fluid accordion">
                            <div class="title">
                                <h3>Научно-исследовательская работа</h3>
                            </div>
                            <div class="content">
                                <table class="ui table">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">№</th>
                                            <th rowspan="2">Наименование и вид работ</th>
                                            <th colspan="2">Трудоёмкость (час)</th>
                                            <th colspan="2">Срок выполнения (даты)</th>
                                        </tr>
                                        <tr>
                                            <th>Планируемая</th>
                                            <th>Фактическая</th>
                                            <th>Планируемая</th>
                                            <th>Фактическая</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($file[4]['work'] as $work)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <select>
                                                        <option>{{ $work['caption'] }}</option>
                                                    </select>
                                                </td>
                                                <td class="ui form">
                                                    <div class="field">
                                                        <input type="number" value="{{ $work['plan'] }}">
                                                    </div>
                                                </td>
                                                <td class="ui form">
                                                    <div class="field">
                                                        <input type="number" value="{{ $work['real'] }}">
                                                    </div>
                                                </td>
                                                <td class="ui form">
                                                    <div class="field">
                                                        <input type="date" value="{{ $work['finishDatePlan'] }}">
                                                    </div>
                                                </td>
                                                <td class="ui form">
                                                    <div class="field">
                                                        <input type="date" value="{{ $work['finishDateReal'] }}">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="ui styled fluid accordion">
                            <div class="title">
                                <h3>Организационно-методическая и воспитательная работа</h3>
                            </div>
                            <div class="content">
                                <table class="ui table">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">№</th>
                                            <th rowspan="2">Наименование и вид работ</th>
                                            <th colspan="2">Трудоёмкость (час)</th>
                                            <th colspan="2">Срок выполнения (даты)</th>
                                        </tr>
                                        <tr>
                                            <th>Планируемая</th>
                                            <th>Фактическая</th>
                                            <th>Планируемая</th>
                                            <th>Фактическая</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($file[5]['work'] as $work)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <select>
                                                        <option>{{ $work['caption'] }}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" value="{{ $work['plan'] }}">
                                                </td>
                                                <td>
                                                    <input type="number" value="{{ $work['real'] }}">
                                                </td>
                                                <td>
                                                    <select>
                                                        <option>{{ $work['finishPlan'] }}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select>
                                                        <option>{{ $work['finishReal'] }}</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <fieldset class="ui segment">
                            <legend><h3>Общая годовая нагрузка</h3></legend>
                            <table class="ui table">
                                <col width="50%">
                                <thead>
                                    <tr>
                                        <th>Виды работ</th>
                                        <th>Планируемая</th>
                                        <th>Фактическая</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Учебная работа</td>
                                        <td>{{ $file[6]['workSum1'] }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Учебно методическая работа</td>
                                        <td>{{ $file[6]['workSum2'] }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Научно-исследовательская работа</td>
                                        <td>{{ $file[6]['workSum3'] }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Организационно-методическая и воспитательная работа</td>
                                        <td>{{ $file[6]['workSum4'] }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Итого</td>
                                        <td>{{ $file[6]['sum'] }}</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>

                        <div class="field">
                            <input type="hidden" name="idTeacher" value="{{ $idTeacher }}">
                            <input type="submit" class="ui orange fluid button" value="Сохранить">
                        </div>

                    </form>
				</div>
			</div>
		</div>
	</div>

@endsection
