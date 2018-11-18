import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        prizes: [],
        actions: [],
    },
    mutations: {
        setPrize (state, prize) {
            state.prizes.unshift(prize)
        },
        setPrizes(state, prizes) {
            state.prizes = prizes
        },
        setActions(state, actions) {
            state.actions = actions
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
