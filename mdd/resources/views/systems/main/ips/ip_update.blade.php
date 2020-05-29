@extends('layout.app_default')

@section('title') Редактирование ИП @endsection

@section('content')

    <form name="updateIP" novalidate class="ui form" method="POST" action="{{ route('ips.update', $ip) }}">
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
                <h3>Учебно-методическая работа</h3>
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
                                    <select class="">
                                        <option>{{ $work['caption'] }}</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="workSum3Plan" type="number" value="{{ $work['plan'] }}">
                                </td>
                                <td>
                                    <input class="workSum3Real" type="number" value="{{ $work['real'] }}">
                                </td>
                                <td>
                                    <select class="">
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
                        @foreach($file[4]['work_1'] as $work)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <select class="">
                                        <option>{{ $work['caption'] }}</option>
                                    </select>
                                </td>
                                <td class="ui form">
                                    <div class="field">
                                        <input class="workSum4Plan" type="number" value="{{ $work['plan'] }}">
                                    </div>
                                </td>
                                <td class="ui form">
                                    <div class="field">
                                        <input class="workSum4Real" type="number" value="{{ $work['real'] }}">
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
                        @foreach($file[4]['work_2'] as $work)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <select class="">
                                        <option>{{ $work['caption'] }}</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="workSum5Plan" type="number" value="{{ $work['plan'] }}">
                                </td>
                                <td>
                                    <input class="workSum5Real" type="number" value="{{ $work['real'] }}">
                                </td>
                                <td>
                                    <select class="">
                                        <option>{{ $work['finishDatePlan'] }}</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="">
                                        <option>{{ $work['finishDateReal'] }}</option>
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
                        <td id="workSum1Plan">{{ $file[4]['workSum1'] }}</td>
                        <td id="workSum1Real"></td>
                    </tr>
                    <tr>
                        <td>Учебно методическая работа</td>
                        <td id="workSum2Plan">{{ $file[4]['workSum2'] }}</td>
                        <td id="workSum2Real"></td>
                    </tr>
                    <tr>
                        <td>Научно-исследовательская работа</td>
                        <td id="workSum3Plan">{{ $file[4]['workSum3'] }}</td>
                        <td id="workSum3Real"></td>
                    </tr>
                    <tr>
                        <td>Организационно-методическая и воспитательная работа</td>
                        <td id="workSum4Plan">{{ $file[4]['workSum4'] }}</td>
                        <td id="workSum4Real"></td>
                    </tr>
                    <tr>
                        <td>Итого</td>
                        <td id="workSumPlan">{{ $file[4]['sum'] }}</td>
                        <td id="workSumReal"></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>

        <div class="field">
            <input type="hidden" name="idTeacher" value="{{ $idTeacher }}">
            <input type="submit" class="ui orange fluid button" value="Сохранить">
        </div>

    </form>


    <script type="text/javascript">

        $(document).ready(function () {
            $('[type=number]').attr('min', 0);
        });

        class IPCalculate
        {
            static calcualteSum(_class) {
                let sum = 0;

                $(_class).each(function (index, element) {
                    sum += parseFloat($(element).val());
                });

                if (isNaN(sum)) {
                    return 0;
                } else {
                    return sum;
                }
            }
        }


        $('[type=number]').on('change', function (element) {
            let workSum3Plan = IPCalculate.calcualteSum('.workSum3Plan');
            let workSum3Real = IPCalculate.calcualteSum('.workSum3Real');
            let workSum4Plan = IPCalculate.calcualteSum('.workSum4Plan');
            let workSum4Real = IPCalculate.calcualteSum('.workSum4Real');
            let workSum5Plan = IPCalculate.calcualteSum('.workSum5Plan');
            let workSum5Real = IPCalculate.calcualteSum('.workSum5Real');
            let workSumPlan = workSum3Plan + workSum4Plan + workSum5Plan;
            let workSumReal = workSum3Real + workSum4Real + workSum5Real;

            $('#workSum2Plan').text(workSum3Plan.toString());
            $('#workSum2Real').text(workSum3Real.toString());
            $('#workSum3Plan').text(workSum4Plan.toString());
            $('#workSum3Real').text(workSum4Real.toString());
            $('#workSum4Plan').text(workSum5Plan.toString());
            $('#workSum4Real').text(workSum5Real.toString());
            $('#workSumPlan').text(workSumPlan.toString());
            $('#workSumReal').text(workSumReal.toString());
        });

    </script>
@endsection
