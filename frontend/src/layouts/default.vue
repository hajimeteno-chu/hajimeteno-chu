<template>
  <div class="h-full">
    <div class="page">
      <div class="navbar">
        <nuxt-link to="/" class="brand">Hajimeteno-Chu!</nuxt-link>
      </div>
      <div style="height: calc(100%)">
        <nuxt class="h-full" />
      </div>
    </div>
    <div class="footer">技育CAMP 2021 ハッカソン vol 10</div>
  </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
.brand {
  @apply text-3xl;
  font-family: 'Ubuntu', sans-serif;
}
.navbar {
  @apply justify-between bg-base-200 shadow;
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
