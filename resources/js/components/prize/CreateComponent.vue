<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Участвуй в розыгрыше</h5>
                    <p class="card-text">Выиграй деньги, бонусные баллы или предмет!</p>
                    <a href="javascript:void(0);" class="btn btn-primary" @click.prevent="getPrize">Получить приз</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            getPrize() {
                axios.post('/api/prize/create')
                    .then(response => {
                        this.$store.commit('setPrize', response.data)

                        this.$notify({
                            type: 'success',
                            text: 'Приз получен!'
                        })
                    })
                    .catch(error => {
                        console.log(error.response)
                    })
            }
        }
    }
</script>
