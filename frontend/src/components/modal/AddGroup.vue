<template>
  <div class="mod" :class="open ? 'open' : ''">
    <div class="mod-body w-120">
      <div class="w-full">
        <p class="font-bold text-lg mb-5">Group追加</p>
        <div class="flex items-center gap-x-5">
          <input
            v-model="gname"
            type="text"
            placeholder="Group Name"
            class="input input-bordered w-full"
          />
          <button class="btn" @click="$emit('add', gname)">追加</button>
        </div>
      </div>
      <div class="mt-5">
        <button class="btn w-full" @click="$emit('close')">Cancel</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['open'],
  data() {
    return {
      gname: '',
    }
  },
}
</script>
