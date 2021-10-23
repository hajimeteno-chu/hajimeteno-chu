<template>
  <div class="flex h-full">
    <div
      class="
        fixed
        h-full
        w-400px
        bg-base-200
        px-5
        py-10
        border-t border-base-300
      "
    >
      <div>
        <h3 class="font-semibold">backend</h3>
        <div class="flex items-center gap-x-5 py-2">
          <progress class="progress progress-primary" value="40" max="100" />
          <span>40%</span>
        </div>
      </div>
      <div class="mt-10">
        <h1 class="font-semibold text-lg pb-2 border-b-3 border-info">
          Backend
        </h1>
        <div>
          <CardMember v-for="i in 5" :key="i" />
        </div>
      </div>
    </div>
    <div class="w-[calc(100%-400px)] ml-400px">
      
      <div class="tabs font-semibold">
        <a class="tab tab-lg tab-active">My Space</a>
        <a class="tab tab-lg">Team Space</a>
        <a class="tab tab-lg">Project</a>
      </div>

      <nuxt-child class="px-5" />
    </div>
  </div>
</template>

<script>
export default {
  layout: 'dashboard',
}
</script>
