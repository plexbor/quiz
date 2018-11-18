<template>
    <tr>
        <th scope="row">{{ prize.id }}</th>
        <td>{{ prize.type }}</td>
        <td>{{ prize.value }}</td>
        <td>{{ prize.status }}</td>
        <td>
            <a href="#" class="btn btn-success" @click.prevent="confirm" v-if="isCreated">Подтвердить</a>
            <a href="#" class="btn btn-primary" @click.prevent="convert" v-if="isCreated && isMoney">Конвертировать</a>
            <a href="#" class="btn btn-danger" @click.prevent="decline" v-if="isCreated">Отказаться</a>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#action-modal" @click="setActions">История</button>
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
            setActions() {
                this.$store.commit('setActions', this.prize.actions)
            },
            confirm() {
                axios.post(this.url('confirm'))
                    .then(response => {
                        this.$store.dispatch('getPrizes')
                    })
                    .catch(error => {
                        this.$notify({
                            type: 'error',
                            text: error.response.data.message
                        })
                    })
            },
            convert() {

            },
            decline() {

            }
        }
    }
</script>
