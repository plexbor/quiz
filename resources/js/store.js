import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        prizes: []
    },
    mutations: {
        setPrize (state, prize) {
            state.prizes.unshift(prize)
        },
        setPrizes(state, prizes) {
            state.prizes = prizes
        }
    },
    actions: {
        getPrizes() {
            axios.get('/api/prize/list')
                .then(response => {
                    this.commit('setPrizes', response.data)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
})
