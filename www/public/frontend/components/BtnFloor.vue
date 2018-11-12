<template>
  <div class="btn-floor">
    <div class="btn-floor__button">1</div>
    <div class="btn-floor__button">2</div>
    <div class="btn-floor__button">3</div>
    <div class="btn-floor__button">4</div>
    <div class="btn-floor__button">5</div>
    <div class="btn-floor__button">6</div>
    <div class="btn-floor__button">7</div>
    <div class="btn-floor__button">8</div>
    <div class="btn-floor__button">9</div>
    <div class="btn-floor__button">10</div>
  </div>
</template>

<script>
export default {
  name: 'BtnFloor',
  data() {
    return {}
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
