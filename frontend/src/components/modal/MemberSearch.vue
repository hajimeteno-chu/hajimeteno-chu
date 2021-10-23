<template>
  <div class="mod" :class="open ? 'open' : ''">
    <div class="mod-body w-120" @click="$emit('close')">
      <div class="w-full">
        <p class="font-bold text-lg mb-5">メンバー検索</p>
        <div class="flex items-center gap-x-5">
          <input
            type="text"
            placeholder="userID"
            class="input input-bordered w-full"
          />
          <button class="btn">検索</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['open'],
}
</script>

<style scoped>
.mod {
  @apply top-0
      left-0
      h-full
      z-999
      fixed
      flex
      items-center
      justify-center
      bg-base-300 bg-opacity-40
      invisible

      w-full;
}

.mod-body {
  @apply bg-base-100 rounded-lg p-10 shadow-lg z-1000;
}

.open {
  @apply !visible;
}
</style>
