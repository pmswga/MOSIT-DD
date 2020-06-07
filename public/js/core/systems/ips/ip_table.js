
Vue.component('org-work-table', {
    props: {
        works: Array
    },
    methods: {
        addOrgWork: function () {
            this.$parent.orgWorks.push({
                num: ++this.$parent.countOfOrgWork,
                caption: this.newWork,
                plan: 0,
                real: 0
            });
        },
        removeOrgWork: function (num) {
            id = 0;
            this.$parent.orgWorks.forEach(function (value, index) {
                if (value !== undefined) {
                    if (value.num === num) {
                       id = index;
                    }
                }
            }, id);

            if (id < this.$parent.orgWorks.length) {
                this.$parent.orgWorks.splice(id, 1);
                this.$parent.countOfOrgWork--;
            }
        }
    },
    template: `
        <table class="ui table">
            <thead>
                <tr>
                    <th colspan="7">
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
    props: ['work'],
    template:`
        <tr>
            <td>
                <input type="hidden" v-bind:name="'orgWork_' + work.num + '[]'" v-bind:value="work.num">
                {{ work.num }}
            </td>
            <td>
                <select v-bind:name="'orgWork_' + work.num + '[]'">
                    <option>{{ work.caption }}</option>
                    <option>Другая работа</option>
                </select>
            </td>
            <td>
                <input type="number" v-bind:name="'orgWork_' + work.num + '[]'" v-bind:value="work.plan" step="0.01" min="0">
            </td>
            <td>
                <input type="number" v-bind:name="'orgWork_' + work.num + '[]'" v-bind:value="work.real" step="0.01" min="0">
            </td>
            <td>
                <select v-bind:name="'orgWork_' + work.num + '[]'">
                    <option>в течении года</option>
                </select>
            </td>
            <td>
                <select v-bind:name="'orgWork_' + work.num + '[]'">
                    <option></option>
                </select>
            </td>
            <td>
                <a class="ui red button" v-on:click="$parent.removeOrgWork(work.num)">
                    <i class="delete icon"></i>
                </a>
            </td>
        </tr>
    `
});
