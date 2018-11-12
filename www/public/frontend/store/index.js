import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import axios from 'axios'
const store = () =>
  new Vuex.Store({
    state: {
      maxFloor: 0,
      lifts: [],
      liftOrder: null
    },
    getters: {
      maxFloor(state) {
        return state.maxFloor
      },
      lifts(state) {
        return state.lifts
      },
      liftOrder(state) {
        return state.liftOrder
      }
    },
    mutations: {
      setMaxFloor(state, val) {
        state.maxFloor = val
      },
      setLifts(state, val) {
        state.lifts = val
      },
      setLiftOrder(state, val) {
        state.liftOrder = val
      }
    },
    actions: {
      async getMaxFloor({ commit }, val) {
        let { data } = await this.$axios.get(`/lift-control/maxFloor/`)
        commit('setMaxFloor', data.maxFloor)
      },
      async getLifts({ commit }, val) {
        let { data } = await this.$axios.get(`/lifts`)
        commit('setLifts', data)
      },
      async callLift({ commit }, val) {
        let { data } = await this.$axios.get(`/lift-control/callLift/` + val)
        commit('setLiftOrder', data)
      }
    }
  })

export default store
