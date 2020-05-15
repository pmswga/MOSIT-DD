<div class="one wide column"></div>
<div class="two wide column">
    <div class="ui vertical fluid tabular menu">
        <a class="active item" data-tab="tickets">
            Поручения
        </a>
        <a class=" item" data-tab="schedule">
            Раписание
        </a>
        <a class="item" data-tab="ips">
            Индивидуальные планы
        </a>
    </div>
</div>
<div class="twelve wide column">
    <div class="ui active tab" data-tab="tickets">
        <fieldset class="ui segment">
            <legend><h3>Сводка</h3></legend>
            <div class="ui three statistics">
                <div class="statistic">
                    <div class="value">
                        20
                    </div>
                    <div class="label">
                        Всего
                    </div>
                </div>
                <div class="orange statistic">
                    <div class="value">
                        8
                    </div>
                    <div class="label">
                        Истекает срок
                    </div>
                </div>
                <div class="red statistic">
                    <div class="value">
                        12
                    </div>
                    <div class="label">
                        Просрочено
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="ui segment">

        </div>
    </div>
    <div class="ui fluid tab" data-tab="schedule">
        <div class="ui segment">

        </div>
    </div>
    <div class="ui tab" data-tab="ips">
        <div class="ui segment">
            @component('systems.main.ips.components.ips_table ', ['ips' => $ips])
                @slot('legend') Мои индивидуальные планы @endslot
            @endcomponent
        </div>
    </div>
</div>
