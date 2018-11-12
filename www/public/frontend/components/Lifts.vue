<template>
  <div class="lifts">
    <div class="lifts__shaft">
      <div class="lifts__lift lift">1 Этаж</div>
      <div class="lifts__lift lift lift--active lift--arrived">1 Этаж</div>
      <div class="lifts__lift lift">1 Этаж</div>
    </div>
    <div class="lifts__shaft">
      <div class="lifts__lift lift">1 Этаж</div>
      <div class="lifts__lift lift lift--active lift--arrived">1 Этаж</div>
      <div class="lifts__lift lift">1 Этаж</div>
    </div>   
    <div class="lifts__shaft">
      <div class="lifts__lift lift">1 Этаж</div>
      <div class="lifts__lift lift lift--active lift--arrived">1 Этаж</div>
      <div class="lifts__lift lift">1 Этаж</div>
    </div>         
  </div>
</template>

<script>
export default {
  name: 'Lifts',
  data() {
    return {}
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
  width: 100px;
  height: 100px;
  border: solid 1px #000000;
  display: flex;
  justify-content: center;
  align-items: center;

  &--active {
    background-color: #000000;
  }

  &--arrived {
    background-color: green;
  }
}
</style>
