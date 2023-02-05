<template>
  <PerventWeb />
  <router-view />
</template>

<script>
import './assets/css/fonts.css'
import './assets/css/plugin.min.css'
import PerventWeb from './components/PerventWeb.vue'

export default {
  name: 'App',
  components: {
    PerventWeb
  }
}
</script>

<style>
body {
  font-family: neo_sans, serif;
}
</style>
