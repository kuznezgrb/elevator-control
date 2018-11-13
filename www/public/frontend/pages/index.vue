<template>
  <section class="container">
    <nav class="menu">  
      <nuxt-link
        to="/statistics"
      >Статистика</nuxt-link>
    </nav>   
    <div class="lifts-control">
      <div class="lifts-control__left">
        <h2>Лифты:</h2>
        <lifts/>
      </div>
      <div class="lifts-control__right">
        <h2>Выбор этажа:</h2>
        <btnFloor/>        
        <div
          v-if="liftOrder != null"
          class="result"
        >На ваш заказ прибыл лифт  № {{ liftOrder.lift.number }}</div>
      </div>      
    </div>
  </section>
</template>

<script>
import lifts from '../components/Lifts'
import btnFloor from '../components/BtnFloor'

export default {
  components: {
    lifts,
    btnFloor
  },
  computed: {
    liftOrder() {
      return this.$store.getters.liftOrder
    }
  },
  fetch({ store, params }) {
    store.dispatch('getMaxFloor')
    store.dispatch('getLifts')
  }
}
</script>

<style lang="less">
.container {
  min-height: 100vh;
  flex-direction: column;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family: 'Quicksand', 'Source Sans Pro', -apple-system, BlinkMacSystemFont,
    'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}

.lifts-control {
  display: flex;
}

.lifts-control__right {
  padding-left: 20px;
}

.menu {
  display: flex;
  padding-top: 10px;
  padding-bottom: 10px;
  a {
    font-size: 16px;
    font-weight: bold;
    color: green;
  }
}
</style>
