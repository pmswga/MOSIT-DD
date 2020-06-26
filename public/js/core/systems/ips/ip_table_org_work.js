
Vue.component('org-work-table', {
    props: {
        works: Array
    },
    methods: {
        sumOrgWorkPlan: function() {
            this.$parent.orgWorkSumPlan = 0;
            this.$parent.orgWorks.forEach(function (value, index) {
                this.$parent.orgWorkSumPlan += parseFloat(value.plan);
            }, this);

            console.log(this.$parent.orgWorkSumPlan);
        },
        reCount: function () {
            this.$parent.orgWorks.forEach(function (value, index) {
                value.num = index+1;
            });
        },
        addOrgWork: function () {

            data = $.ajax({
                url: "/ips/works/orgWorks",
                type: 'GET',
                async: false
            }).responseText;

            this.$parent.orgWorksCaptions = JSON.parse(data);

            this.$parent.orgWorks.push({
                num: ++this.$parent.countOfOrgWork,
                caption: '',
                plan: 0,
                real: 0
            });

            this.sumOrgWorkPlan();
        },
        removeOrgWork: function (num) {
            idx = 0;
            this.$parent.orgWorks.forEach(function (value, index) {
                if (value.num === num) {
                    idx = index;
                }
            }, idx);

            if (idx < this.$parent.orgWorks.length) {
                this.$parent.orgWorks.splice(idx, 1);
                this.$parent.countOfOrgWork--;
            }

            this.reCount();
            this.sumOrgWorkPlan();
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
                            <input type="text" class="disabled field" v-model="this.$parent.orgWorkSumPlan">
                        </div>
                    </th>
                    <th colspan="6">
                        <button type="button" v-on:click='addOrgWork' class="ui right floated small primary labeled icon button">
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
            <org-work-row
                v-for='work in works'
                v-bind:work='work'
                v-bind:key='work.num'
            ></org-work-row>
        </table>
    `
});

Vue.component('org-work-row', {
    props: {
        work: Object
    },
    template:`
        <tr>
            <td>
                <input type="hidden" v-bind:name="'orgWork_' + work.num + '[]'" v-bind:value="work.num">
                {{ work.num }}
            </td>
            <td>
                <select v-model="work.caption" v-bind:name="'orgWork_' + work.num + '[]'" :required="1">
                    <option>{{ work.caption }}</option>
                    <optgroup v-for="(captions, workCaption) in $parent.$parent.orgWorksCaptions" :label="workCaption">
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
                <input type="number" :required="1" v-on:change="$parent.$parent.getSumPlan" v-bind:name="'orgWork_' + work.num + '[]'" v-model="work.plan" step="0.01" min="0">
            </td>
            <td>
                <input type="number" v-on:change="$parent.$parent.getSumReal" v-bind:name="'orgWork_' + work.num + '[]'" v-model="work.real" step="0.01" min="0">
            </td>
            <td>
                <select v-model="work.finishDatePlan" v-bind:name="'orgWork_' + work.num + '[]'">
                    <option>в течении года</option>
                </select>
            </td>
            <td>
                <select v-model="work.finishDateReal" v-bind:name="'orgWork_' + work.num + '[]'">
                    <option>в течении года</option>
                </select>
            </td>
            <td>
                <a class="ui red basic icon fluid button" v-on:click="$parent.removeOrgWork(work.num)">
                    <i class="delete icon"></i>
                </a>
            </td>
        </tr>
    `
});
