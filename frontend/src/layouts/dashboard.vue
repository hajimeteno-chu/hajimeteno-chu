<template>
  <div class="h-screen overflow-hidden">
    <div class="navbar">
      <nuxt-link to="/" class="brand">Hajimeteno-Chu!</nuxt-link>
      <div>
        <button class="btn btn-link">ログイン</button>
      </div>
    </div>
    <nuxt />
  </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
.brand {
  @apply text-3xl;
  font-family: 'Ubuntu', sans-serif;
}
.navbar {
  @apply justify-between bg-base-200;
}
.page {
  min-height: 70%;
  min-height: -webkit-calc(100% - 80px);
  min-height: -moz-calc(100% - 80px);
  min-height: calc(100% - 80px);
}

.footer {
  @apply flex items-center justify-center;
  height: 80px;
}

#__nuxt {
  @apply !h-full;
}
</style>
