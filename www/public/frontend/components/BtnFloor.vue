<template>
  <div class="btn-floor">
    <div
      v-for="n in maxFloor"
      :key="n"
      class="btn-floor__button"
      @click="callLift(n)"
    >{{ n }}</div>  
  </div>
</template>

<script>
export default {
  name: 'BtnFloor',
  data() {
    return {}
  },
  computed: {
    maxFloor() {
      return this.$store.getters.maxFloor
    }
  },
  methods: {
    async callLift(floor) {
      await this.$store.dispatch('callLift', floor)
    }
  }
}
</script>

<style lang="less" >
.btn-floor {
  display: flex;
  flex-wrap: wrap;
  max-width: 156px;
}

.btn-floor__button {
  width: 50px;
  height: 50px;
  border: solid 1px #000000;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 1px;
  cursor: pointer;
  &:hover {
    background-color: green;
  }
}
</style>
