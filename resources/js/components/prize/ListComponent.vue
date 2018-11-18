<template>
    <div class="row" style="margin-top: 20px;" v-if="prizes.length">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Список призов</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Тип</th>
                                <th scope="col">Выигрыш</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Управление</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="prize in prizes">
                                <th scope="row">{{ prize.id }}</th>
                                <td>{{ prize.type }}</td>
                                <td>{{ prize.value }}</td>
                                <td>{{ prize.status }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    Количество призов: {{ prizes.length }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            prizes() {
                return this.$store.state.prizes
            }
        },
        mounted() {
            this.getPrizes()
        },
        methods: {
            getPrizes() {
                axios.get('/api/prize/list')
                    .then(response => {
                        this.$store.commit('setPrizes', response.data)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        }
    }
</script>
