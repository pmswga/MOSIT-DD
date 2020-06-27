
Vue.component('met-work-table', {
    props: {
        works: Array
    },
    methods: {
        sumMetWorkPlan: function() {
            this.$parent.metWorkSumPlan = 0;
            this.$parent.metWorks.forEach(function (value, index) {
                this.$parent.metWorkSumPlan += parseFloat(value.plan);
            }, this);
        },
        reCount: function () {
            this.$parent.metWorks.forEach(function (value, index) {
                value.num = index+1;
            });
        },
        addMetWork: function () {
            data = $.ajax({
                url: "/ips/works/metWorks",
                type: 'GET',
                async: false
            }).responseText;

            this.$parent.metWorksCaptions = JSON.parse(data);

            this.$parent.metWorks.push({
                num: ++this.$parent.countOfMetWork,
                caption: '',
                plan: 0,
                real: 0
            });

            this.sumMetWorkPlan();
        },
        removeMetWork: function (num) {
            idx = 0;
            this.$parent.metWorks.forEach(function (value, index) {
                if (value.num === num) {
                    idx = index;
                }
            }, idx);

            if (idx < this.$parent.metWorks.length) {
                this.$parent.metWorks.splice(idx, 1);
                this.$parent.countOfMetWork--;
            }

            this.reCount();
            this.sumMetWorkPlan();
        }
    },
    template: `
        <table class="ui table">
            <col width="2%">
            <thead>
                <tr>
                    <th class="ui form">
                        <div class="field">
                            <label>Всего работ:</label>
                            <input type="text" class="disabled field" v-model="works.length">
                        </div>
                    </th>
                    <th></th>
                    <th>
                        <div class="field">
                            <label>Всего часов:</label>
                            <input type="text" class="disabled field" v-model="this.$parent.metWorkSumPlan">
                        </div>
                    </th>
                    <th colspan="6">
                        <button type="button" v-on:click='addMetWork' class="ui right floated small primary labeled icon button">
                            <i class="plus icon"></i> Добавить
                        </button>
                    </th>
                </tr>
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
                <met-work-row
                    v-for='work in works'
                    v-bind:work='work'
                    v-bind:key='work.num'
                ></met-work-row>
            </tbody>
        </table>
    `
});

Vue.component('met-work-row', {
    props: {
        work: Object
    },
    template: `
        <tr>
            <td>
                <input type="hidden" v-bind:name="'metWork_' + work.num + '[]'" v-bind:value="work.num">
                {{ work.num }}
            </td>
            <td>
                <select v-model="work.caption" v-bind:name="'metWork_' + work.num + '[]'">
                    <option>{{ work.caption }}</option>
                    <optgroup v-for="(captions, workCaption) in $parent.$parent.metWorksCaptions" :label="workCaption">
                        <option v-for="caption in captions" v-if="caption.subCaption !== ''">
                            {{ caption.workCaption + ' ' +  caption.subCaption }}
                        </option>
                        <option v-else>
                            {{ caption.workCaption }}
                        </option>
                    </optgroup>
                </select>
            </td>
            <td>
                <input type="number" v-on:change="$parent.$parent.getSumPlan" v-bind:name="'metWork_' + work.num + '[]'" v-model="work.plan" step="0.01" min="0">
            </td>
            <td>
                <input type="number" v-on:change="$parent.$parent.getSumReal" v-bind:name="'metWork_' + work.num + '[]'" v-model="work.real" step="0.01" min="0">
            </td>
            <td>
                <select v-model="work.finish" v-bind:name="'metWork_' + work.num + '[]'">
                    <option>{{ work.finish }}</option>
                    <option>Другая работа</option>
                </select>
            </td>
            <td>
                <input type="date" v-model="work.finishDatePlan" v-bind:name="'metWork_' + work.num + '[]'">
            </td>
            <td>
                <input type="date" v-model="work.finishDateReal" v-bind:name="'metWork_' + work.num + '[]'">
            </td>
            <td>
                <a class="ui red basic icon button" v-on:click="$parent.removeMetWork(work.num)">
                    <i class="delete icon"></i>
                </a>
            </td>
        </tr>
    `
});

