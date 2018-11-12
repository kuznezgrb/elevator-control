<template>
  <div class="lifts">
    <div
      v-for="lift in lifts"
      :key="lift.id"
      class="lifts__shaft"
    >
      <span> № {{ lift.number }} </span>
      <div
        v-for="n in maxFloor"
        :key="n"
        :class="{ 'lift--active' : n==lift.floor }"
        class="lifts__lift lift"       
      >{{ n }} Этаж</div>
    </div>        
  </div>
</template>

<script>
export default {
  name: 'Lifts',
  data() {
    return {}
  },
  computed: {
    maxFloor() {
      return this.$store.getters.maxFloor
    },
    lifts() {
      return this.$store.getters.lifts
    },
    liftOrder() {
      return this.$store.getters.liftOrder
    }
  }
}
</script>

<style lang="less" >
.lifts {
  display: flex;
}

.lifts__lift {
  margin-bottom: 10px;
}

.lifts__shaft {
  margin-right: 10px;
}

.lift {
  width: 50px;
  height: 50px;
  border: solid 1px #000000;
  display: flex;
  justify-content: center;
  align-items: center;

  &--active {
    background-color: #000000;
    color: #ffffff;
  }

  &--arrived {
    background-color: green;
  }
}

h2 {
  margin-bottom: 10px;
}
</style>
