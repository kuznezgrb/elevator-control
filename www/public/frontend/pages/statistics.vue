<template>  
  <section class="container">
    <nav class="menu">  
      <nuxt-link
        to="/"
      >Главная</nuxt-link>
    </nav>
    <div class="stat">
      <div class="stat__left">
        <h2>Количество вызовов</h2>
        <div
          v-for="(stat, k) in statLiftCount"          
          :key="k"
          class="stat__item"
        >
          Лифт № {{ k }} :
          <div 
            v-for="(floorItem, f) in stat"
            :key="f"
            class="stat__floor" 
          >
            Этаж:  {{ f }} количество {{ floorItem }}      
          </div>
        </div>
      </div>
      <div class="stat__right">
        <h2>По итерациям</h2>
        <div
          v-for="(stat, k) in statLiftDirection"          
          :key="k"
          class="stat__item"
        >
          Лифт № {{ k }} : 
          <div clas="stat__direction">
            <div
              v-for="(directionList, directionK) in stat"          
              :key="directionK"
            >
              <span
                v-for="(direction, kDirection) in directionList"          
                :key="kDirection"
                class="stat__direction-item"
              >
                {{ direction }} 
                <span class="stat__separator" >-></span>
              </span>
            </div>
            
          </div> 
        </div>
      </div>
    </div> 
  </section>
</template>

<script>
export default {
  components: {},
  computed: {
    statLiftCount() {
      return this.$store.getters.statLiftCount
    },
    statLiftDirection() {
      return this.$store.getters.statLiftDirection
    }
  },
  fetch({ store, params }) {
    store.dispatch('setStatLiftCount')
    store.dispatch('setStatLiftDirection')
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

.stat {
  display: flex;
  width: 100%;
}

.stat__left {
  width: 50%;
  min-width: 50%;
}

.stat__right {
  width: 50%;
  min-width: 50%;
}

.stat__item {
  width: 100%;
  display: block;
}

.stat__direction-item {
  &:last-of-type {
    .stat__separator {
      display: none;
    }
  }
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
