import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        prizes: []
    },
    mutations: {
        setPrizes (state, prizes) {
            state.prizes = prizes
        },
        setPrize (state, prize) {
            state.prizes.unshift(prize)
        },
    }
})
