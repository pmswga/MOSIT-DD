@extends('layout.app')
@section('title') Редактирование ИП @endsection

@section('content')
    <script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/core/systems/ips/ip_table_sci_work.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/core/systems/ips/ip_table_org_work.js') }}"></script>

    <form id="updateIPForm" class="ui form" method="POST" action="{{ route('ips.update', $ip) }}">
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
                            <td>
                                <input type="hidden" id="rateType" value="{{ $file[0]['rateType'] }}">
                                {{ $file[0]['rateType'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>Значение ставки</td>
                            <td>
                                <input type="hidden" id="rateValue" value="{{ $file[0]['rateValue'] }}">
                                {{ $file[0]['rateValue'] }}
                            </td>
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
                                <td>
                                    <input type="hidden" name="metWork_{{ $loop->iteration }}[]" value="{{ $loop->iteration }}">
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <select name="metWork_{{ $loop->iteration }}[]">
                                        <option>{{ $work['caption'] }}</option>
                                    </select>
                                </td>
                                <td>
                                    <input name="metWork_{{ $loop->iteration }}[]" class="workSum3Plan" type="number" value="{{ $work['plan'] }}">
                                </td>
                                <td>
                                    <input name="metWork_{{ $loop->iteration }}[]" class="workSum3Real" type="number" value="{{ $work['real'] }}">
                                </td>
                                <td>
                                    <select name="metWork_{{ $loop->iteration }}[]">
                                        <option>{{ $work['finish'] }}</option>
                                    </select>
                                </td>
                                <td>
                                    <input name="metWork_{{ $loop->iteration }}[]" type="date" value="{{ $work['finishDatePlan'] }}">
                                </td>
                                <td>
                                    <input name="metWork_{{ $loop->iteration }}[]" type="date" value="{{ $work['finishDateReal'] }}">
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
                <div id="sciWorkTable" class="content">
                    <sci-work-table v-bind:works='sciWorks'></sci-work-table>
                </div>
            </div>
        </div>

        <div class="ui styled fluid accordion">
            <div class="title">
                <h3>Организационно-методическая и воспитательная работа</h3>
            </div>
            <div id="orgWorkTable" class="content">
                <org-work-table v-bind:works='orgWorks'></org-work-table>
            </div>
        </div>

        <fieldset class="ui segment">
            <legend><h3>Общая годовая нагрузка</h3></legend>
            <table class="ui table">
                <col width="50%">
                <col width="25%">
                <col width="25%">
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
                        <td>
                            <input type="number" id="workSum1Plan" readonly value="{{ $file[4]['workSum1'] }}">
                        </td>
                        <td id="workSum1Real"></td>
                    </tr>
                    <tr>
                        <td>Учебно-методическая работа</td>
                        <td>
                            <input type="number" id="workSum2Plan" readonly value="{{ $file[4]['workSum2'] }}">
                        </td>
                        <td id="workSum2Real"></td>
                    </tr>
                    <tr>
                        <td>Научно-исследовательская работа</td>
                        <td>
                            <input type="number" id="workSum3Plan" readonly value="{{ $file[4]['workSum3'] }}">
                        </td>
                        <td id="workSum3Real"></td>
                    </tr>
                    <tr>
                        <td>Организационно-методическая и воспитательная работа</td>
                        <td>
                            <input type="number" id="workSum4Plan" readonly value="{{ $file[4]['workSum4'] }}">
                        </td>
                        <td id="workSum4Real"></td>
                    </tr>
                    <tr id="workSumRow">
                        <td>Итого</td>
                        <td>
                            <input type="number" id="workSumPlan" readonly value="{{ $file[4]['sum'] }}">
                        </td>
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

        function calculateSum(array) {
            let sum = 0;

            array.forEach(function (value, index) {
                sum += parseFloat(value.plan);
            }, sum);

            return sum;
        }


        var sciWorkTable = new Vue({
            el: '#sciWorkTable',
            data: {
                sciWorksCaptions: [],
                sciWorks: JSON.parse('{{ json_encode($file[4]['work_1']) }}'.replace(/&quot;/ig,'"')),
                countOfSciWork: '{{count($file[4]['work_1'])}}',
                sciWorkSumPlan: 0
            },
            methods: {
                getSumPlan() {
                    $('#workSum3Plan').val(calculateSum(this.sciWorks));
                }
            }
        });


        var orgWorkTable = new Vue({
            el: '#orgWorkTable',
            data: {
                orgWorksCaptions: [],
                orgWorks: JSON.parse('{{ json_encode($file[4]['work_2']) }}'.replace(/&quot;/ig,'"')),
                countOfOrgWork: '{{count($file[4]['work_2'])}}',
                orgWorkSumPlan: 0
            },
            methods: {
                getSumPlan() {
                    $('#workSum4Plan').val(calculateSum(this.orgWorks));
                }
            }
        });

        $(document).ready(function () {
            $('[type=number]').attr('min', 0);
            $('[type=number]').attr('step', '0.01');
        });

        let rateValue = parseFloat($('#rateValue').val());
        let rateType = $('#rateType').val();

        let times = JSON.parse('{{ $workTimeLimits }}'.replace(/&quot;/ig,'"'));

        function getTimeLimit(rateValue) {
            let timeLimit = null;

            times.forEach(function (value, index, array) {
                if (value.rateValue === rateValue) {
                    timeLimit = value;
                }
            }, timeLimit, rateValue);

            return timeLimit;
        }

        $('[type=number]').on('change', function (element) {

            let workSum1Plan = parseFloat($('#workSum1Plan').val());
            let workSum2Plan = parseFloat($('#workSum2Plan').val());

            $('#workSum3Plan').val(sciWorkTable.getSumPlan());
            $('#workSum4Plan').val(orgWorkTable.getSumPlan());
            $('#workSumPlan').val(
                workSum1Plan +
                workSum2Plan +
                sciWorkTable.getSumPlan() +
                orgWorkTable.getSumPlan()
            );
        });

        $('#updateIPForm').on('submit', function () {
            let timeLimit = getTimeLimit(rateValue);
            let sum = parseFloat($('#workSumPlan').val());

            switch(rateType)
            {
                case 'штатный':
                {
                    if (sum > timeLimit.staff) {
                        $('#workSumRow').addClass('error');

                        return false;
                    } else {
                        $('#workSumRow').removeClass('error');
                    }
                } break;
                default:
                {
                    if (sum > timeLimit.other) {
                        $('#workSumRow').addClass('error');

                        return false;
                    } else {
                        $('#workSumRow').removeClass('error');
                    }
                } break;
            }


            return true;
        });

    </script>
@endsection
