<template>
    <div class="modal fade" id="action-modal" tabindex="-1" role="dialog" aria-labelledby="История" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">История</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Дата и время</th>
                                <th scope="col">Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="action in actions">
                                <th scope="row">{{ action.created_at }}</th>
                                <td>{{ action.type }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        computed: {
            actions() {
                return this.$store.state.actions
            }
        }
    }
</script>
