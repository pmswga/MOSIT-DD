
Vue.component('sci-work-table', {
    props: {
        works: Array
    },
    methods: {
        sumSciWorkPlan: function() {
            this.$parent.sciWorkSumPlan = 0;
            this.$parent.sciWorks.forEach(function (value, index) {
                this.$parent.sciWorkSumPlan += parseFloat(value.plan);
            }, this);
        },
        reCount: function () {
            this.$parent.sciWorks.forEach(function (value, index) {
                value.num = index+1;
            });
        },
        addSciWork: function () {
            data = $.ajax({
                url: "/ips/works/sciWorks",
                type: 'GET',
                async: false
            }).responseText;

            this.$parent.sciWorksCaptions = JSON.parse(data);

            this.$parent.sciWorks.push({
                num: ++this.$parent.countOfSciWork,
                caption: '',
                plan: 0,
                real: 0
            });

            this.sumSciWorkPlan();
        },
        removeSciWork: function (num) {
            idx = 0;
            this.$parent.sciWorks.forEach(function (value, index) {
                if (value.num === num) {
                    idx = index;
                }
            }, idx);

            if (idx < this.$parent.sciWorks.length) {
                this.$parent.sciWorks.splice(idx, 1);
                this.$parent.countOfSciWork--;
            }

            this.reCount();
            this.sumSciWorkPlan();
        }
    },
    template: `
        <table class="ui table">
            <col width="2%">
            <thead>
                <tr>
                    <th class="ui form">
                        <div class="field">
                            <label>Всего:</label>
                            <input type="text" class="disabled field" v-model="works.length">
                        </div>
                    </th>
                    <th></th>
                    <th>
                        <div class="field">
                            <label>Всего часов:</label>
                            <input type="text" class="disabled field" v-model="this.$parent.sciWorkSumPlan">
                        </div>
                    </th>
                    <th colspan="6">
                        <button type="button" v-on:click='addSciWork' class="ui right floated small primary labeled icon button">
                            <i class="plus icon"></i> Добавить
                        </button>
                    </th>
                </tr>
                <tr>
                    <th rowspan="2">№</th>
                    <th rowspan="2">Наименование и вид работ</th>
                    <th colspan="2">Трудоёмкость (час)</th>
                    <th colspan="2">Срок выполнения (даты)</th>
                    <th></th>
                </tr>
                <tr>
                    <th>Планируемая</th>
                    <th>Фактическая</th>
                    <th>Планируемая</th>
                    <th>Фактическая</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <sci-work-row
                    v-for='work in works'
                    v-bind:work='work'
                    v-bind:key='work.num'
                ></sci-work-row>
            </tbody>
        </table>
    `
});


Vue.component('sci-work-row', {
    props: {
        work: Object
    },
    template:`
        <tr>
            <td>
                <input type="hidden" v-bind:name="'sciWork_' + work.num + '[]'" v-bind:value="work.num">
                {{ work.num }}
            </td>
            <td>
                <input list="works" v-model="work.caption" v-bind:name="'sciWork_' + work.num + '[]'" :required="1">
                <datalist id="works">
                    <option v-for="caption in $parent.$parent.sciWorksCaptions"">
                        {{ caption.workCaption + ' ' + caption.subCaption }}
                    </option>
                </datalist>
            </td>
            <td>
                <input type="number" v-on:change="$parent.$parent.getSumPlan" v-bind:name="'sciWork_' + work.num + '[]'" v-model="work.plan" step="0.01" min="0">
            </td>
            <td>
                <input type="number" v-on:change="$parent.$parent.getSumReal" v-bind:name="'sciWork_' + work.num + '[]'" v-model="work.real" step="0.01" min="0">
            </td>
            <td>
                <input type="date" v-model="work.finishDatePlan" v-bind:name="'sciWork_' + work.num + '[]'">
            </td>
            <td>
                <input type="date" v-model="work.finishDateReal" v-bind:name="'sciWork_' + work.num + '[]'">
            </td>
            <td>
                <a class="ui red basic icon button" v-on:click="$parent.removeSciWork(work.num)">
                    <i class="delete icon"></i>
                </a>
            </td>
        </tr>
    `
});
