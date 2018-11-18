<template>
    <tr>
        <th scope="row">{{ prize.id }}</th>
        <td>{{ prize.type }}</td>
        <td>{{ prize.value }}</td>
        <td>{{ prize.status }}</td>
        <td v-if="isCreated">
            <a href="#" class="btn btn-success" @click.prevent="confirm">Подтвердить</a>
            <a href="#" class="btn btn-primary" @click.prevent="convert" v-if="isMoney">Конвертировать</a>
            <a href="#" class="btn btn-danger" @click.prevent="decline">Отказаться</a>
        </td>
    </tr>
</template>

<script>
    export default {
        props: [
            'prize'
        ],
        computed: {
            isCreated() {
                return this.prize.status === 'Создан'
            },
            isMoney() {
                return this.prize.type === 'Деньги'
            }
        },
        methods: {
            url(action) {
                return '/api/prize/' + this.prize.id + '/' + action
            },
            confirm() {
                axios.post(this.url('confirm'))
                    .then(response => {
                        this.$store.dispatch('getPrizes')
                    })
                    .catch(error => {
                        console.log(error.response.data.message)
                    })
            },
            convert() {

            },
            decline() {

            }
        }
    }
</script>
