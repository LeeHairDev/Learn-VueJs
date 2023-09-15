<script setup lang="ts">
// import { RouterLink, RouterView } from 'vue-router'
import Navbar from "./components/Navbar.vue";
import Footer from "./components/Footer.vue";
import router from "./router";
</script>

<template>
  <Navbar />
  <router-view v-slot="{ Component }">
    <transition name="fade" node="out-in">
      <component :is="Component" />
    </transition>
  </router-view>
  <Footer />
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
