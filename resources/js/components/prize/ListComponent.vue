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
                            <prize-item v-for="prize in prizes" :prize="prize" :key="prize.id"></prize-item>
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
            this.$store.dispatch('getPrizes')
        },
    }
</script>
