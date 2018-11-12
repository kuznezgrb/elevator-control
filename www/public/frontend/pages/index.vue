<template>
  <section class="container">
    <div class="lifts-control">
      <div class="lifts-control__left">
        <lifts/>
      </div>
      <div class="lifts-control__right">
        <btnFloor/>
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
  }
}
</script>

<style>
.container {
  min-height: 100vh;
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
</style>
