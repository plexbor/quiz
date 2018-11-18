<template>
    <tr>
        <th scope="row">{{ prize.id }}</th>
        <td>{{ prize.type }}</td>
        <td>{{ prize.value }}</td>
        <td>{{ prize.status }}</td>
        <td>
            <a href="#" class="btn btn-success" @click.prevent="confirm">Подтвердить</a>
            <a href="#" class="btn btn-primary" @click.prevent="convert">Конвертировать</a>
            <a href="#" class="btn btn-danger" @click.prevent="decline">Отказаться</a>
        </td>
    </tr>
</template>

<script>
    export default {
        props: [
            'prize'
        ],
        methods: {
            confirm() {

            },
            convert() {

            },
            decline() {

            }
        }
    }
</script>
